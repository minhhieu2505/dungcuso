<?php
	if(!defined('SOURCES')) die("Error");

	switch($act)
	{
		/* Man */
		case "man":
			viewMans();
			$template = "warehouse/man/mans";
			break;

		case "add":
			$warehouse = $d->rawQuery("select * from warehouse order by id desc");
			$template = "warehouse/man/man_add";
			break;
		case "edit":
			editMan();
			$template = "warehouse/man/man_edit";
			break;
		case "save":
			saveMan();
			break;
		default:
			$template = "404";
	}

	/* View man */
	function viewMans()
	{
		
		global $d, $func, $strUrl, $curPage, $items, $paging;

		$where = "";

		if(isset($_REQUEST['keyword']))
		{
			$keyword = htmlspecialchars($_REQUEST['keyword']);
			$where .= " and (code_invoice LIKE '%$keyword%')";
		}

		$perPage = 10;
		$startpoint = ($curPage * $perPage) - $perPage;
		$limit = " limit ".$startpoint.",".$perPage;
		$sql = "select * from warehouse where id > 0 $where order by id desc $limit";
		$items = $d->rawQuery($sql);
		$sqlNum = "select count(*) as 'num' from warehouse where id > 0 $where order by id desc";
		$count = $d->rawQueryOne($sqlNum);
		$total = (!empty($count)) ? $count['num'] : 0;
		$url = "index.php?source=warehouse&act=man".$strUrl;
		$paging = $func->pagination($total,$perPage,$curPage,$url);
	}

	/* Edit man */
	function editMan()
	{
		global $d, $func, $strUrl, $curPage, $items, $com, $act;

		if(!empty($_GET['id'])) $id = htmlspecialchars($_GET['id']);
		else $id = 0;

		if(empty($id))
		{
			$func->transfer("Không nhận được kho", "index.php?source=warehouse&act=man.&p=".$curPage.$strUrl, false);
		}
		else
		{
			$items = $d->rawQuery("select * from warehouse_detail where id_warehouse = ? order by id desc",array($id));
			if(empty($items))
			{
				$func->transfer("kho không có thực", "index.php?source=warehouse&act=man.&p=".$curPage.$strUrl, false);
			}
		}		
	}

	/* Save man */
	function saveMan()
	{
		global $d, $strUrl, $func, $flash, $curPage, $config, $com, $act, $setting,$configBase;

		/* Check post */
		if(empty($_POST))
		{
			$func->transfer("Không nhận được hóa đơn kho", "index.php?source=warehouse&act=man&p=".$curPage.$strUrl, false);
		}

		/* Post kho */
		$message = '';
		$response = array();
		$savehere = (isset($_POST['save-here'])) ? true : false;
		$id = (!empty($_POST['id'])) ? htmlspecialchars($_POST['id']) : 0;
		$data = (!empty($_POST['data'])) ? $_POST['data'] : null;
		if($data)
		{
			foreach($data as $column => $value)
			{
				$data[$column] = htmlspecialchars($func->sanitize($value));
			}
		}
		$row = $d->rawQueryOne("select * from warehouse where code_invoice = ? limit 0,1", array($data['code_invoice']));
		if(!empty($row))
		{
			$response['messages'][] = 'Mã đơn hàng tồn tại';
		}
		
		if(!empty($response))
		{
			/* Flash data */
			if(!empty($data))
			{
				foreach($data as $k => $v)
				{
					if(!empty($v))
					{
						$flash->set($k, $v);
					}
				}
			}

			/* Errors */
			$response['status'] = 'danger';
			$message = base64_encode(json_encode($response));
			$flash->set('message', $message);
			
			if($id)
			{
				$func->redirect("index.php?source=warehouse&act=edit&p=".$curPage.$strUrl."&id=".$id);
			}
			else
			{
				$func->redirect("index.php?source=warehouse&act=add&p=".$curPage.$strUrl);
			}
		}
		/* Save data */
		if($id)
		{
			$data['date_updated'] = time();
			$d->where('id', $id);
			if($d->update('warehouse',$data))
			{
				
				$func->transfer("Cập nhật kho thành công", "index.php?source=warehouse&act=man");
			}
			else
			{
					
				if($savehere)
				{
					$func->transfer("Cập nhật kho bị lỗi", "index.php?source=warehouse&act=edit&p=".$curPage.$strUrl."&id=".$id, false);
				}
				else
				{
					$func->transfer("Cập nhật kho bị lỗi", "index.php?source=warehouse&act=man&p=".$curPage.$strUrl, false);
				}
			}
		}
		else
		{	
			$data['date_created'] = time();

			if($d->insert('warehouse',$data))
			{
				$id_insert = $d->getLastInsertId();

				if (isset($_FILES['file_product'])) {
					$file_type = $_FILES['file_product']['type'];
					if ($file_type == "application/vnd.ms-excel" || $file_type == "application/x-ms-excel" || $file_type == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet") {
						$mess = '';
						$filename = $func->changeTitle($_FILES["file_product"]["name"]);
						move_uploaded_file($_FILES["file_product"]["tmp_name"], $filename);
						require LIBRARIES . 'PHPExcel.php';
						require_once LIBRARIES . 'PHPExcel/IOFactory.php';
						
						$objPHPExcel = PHPExcel_IOFactory::load($filename);
						
						foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
							$highestRow = $worksheet->getHighestRow();
			
							for ($row = 3; $row <= $highestRow; ++$row) {
								$cell = $worksheet->getCellByColumnAndRow(0, $row);
								$sku = $cell->getValue();
			
								if ($sku != "") {
									$cell = $worksheet->getCellByColumnAndRow(0, $row);
									$sku = $cell->getValue();
			
									$cell = $worksheet->getCellByColumnAndRow(1, $row);
									$name = $cell->getValue();
			
									$cell = $worksheet->getCellByColumnAndRow(2, $row);
									$import_price = $cell->getValue();
			
									$cell = $worksheet->getCellByColumnAndRow(3, $row);
									$regular_price = $cell->getValue();
			
									$cell = $worksheet->getCellByColumnAndRow(4, $row);
									$quantity = $cell->getValue();
			
									/* Lấy sản phẩm theo mã */
									$productImport = $d->rawQueryOne("select id,inventory from product where sku = ? limit 0,1", array($sku));
									/* Gán dữ liệu cho bảng product */
									$dataProduct = array();
									$dataProduct['regular_price'] = (!empty($regular_price)) ? htmlspecialchars($regular_price) : 0;
									$dataProduct['sale_price'] = (!empty($regular_price)) ? htmlspecialchars($regular_price) : 0;
									$dataProduct['inventory'] = $quantity + $productImport['inventory'];
									if(!empty($productImport)){
										$d->where('sku', $sku);
										if ($d->update('product', $dataProduct)) {
										} else {
											$mess .= 'Lỗi tại dòng: ' . $row . "<br>";
										}
									} else {
										$dataProduct['name'] = (!empty($name)) ? htmlspecialchars($name) : '';
										$dataProduct['slug'] = $func->changeTitle($dataProduct['name']);
										$dataProduct['sku'] = $sku;
										$dataProduct['status'] = 'hienthi';
										if ($d->insert('product', $dataProduct)) {
										} else {
											$mess .= 'Lỗi tại dòng: ' . $row . "<br>";
										}
									}

									/* Gán dữ liệu cho bảng warehouse_detail */
									$data = array();
									$data['sku'] = (!empty($sku)) ? htmlspecialchars($sku) : '';
									$data['import_price'] = (!empty($import_price)) ? htmlspecialchars($import_price) : '';
									$data['retail_price'] = (!empty($regular_price)) ? htmlspecialchars($regular_price) : '';
									$data['quantity'] = (!empty($quantity)) ? htmlspecialchars($quantity) : '';
									$data['id_warehouse'] = $id_insert;
									
									if ($d->insert('warehouse_detail', $data)) {
											
									} else {
										$mess .= 'Lỗi tại dòng: ' . $row . "<br>";
									}
								}
							}
						}
			
						/* Xóa tập tin sau khi đã import xong */
						unlink($filename);
						
						/* Kiểm tra kết quả import */
						if ($mess == '') {
							$mess = "Import danh sách thành công";
							$func->transfer($mess, "index.php?com=import&act=man");
						} else {
							$func->transfer($mess, "index.php?com=import&act=man", false);
						}
					} else {
						$mess = "Không hỗ trợ kiểu tập tin này";
						$func->transfer($mess, "index.php?com=import&act=man", false);
					}
				} else {
					$func->transfer("Dữ liệu rỗng", "index.php?com=import&act=man", false);
				}
				
			}
		}
	}

?>