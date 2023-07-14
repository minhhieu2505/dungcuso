<?php
	if(!defined('SOURCES')) die("Error");

	switch($act)
	{
		/* Man */
		case "man":
			viewMans();
			$template = "product/man/mans";
			break;

		case "add":
			$category = $d->rawQuery("select * from category order by id desc");
			$template = "product/man/man_add";
			break;
		case "edit":
			editMan();
			$template = "product/man/man_add";
			break;
		case "save":
			saveMan();
			break;
		case "delete":
			deleteMan();
			break;
		case "category":
			viewCate();
			$template = "product/cate/cate";
			break;
		case "add_cate":
			$template = "product/cate/cate_add";
			break;
		case "save_cate":
			saveCate();
			break;
		case "edit_cate":
			editCate();
			$template = "product/cate/cate_add";
			break;
		case "delete_cate":
			deleteCate();
			break;

		default:
			$template = "404";
	}

	/* View man */
	function viewMans()
	{
		
		global $d, $func, $comment, $strUrl, $curPage, $items, $paging, $type, $category, $id_category;

		$where = "";

		if(isset($_REQUEST['keyword']))
		{
			$keyword = htmlspecialchars($_REQUEST['keyword']);
			$where .= " and (name LIKE '%$keyword%')";
		}

		if(isset($_REQUEST['id_cate']))
		{
			$id_category = htmlspecialchars($_REQUEST['id_cate']);
			$where .= " and id_category = $id_category";
		}

		$category = $d->rawQuery("select * from category order by id desc");

		$perPage = 10;
		$startpoint = ($curPage * $perPage) - $perPage;
		$limit = " limit ".$startpoint.",".$perPage;
		$sql = "select * from product where id > 0 $where order by id desc $limit";
		$items = $d->rawQuery($sql);
		$sqlNum = "select count(*) as 'num' from product where id > 0 $where order by id desc";
		$count = $d->rawQueryOne($sqlNum);
		$total = (!empty($count)) ? $count['num'] : 0;
		$url = "index.php?source=product&act=man".$strUrl;
		$paging = $func->pagination($total,$perPage,$curPage,$url);
	}

	/* Edit man */
	function editMan()
	{
		global $d, $func, $strUrl, $curPage, $item, $com, $act, $category, $gallery;

		if(!empty($_GET['id'])) $id = htmlspecialchars($_GET['id']);
		else if(!empty($_GET['id_copy'])) $id = htmlspecialchars($_GET['id_copy']);
		else $id = 0;

		$category = $d->rawQuery("select * from category order by id desc");

		if(empty($id))
		{
			$func->transfer("Không nhận được sản phẩm", "index.php?source=product&act=man.&p=".$curPage.$strUrl, false);
		}
		else
		{
			$item = $d->rawQueryOne("select * from #_product where id = ? limit 0,1",array($id));
			$gallery = $d->rawQuery("select * from gallery where id_product = ? order by id desc",array($id));

			if(empty($item))
			{
				$func->transfer("sản phẩm không có thực", "index.php?source=product&act=man.&p=".$curPage.$strUrl, false);
			}
		}		
	}

	/* Save man */
	function saveMan()
	{
		global $d, $strUrl, $func, $flash, $curPage, $config, $com, $act, $type,$setting,$configBase;

		/* Check post */
		if(empty($_POST))
		{
			$func->transfer("Không nhận được sản phẩm", "index.php?source=product&act=man&p=".$curPage.$strUrl, false);
		}

		// $func->dump($_FILES['review-file-photo']['name'][1],true);

		/* Post sản phẩm */
		$message = '';
		$response = array();
		$savehere = (isset($_POST['save-here'])) ? true : false;
		$id = (!empty($_POST['id'])) ? htmlspecialchars($_POST['id']) : 0;
		$data = (!empty($_POST['data'])) ? $_POST['data'] : null;
		$dataPhoto = $func->listsGallery('review-file-photo');
		if($data)
		{
			foreach($data as $column => $value)
			{
				$data[$column] = htmlspecialchars($func->sanitize($value));
			}

		    if(!empty($_POST['slug'])) $data['slug'] = $func->changeTitle(htmlspecialchars($_POST['slug']));
		    	else $data['slug'] = (!empty($data['name'])) ? $func->changeTitle($data['name']) : '';

			if(isset($_POST['status']))
			{
				$status = '';
				foreach($_POST['status'] as $attr_column => $attr_value) if($attr_value != "") $status .= $attr_value.',';
				$data['status'] = (!empty($status)) ? rtrim($status, ",") : "";
			}
			else
			{
				$data['status'] = "";
			}

			$data['regular_price'] = (isset($data['regular_price']) && $data['regular_price'] != '') ? str_replace(",","",$data['regular_price']) : 0;
			$temp_price = $data['sale_price'] = (isset($data['sale_price']) && $data['sale_price'] != '') ? str_replace(",","",$data['sale_price']) : 0;
			$data['discount'] = (isset($data['discount']) && $data['discount'] != '') ? $data['discount'] : 0;
			if($temp_price == 0){
				$data['sale_price'] = $data['regular_price'];
			}
		}


		/* Valid data */
		$checkTitle = $func->checkTitle($data);

		if(!empty($checkTitle))
		{
			foreach($checkTitle as $k => $v)
			{
				$response['messages'][] = $v;
			}
		}

		$dataSlug = array();
		$dataSlug['slug'] = $data['slug'];
		$dataSlug['id'] = $id;
		$dataSlug['copy'] = ($act == 'save_copy') ? true : false;
		$checkSlug = $func->checkSlug($dataSlug);
		if($checkSlug == 'exist')
		{
			$response['messages'][] = 'Đường dẫn đã tồn tại';
		}
		else if($checkSlug == 'empty')
		{
			$response['messages'][] = 'Đường dẫn không được trống';
		}
		$checkSku = $func->checkSku($data['sku'],$id);
		if($checkSku == true){
			$response['messages'][] = 'Mã sản phẩm đã tồn tại';
		}
		if(strlen($data['sku']) > strlen($func->changeTitle($data['sku']))){
			$response['messages'][] = 'Mã sản phẩm sai định dạng';
		}
		if(!empty($data['regular_price']) && !$func->isNumber($data['regular_price']))
		{
			$response['messages'][] = 'Giá bán không hợp lệ';
		}

		if(!empty($data['sale_price']) && !$func->isNumber($data['sale_price']))
		{
			$response['messages'][] = 'Giá mới không hợp lệ';
		}

		if(!empty($data['discount']) && !$func->isNumber($data['discount']))
		{
			$response['messages'][] = 'Chiết khấu không hợp lệ';
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
				$func->redirect("index.php?source=product&act=edit&p=".$curPage.$strUrl."&id=".$id);
			}
			else
			{
				$func->redirect("index.php?source=product&act=add&p=".$curPage.$strUrl);
			}
		}
		/* Save data */
		if($id && $act!='save_copy')
		{
			
			$data['date_updated'] = time();
			$d->where('id', $id);
			if($d->update('product',$data))
			{
				/* Photo */
				if($func->hasFile("file"))
				{
					
					$photoUpdate = array();
					$file_name = $func->uploadName($_FILES["file"]["name"]);

					if($photo = $func->uploadImage("file", $config['product']['img_type'], '../upload/product/', $file_name))
					{
						$row = $d->rawQueryOne("select id, photo from #_product where id = ? limit 0,1",array($id));

						if(!empty($row))
						{
							$func->deleteFile('../upload/product/'.$row['photo']);
						}

						$photoUpdate['photo'] = $photo;
						$d->where('id', $id);
						$d->update('product', $photoUpdate);
						unset($photoUpdate);
					}
				}

				if(!empty($dataPhoto))
                {
                    $myFile = $_FILES['review-file-photo'];
                    $fileCount = count($myFile["name"]) - 1;
                    for($i=0;$i<$fileCount;$i++)
                    {
                        if(in_array($myFile["name"][$i], $dataPhoto))
                        {               

                            $_FILES['file-uploader-temp'] = array(
                                'name' => $myFile['name'][$i],
                                'type' => $myFile['type'][$i],
                                'tmp_name' => $myFile['tmp_name'][$i],
                                'error' => $myFile['error'][$i],
                                'size' => $myFile['size'][$i]
                            );
                            $file_name = $func->uploadName($myFile["name"][$i]);

                            if($photo = $func->uploadImage("file-uploader-temp", '.jpg|.png|.jpeg', ROOT."/upload/product/", $file_name))
                            {
                                $dataTemp = array();
                                $dataTemp['id_product'] = $id;
                                $dataTemp['photo'] = $photo;
                                $d->insert('gallery', $dataTemp);
                            }
                        }
                    }
                }
				$func->transfer("Cập nhật sản phẩm thành công", "index.php?source=product&act=man");
			}
			else
			{
					
				if($savehere)
				{
					$func->transfer("Cập nhật sản phẩm bị lỗi", "index.php?source=product&act=edit&p=".$curPage.$strUrl."&id=".$id, false);
				}
				else
				{
					$func->transfer("Cập nhật sản phẩm bị lỗi", "index.php?source=product&act=man&p=".$curPage.$strUrl, false);
				}
			}
		}
		else
		{	
			$data['date_created'] = time();

			if($d->insert('product',$data))
			{
				$id_insert = $d->getLastInsertId();

				/* Photo */
				if($func->hasFile("file"))
				{
					$photoUpdate = array();
					$file_name = $func->uploadName($_FILES['file']["name"]);

					if($photo = $func->uploadImage("file", $config['product']['img_type'], '../upload/product/', $file_name))
					{
						$photoUpdate['photo'] = $photo;
						$d->where('id', $id_insert);
						$d->update('product', $photoUpdate);
						unset($photoUpdate);
					}
				}
				if(!empty($dataPhoto))
                {
                    $myFile = $_FILES['review-file-photo'];
                    $fileCount = count($myFile["name"]) - 1;
                    for($i=0;$i<$fileCount;$i++)
                    {
                        if(in_array($myFile["name"][$i], $dataPhoto))
                        {               

                            $_FILES['file-uploader-temp'] = array(
                                'name' => $myFile['name'][$i],
                                'type' => $myFile['type'][$i],
                                'tmp_name' => $myFile['tmp_name'][$i],
                                'error' => $myFile['error'][$i],
                                'size' => $myFile['size'][$i]
                            );
                            $file_name = $func->uploadName($myFile["name"][$i]);

                            if($photo = $func->uploadImage("file-uploader-temp", '.jpg|.png|.jpeg', ROOT."/upload/product/", $file_name))
                            {
                                $dataTemp = array();
                                $dataTemp['id_product'] = $id_insert;
                                $dataTemp['photo'] = $photo;
                                $d->insert('gallery', $dataTemp);
                            }
                        }
                    }
                }
				$func->transfer("Lưu sản phẩm thành công", "index.php?source=product&act=man");

			}
		}
	}

	/* Delete man */
	function deleteMan()
	{
		global $d, $strUrl, $func, $curPage, $com, $type;

		$id = (!empty($_GET['id'])) ? htmlspecialchars($_GET['id']) : 0;

		if($id)
		{
			/* Lấy sản phẩm */
			$row = $d->rawQueryOne("select id, photo from #_product where id = ? limit 0,1",array($id));

			if(!empty($row))
			{
				/* Xóa chính */
				$func->deleteFile('../upload/product/'.$row['photo']);
				$d->rawQuery("delete from #_product where id = ?",array($id));


				$func->transfer("Xóa sản phẩm thành công", "index.php?source=product&act=man&p=".$curPage.$strUrl);
			}
			else
			{
				$func->transfer("Xóa sản phẩm bị lỗi", "index.php?source=product&act=man&p=".$curPage.$strUrl, false);
			}
		}
		elseif(isset($_GET['listid']))
		{
			$listid = explode(",",$_GET['listid']);

			for($i=0;$i<count($listid);$i++)
			{
				$id = htmlspecialchars($listid[$i]);

				/* Lấy sản phẩm */
				$row = $d->rawQueryOne("select id, photo from #_product where id = ? and type = ? limit 0,1",array($id,$type));

				if(!empty($row))
				{
					/* Xóa chính */
					$func->deleteFile('../upload/product/'.$row['photo']);
					$d->rawQuery("delete from #_product where id = ?",array($id));
				}
			}

			$func->transfer("Xóa sản phẩm thành công", "index.php?source=product&act=man&p=".$curPage.$strUrl);
		} 
		else
		{
			$func->transfer("Không nhận được sản phẩm", "index.php?source=product&act=man&p=".$curPage.$strUrl, false);
		}
	}

	// Category
	/* View man */
	function viewCate()
	{
		
		global $d, $func, $comment, $strUrl, $curPage, $items, $paging, $type;

		$where = "";

		// if(isset($_REQUEST['keyword']))
		// {
		// 	$keyword = htmlspecialchars($_REQUEST['keyword']);
		// 	$where .= " and (name LIKE '%$keyword%' or nameen LIKE '%$keyword%')";
		// }

		$perPage = 10;
		$startpoint = ($curPage * $perPage) - $perPage;
		$limit = " limit ".$startpoint.",".$perPage;
		$sql = "select * from category where id > 0 order by id desc $limit";
		$items = $d->rawQuery($sql);
		$sqlNum = "select count(*) as 'num' from category where id > 0 $where order by id desc";
		$count = $d->rawQueryOne($sqlNum);
		$total = (!empty($count)) ? $count['num'] : 0;
		$url = "index.php?source=product&act=category".$strUrl;
		$paging = $func->pagination($total,$perPage,$curPage,$url);
	}
	/* Save man */
	function saveCate()
	{
		global $d, $strUrl, $func, $flash, $curPage, $config, $com, $act, $type,$setting,$configBase;

		/* Check post */
		if(empty($_POST))
		{
			$func->transfer("Không nhận được sản phẩm", "index.php?source=product&act=man&p=".$curPage.$strUrl, false);
		}


		/* Post sản phẩm */
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

		    if(!empty($_POST['slug'])) $data['slug'] = $func->changeTitle(htmlspecialchars($_POST['slug']));
		    	else $data['slug'] = (!empty($data['name'])) ? $func->changeTitle($data['name']) : '';

			if(isset($_POST['status']))
			{
				$status = '';
				foreach($_POST['status'] as $attr_column => $attr_value) if($attr_value != "") $status .= $attr_value.',';
				$data['status'] = (!empty($status)) ? rtrim($status, ",") : "";
			}
			else
			{
				$data['status'] = "";
			}
		}
		
		/* Valid data */
		$checkTitle = $func->checkTitle($data);
		
		if(!empty($checkTitle))
		{
			foreach($checkTitle as $k => $v)
			{
				$response['messages'][] = $v;
			}
		}
		
		$dataSlug = array();
		$dataSlug['slug'] = $data['slug'];
				$dataSlug['id'] = $id;
				$dataSlug['copy'] = ($act == 'save_copy') ? true : false;
				$checkSlug = $func->checkSlug($dataSlug);

				if($checkSlug == 'exist')
				{
					$response['messages'][] = 'Đường dẫn đã tồn tại';
				}
				else if($checkSlug == 'empty')
				{
					$response['messages'][] = 'Đường dẫn không được trống';
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
				$func->redirect("index.php?source=product&act=edit&p=".$curPage.$strUrl."&id=".$id);
			}
			else
			{
				$func->redirect("index.php?source=product&act=add&p=".$curPage.$strUrl);
			}
		}
		/* Save data */
		if ($id) {
			$data['date_updated'] = time();
	
			$d->where('id', $id);
			if ($d->update('category', $data)) {
				/* Photo */
				if ($func->hasFile("file")) {
					$photoUpdate = array();
					$file_name = $func->uploadName($_FILES["file"]["name"]);
	
					if ($photo = $func->uploadImage("file", '.jpg|.gif|.png|.jpeg|.gif', "../upload/product/", $file_name)) {
						$row = $d->rawQueryOne("select id, photo from category where id = ? limit 0,1", array($id));
	
						if (!empty($row)) {
							$func->deleteFile("../upload/product/" . $row['photo']);
						}
	
						$photoUpdate['photo'] = $photo;
						$d->where('id', $id);
						$d->update('category', $photoUpdate);
						unset($photoUpdate);
					}
				}
	
				$func->transfer("Cập nhật dữ liệu thành công", "index.php?source=product&act=category&p=" . $curPage . $strUrl);
			} else {
				$func->transfer("Cập nhật dữ liệu bị lỗi", "index.php?source=product&act=man_list&p=" . $curPage . $strUrl, false);
			}
		} else {
			$data['date_created'] = time();
	
			if ($d->insert('category', $data)) {
				$id_insert = $d->getLastInsertId();
	
				/* Photo */
				if ($func->hasFile("file")) {
					$photoUpdate = array();
					$file_name = $func->uploadName($_FILES['file']["name"]);
	
					if ($photo = $func->uploadImage("file", '.jpg|.gif|.png|.jpeg|.gif', "../upload/product/", $file_name)) {
						$photoUpdate['photo'] = $photo;
						$d->where('id', $id_insert);
						$d->update('category', $photoUpdate);
						unset($photoUpdate);
					}
				}
	
	
				$func->transfer("Lưu dữ liệu thành công", "index.php?source=product&act=category&p=" . $curPage . $strUrl);
			} else {
				$func->transfer("Lưu dữ liệu bị lỗi", "index.php?source=product&act=category&p=" . $curPage . $strUrl, false);
			}
		}
	}

	/* Edit list */
	function editCate()
	{
		global $d, $func, $strUrl, $curPage, $item, $gallery, $type, $com;

		$id = (!empty($_GET['id'])) ? htmlspecialchars($_GET['id']) : 0;

		if (empty($id)) {
			$func->transfer("Không nhận được dữ liệu", "index.php?source=product&act=category&p=" . $curPage . $strUrl, false);
		} else {
			$item = $d->rawQueryOne("select * from category where id = ? limit 0,1", array($id));

			if (empty($item)) {
				$func->transfer("Dữ liệu không có thực", "index.php?source=product&act=category&p=" . $curPage . $strUrl, false);
			} 
		}
	}
	/* Delete Cate */
	function deleteCate()
	{
		global $d, $strUrl, $func, $curPage, $com, $type;

		$id = (!empty($_GET['id'])) ? htmlspecialchars($_GET['id']) : 0;

		if ($id) {
			/* Lấy dữ liệu */
			$row = $d->rawQueryOne("select id, photo from category where id = ? limit 0,1", array($id));

			if (!empty($row)) {
				/* Xóa chính */
				$func->deleteFile("../upload/product/" . $row['photo']);
				$d->rawQuery("delete from category where id = ?", array($id));

				if (count($row)) {
					foreach ($row as $v) {
						$func->deleteFile("../upload/product/" . $v['photo']);
					}
				}

				$func->transfer("Xóa dữ liệu thành công", "index.php?source=product&act=category&p=" . $curPage . $strUrl);
			} else {
				$func->transfer("Xóa dữ liệu bị lỗi", "index.php?source=product&act=category&p=" . $curPage . $strUrl, false);
			}
		} else {
			$func->transfer("Không nhận được dữ liệu", "index.php?source=product&act=category&p=" . $curPage . $strUrl, false);
		}
	}
?>