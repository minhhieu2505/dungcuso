<?php
	if(!defined('SOURCES')) die("Error");

	/* Kiểm tra active product */
	if(isset($config['product']))
	{
		$arrCheck = array();
		foreach($config['product'] as $k => $v) $arrCheck[] = $k;
		if(!count($arrCheck) || !in_array($type,$arrCheck)) $func->transfer("Trang không tồn tại", "index.php", false);
	}
	else
	{
		$func->transfer("Trang không tồn tại", "index.php", false);	
	}

	/* Cấu hình đường dẫn trả về */
	$strUrl = "";
	$arrUrl = array('id_list','id_cat','id_item','id_sub','id_brand');
	if(isset($_POST['data']))
	{
		$dataUrl = isset($_POST['data']) ? $_POST['data'] : null;
		if($dataUrl)
		{
			foreach($arrUrl as $k => $v)
			{
				if(isset($dataUrl[$arrUrl[$k]])) $strUrl .= "&".$arrUrl[$k]."=".htmlspecialchars($dataUrl[$arrUrl[$k]]);
			}
		}
	}
	else
	{
		foreach($arrUrl as $k => $v)
		{
			if(isset($_REQUEST[$arrUrl[$k]])) $strUrl .= "&".$arrUrl[$k]."=".htmlspecialchars($_REQUEST[$arrUrl[$k]]);
		}

		if(!empty($_REQUEST['comment_status'])) $strUrl .= "&comment_status=".htmlspecialchars($_REQUEST['comment_status']);
		if(isset($_REQUEST['keyword'])) $strUrl .= "&keyword=".htmlspecialchars($_REQUEST['keyword']);
	}

	switch($act)
	{
		/* Man */
		case "man":
			viewMans();
			$template = "product/man/mans";
			break;
		case "add":
			$template = "product/man/man_add";
			break;
		case "edit":
		case "copy":
			if((!isset($config['product'][$type]['copy']) || $config['product'][$type]['copy'] == false) && $act=='copy')
			{
				$template = "404";
				return false;
			}
			editMan();
			$template = "product/man/man_add";
			break;
		case "save":
		case "save_copy":
			saveMan();
			break;
		case "delete":
			deleteMan();
			break;

		/* List */
		case "man_list":
			viewLists();
			$template = "product/list/lists";
			break;
		case "add_list":
			$template = "product/list/list_add";
			break;
		case "edit_list":
			editList();
			$template = "product/list/list_add";
			break;
		case "save_list":
			saveList();
			break;
		case "delete_list":
			deleteList();
			break;
		
		/* Gallery */
		case "man_photo":
		case "add_photo":
		case "edit_photo":
		case "save_photo":
		case "delete_photo":
			include "gallery.php";
			break;

		default:
			$template = "404";
	}

	/* View man */
	function viewMans()
	{
		global $d, $func, $comment, $strUrl, $curPage, $items, $paging, $type;

		$where = "";
		$idlist = (isset($_REQUEST['id_list'])) ? htmlspecialchars($_REQUEST['id_list']) : 0;
		$idcat = (isset($_REQUEST['id_cat'])) ? htmlspecialchars($_REQUEST['id_cat']) : 0;


		if($idlist) $where .= " and id_list=$idlist";
		if($idcat) $where .= " and id_cat=$idcat";

		if(isset($_REQUEST['keyword']))
		{
			$keyword = htmlspecialchars($_REQUEST['keyword']);
			$where .= " and (namevi LIKE '%$keyword%' or nameen LIKE '%$keyword%')";
		}

		$perPage = 10;
		$startpoint = ($curPage * $perPage) - $perPage;
		$limit = " limit ".$startpoint.",".$perPage;
		$sql = "select * from #_product where type = ? $where order by numb,id desc $limit";
		$items = $d->rawQuery($sql,array($type));
		$sqlNum = "select count(*) as 'num' from #_product where type = ? $where order by numb,id desc";
		$count = $d->rawQueryOne($sqlNum,array($type));
		$total = (!empty($count)) ? $count['num'] : 0;
		$url = "index.php?com=product&act=man".$strUrl."&type=".$type;
		$paging = $func->pagination($total,$perPage,$curPage,$url);
	}

	/* Edit man */
	function editMan()
	{
		global $d, $func, $strUrl, $curPage, $item, $gallery, $type, $com, $act;

		if(!empty($_GET['id'])) $id = htmlspecialchars($_GET['id']);
		else if(!empty($_GET['id_copy'])) $id = htmlspecialchars($_GET['id_copy']);
		else $id = 0;

		if(empty($id))
		{
			$func->transfer("Không nhận được dữ liệu", "index.php?com=product&act=man&type=".$type."&p=".$curPage.$strUrl, false);
		}
		else
		{
			$item = $d->rawQueryOne("select * from #_product where id = ? and type = ? limit 0,1",array($id,$type));

			if(empty($item))
			{
				$func->transfer("Dữ liệu không có thực", "index.php?com=product&act=man&type=".$type."&p=".$curPage.$strUrl, false);
			}
			else
			{
				if($act != 'copy')
				{
					/* Get gallery */
					$gallery = $d->rawQuery("select * from #_gallery where id_parent = ? and com = ? and type = ? and kind = ? and val = ? order by numb,id desc",array($id,$com,$type,'man',$type));
				}
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
			$func->transfer("Không nhận được dữ liệu", "index.php?com=product&act=man&type=".$type."&p=".$curPage.$strUrl, false);
		}

		/* Post dữ liệu */
		$message = '';
		$response = array();
		$savehere = (isset($_POST['save-here'])) ? true : false;
		$buildSchema = (isset($_POST['build-schema'])) ? true : false;
		$id = (!empty($_POST['id'])) ? htmlspecialchars($_POST['id']) : 0;
		$data = (!empty($_POST['data'])) ? $_POST['data'] : null;
		$dataTags = (!empty($_POST['dataTags'])) ? $_POST['dataTags'] : null;
		$dataColor = (!empty($_POST['dataColor'])) ? $_POST['dataColor'] : null;
		$dataSize = (!empty($_POST['dataSize'])) ? $_POST['dataSize'] : null;
		$sale_price2 = (!empty($_POST['sale_price2'])) ? $_POST['sale_price2'] : null;
		$regular_price2 = (!empty($_POST['regular_price2'])) ? $_POST['regular_price2'] : null;

		if($data)
		{
			foreach($data as $column => $value)
			{
				$data[$column] = htmlspecialchars($func->sanitize($value));
			}

		    if(!empty($config['product'][$type]['slug']))
		    {
		    	if(!empty($_POST['slugvi'])) $data['slugvi'] = $func->changeTitle(htmlspecialchars($_POST['slugvi']));
		    	else $data['slugvi'] = (!empty($data['namevi'])) ? $func->changeTitle($data['namevi']) : '';
		    	if(!empty($_POST['slugen'])) $data['slugen'] = $func->changeTitle(htmlspecialchars($_POST['slugen']));
		    	else $data['slugen'] = (!empty($data['nameen'])) ? $func->changeTitle($data['nameen']) : '';
		    }

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
			$data['sale_price'] = (isset($data['sale_price']) && $data['sale_price'] != '') ? str_replace(",","",$data['sale_price']) : 0;
			$data['discount'] = (isset($data['discount']) && $data['discount'] != '') ? $data['discount'] : 0;
			$data['type'] = $type;
		}

		/* Post seo */
		if(isset($config['product'][$type]['seo']) && $config['product'][$type]['seo'] == true)
		{
			$dataSeo = (isset($_POST['dataSeo'])) ? $_POST['dataSeo'] : null;
			if($dataSeo)
			{
				foreach($dataSeo as $column => $value)
				{
					$dataSeo[$column] = htmlspecialchars($func->sanitize($value));
				}
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

		if(!empty($config['product'][$type]['slug']))
		{
			foreach($config['website']['slug'] as $k => $v)
			{
				$dataSlug = array();
				$dataSlug['slug'] = $data['slug'.$k];
				$dataSlug['id'] = $id;
				$dataSlug['copy'] = ($act == 'save_copy') ? true : false;
				$checkSlug = $func->checkSlug($dataSlug);

				if($checkSlug == 'exist')
				{
					$response['messages'][] = 'Đường dẫn ('.$v.') đã tồn tại';
				}
				else if($checkSlug == 'empty')
				{
					$response['messages'][] = 'Đường dẫn ('.$v.') không được trống';
				}
			}
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

			if(!empty($dataSeo))
			{
				foreach($dataSeo as $k => $v)
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

			if($id || $act == 'save_copy')
			{
				if($act == 'save_copy')
				{
					$func->redirect("index.php?com=product&act=copy&type=".$type."&p=".$curPage.$strUrl."&id_copy=".$id);
				}
				else
				{
					$func->redirect("index.php?com=product&act=edit&type=".$type."&p=".$curPage.$strUrl."&id=".$id);
				}
			}
			else
			{
				$func->redirect("index.php?com=product&act=add&type=".$type."&p=".$curPage.$strUrl);
			}
		}

		/* Save data */
		if($id && $act!='save_copy')
		{
			$data['date_updated'] = time();

			$d->where('id', $id);
			$d->where('type', $type);
			if($d->update('product',$data))
			{
				if($dataColor){
					for ($i = 0; $i < count($dataColor); $i++) {
						$id_color = $dataColor[$i];
						if($dataColor > 0){
							$row_color = $d->rawQueryOne("select id from #_pricebycolor where id_product = ? and id_color = ? limit 0,1",array($id,$id_color));
							$data1 = array();
							$data1['id_product'] = $id;							
							$data1['regular_price'] = (isset($regular_price2[$i]) && $regular_price2[$i] != '') ? str_replace(",","",$regular_price2[$i]) : 0;
							$data1['sale_price'] = (isset($sale_price2[$i]) && $sale_price2[$i] != '') ? str_replace(",","",$sale_price2[$i]) : 0;
							$data1['id_color'] = $dataColor[$i];
							if(!empty($row_color) && $row_color['id'] > 0) {								
								$d->where('id', $row_color['id']);
								$d->update('pricebycolor',$data1);
							}else{								
								$d->insert('pricebycolor',$data1);
							}
						}
					}
				}
				/* Photo */
				if($func->hasFile("file"))
				{
					$photoUpdate = array();
					$file_name = $func->uploadName($_FILES["file"]["name"]);

					if($photo = $func->uploadImage("file", $config['product'][$type]['img_type'], UPLOAD_PRODUCT, $file_name))
					{
						$row = $d->rawQueryOne("select id, photo from #_product where id = ? and type = ? limit 0,1",array($id,$type));

						if(!empty($row))
						{
							$func->deleteFile(UPLOAD_PRODUCT.$row['photo']);
						}

						$photoUpdate['photo'] = $photo;
						$d->where('id', $id);
						$d->update('product', $photoUpdate);
						unset($photoUpdate);
					}
				}

				/* SEO */
				if(isset($config['product'][$type]['seo']) && $config['product'][$type]['seo'] == true)
				{
					$d->rawQuery("delete from #_seo where id_parent = ? and com = ? and act = ? and type = ?",array($id,$com,'man',$type));

					$dataSeo['id_parent'] = $id;
					$dataSeo['com'] = $com;
					$dataSeo['act'] = 'man';
					$dataSeo['type'] = $type;
					$d->insert('seo',$dataSeo);
				}

				/* Tags */
				if(isset($config['product'][$type]['tags']) && $config['product'][$type]['tags'] == true)
				{
					if($dataTags)
					{
						$d->rawQuery("delete from #_product_tags where id_parent = ?",array($id));
						foreach($dataTags as $v)
						{
							$dataTag = array();
							$dataTag['id_parent'] = $id;
							$dataTag['id_tags'] = $v;
							$d->insert('product_tags',$dataTag);
						}
					}
					else
					{
						$d->rawQuery("delete from #_product_tags where id_parent = ?",array($id));
					}
				}

				/* Sale */
				if(!empty($config['product'][$type]['color']) || !empty($config['product'][$type]['size']))
				{
					if(!empty($dataColor) && !empty($dataSize))
					{
						$dataSale1 = array();
						$dataSale1['id'] = 'id_color';
						$dataSale1['data'] = $dataColor;

						$dataSale2 = array();
						$dataSale2['id'] = 'id_size';
						$dataSale2['data'] = $dataSize;
					}
					else if(!empty($dataColor))
					{
						$dataSale1 = array();
						$dataSale1['id'] = 'id_color';
						$dataSale1['data'] = $dataColor;
					}
					else if(!empty($dataSize))
					{
						$dataSale1 = array();
						$dataSale1['id'] = 'id_size';
						$dataSale1['data'] = $dataSize;
					}

					if(!empty($dataSale1['data']) || !empty($dataSale2['data']))
					{
						$d->rawQuery("delete from #_product_sale where id_parent = ?",array($id));

						foreach($dataSale1['data'] as $v_sale1)
						{
							$dataSale = array();
							$dataSale['id_parent'] = $id;
							$dataSale[$dataSale1['id']] = $v_sale1;

							if(!empty($dataSale2['data']))
							{
								foreach($dataSale2['data'] as $v_sale2)
								{
									$dataSale[$dataSale2['id']] = $v_sale2;
									$d->insert('product_sale',$dataSale);
								}
							}
							else
							{
								$d->insert('product_sale',$dataSale);
							}
						}
					}
					else
					{
						$d->rawQuery("delete from #_product_sale where id_parent = ?",array($id));
					}
				}
				/* Schema */
				if(isset($config['product'][$type]['schema']) && $config['product'][$type]['schema'] == true)
				{
					//Kiểm tra nếu tạo Schema tự động
					if($buildSchema) {
						foreach($config['website']['seo'] as $k => $v) {
							//lấy tên danh mục
							$pro_list = $d->rawQueryOne("select id,name$k as ten from #_product_list where id = ? and type = ? limit 0,1",array($data['id_list'],$type));
							//lấy url thuộc vi,en 
							if($k=='vi' || $k=='en'){
								$url_pro=$configBase.$data['slug'.$k];
							}else{
								$url_pro=$configBase.$data['slugvi'];
							}
							//Kiểm tra hình ảnh
							if($data['photo']!=''){
								$url_img_pro=$configBase.UPLOAD_PRODUCT_L.$data['photo'];
							}else{
								$img_pro = $d->rawQueryOne("select id, photo from #_product where id = ? and type = ? limit 0,1",array($id,$type));
								$url_img_pro=$configBase.UPLOAD_PRODUCT_L.$img_pro['photo'];
							}
							//Tiến hành build schema product
							$dataSchema['schema'.$k]=$func->buildSchemaProduct($id,$data['name'.$k],$url_img_pro,$dataSeo['description'.$k],$data['code'],$pro_list['ten'],$setting['name'.$k],$url_pro,$data['regular_price']);
						}
					}else{
						$dataSchema = (isset($_POST['dataSchema'])) ? $_POST['dataSchema'] : null;
						if($dataSchema)
						{
							foreach($dataSchema as $column => $value)
							{
								$dataSchema[$column] = htmlspecialchars($value);
							}
						}
					}
					$d->where('id_parent', $id);
					$d->where('com', $com);
					$d->where('act', 'man');
					$d->where('type', $type);
					$d->update('seo',$dataSchema);
				}
				if($savehere || $buildSchema)
				{
					$func->transfer("Cập nhật dữ liệu thành công", "index.php?com=product&act=edit&type=".$type."&p=".$curPage.$strUrl."&id=".$id);
				}
				else
				{
					$func->transfer("Cập nhật dữ liệu thành công", "index.php?com=product&act=man&type=".$type."&p=".$curPage.$strUrl);
				}
			}
			else
			{
				if($savehere || $buildSchema)
				{
					$func->transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product&act=edit&type=".$type."&p=".$curPage.$strUrl."&id=".$id, false);
				}
				else
				{
					$func->transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product&act=man&type=".$type."&p=".$curPage.$strUrl, false);
				}
			}
		}
		else
		{	
			$data['date_created'] = time();

			if($d->insert('product',$data))
			{
				$id_insert = $d->getLastInsertId();

				/* Price by Color */
				if($dataColor)
				{
					for ($i = 0; $i < count($dataColor); $i++) {
						if($dataColor[$i] > 0){
							$Price = array();
							$Price['id_product'] = $id_insert;
							$Price['regular_price'] = (isset($regular_price2[$i]) && $regular_price2[$i] != '') ? str_replace(",","",$regular_price2[$i]) : 0;
							$Price['sale_price'] = (isset($sale_price2[$i]) && $sale_price2[$i] != '') ? str_replace(",","",$sale_price2[$i]) : 0;
							$Price['id_color'] = $dataColor[$i];
							$d->insert('pricebycolor',$Price);
						}
					}						
				}

				/* Photo */
				if($func->hasFile("file"))
				{
					$photoUpdate = array();
					$file_name = $func->uploadName($_FILES['file']["name"]);

					if($photo = $func->uploadImage("file", $config['product'][$type]['img_type'], UPLOAD_PRODUCT, $file_name))
					{
						$photoUpdate['photo'] = $photo;
						$d->where('id', $id_insert);
						$d->update('product', $photoUpdate);
						unset($photoUpdate);
					}
				}

				/* Cập nhật hash khi upload multi */
				$hash = (isset($_POST['hash']) && $_POST['hash'] != '') ? addslashes($_POST['hash']) : null;
				if($hash)
				{
					$d->rawQuery("update #_gallery set hash = ?, id_parent = ? where hash = ?",array('',$id_insert,$hash));
				}

				if($act=='save_copy')
				{
					if($savehere || $buildSchema)
					{
						$func->transfer("Sao chép dữ liệu thành công", "index.php?com=product&act=edit&type=".$type."&p=".$curPage.$strUrl."&id=".$id_insert);
					}
					else
					{
						$func->transfer("Sao chép dữ liệu thành công", "index.php?com=product&act=man&type=".$type."&p=".$curPage.$strUrl);
					}
				}
				else
				{
					if($savehere || $buildSchema)
					{
						$func->transfer("Lưu dữ liệu thành công", "index.php?com=product&act=edit&type=".$type."&p=".$curPage.$strUrl."&id=".$id_insert);
					}
					else
					{
						$func->transfer("Lưu dữ liệu thành công", "index.php?com=product&act=man&type=".$type."&p=".$curPage.$strUrl);
					}
				}
			}
			else
			{
				if($act=='save_copy')
				{
					if($savehere)
					{
						$func->transfer("Sao chép dữ liệu bị lỗi", "index.php?com=product&act=edit&type=".$type."&p=".$curPage.$strUrl."&id=".$id_insert, false);
					}
					else
					{
						$func->transfer("Sao chép dữ liệu bị lỗi", "index.php?com=product&act=man&type=".$type."&p=".$curPage.$strUrl, false);
					}
				}
				else
				{
					if($savehere)
					{
						$func->transfer("Lưu dữ liệu bị lỗi", "index.php?com=product&act=edit&type=".$type."&p=".$curPage.$strUrl."&id=".$id_insert, false);
					}
					else
					{
						$func->transfer("Lưu dữ liệu bị lỗi", "index.php?com=product&act=man&type=".$type."&p=".$curPage.$strUrl, false);
					}
				}
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
			/* Lấy dữ liệu */
			$row = $d->rawQueryOne("select id, photo from #_product where id = ? and type = ? limit 0,1",array($id,$type));

			if(!empty($row))
			{
				/* Xóa chính */
				$func->deleteFile(UPLOAD_PRODUCT.$row['photo']);
				$d->rawQuery("delete from #_product where id = ?",array($id));

				/* Xóa gallery */
				$rowGallery = $d->rawQuery("select id, photo, file_attach from #_gallery where id_parent = ? and kind = ? and com = ?",array($id,'man',$com));

				if(count($rowGallery))
				{
					foreach($rowGallery as $v)
					{
						$func->deleteFile(UPLOAD_PRODUCT.$v['photo']);
						$func->deleteFile(UPLOAD_FILE.$v['file_attach']);
					}

					$d->rawQuery("delete from #_gallery where id_parent = ? and kind = ? and com = ?",array($id,'man',$com));
				}

				$func->transfer("Xóa dữ liệu thành công", "index.php?com=product&act=man&type=".$type."&p=".$curPage.$strUrl);
			}
			else
			{
				$func->transfer("Xóa dữ liệu bị lỗi", "index.php?com=product&act=man&type=".$type."&p=".$curPage.$strUrl, false);
			}
		}
		elseif(isset($_GET['listid']))
		{
			$listid = explode(",",$_GET['listid']);

			for($i=0;$i<count($listid);$i++)
			{
				$id = htmlspecialchars($listid[$i]);

				/* Lấy dữ liệu */
				$row = $d->rawQueryOne("select id, photo from #_product where id = ? and type = ? limit 0,1",array($id,$type));

				if(!empty($row))
				{
					/* Xóa chính */
					$func->deleteFile(UPLOAD_PRODUCT.$row['photo']);
					$d->rawQuery("delete from #_product where id = ?",array($id));

					/* Xóa SEO */
					$d->rawQuery("delete from #_seo where id_parent = ? and com = ? and act = ? and type = ?",array($id,$com,'man',$type));

					/* Xóa Tags */
					$d->rawQuery("delete from #_product_tags where id_parent = ?",array($id));

					/* Xóa Sale */
					$d->rawQuery("delete from #_product_sale where id_parent = ?",array($id));

					/* Xóa gallery */
					$rowGallery = $d->rawQuery("select id, photo, file_attach from #_gallery where id_parent = ? and kind = ? and com = ?",array($id,'man',$com));

					if(count($rowGallery))
					{
						foreach($rowGallery as $v)
						{
							$func->deleteFile(UPLOAD_PRODUCT.$v['photo']);
							$func->deleteFile(UPLOAD_FILE.$v['file_attach']);
						}

						$d->rawQuery("delete from #_gallery where id_parent = ? and kind = ? and com = ?",array($id,'man',$com));
					}

					/* Xóa comment */
					$rowComment = $d->rawQuery("select id, id_parent from #_comment where id_variant = ? and type = ?",array($id,$type));

					if(!empty($rowComment))
					{
						foreach($rowComment as $v)
						{
							if($v['id_parent'] == 0)
							{
								/* Xóa comment photo */
								$rowCommentPhoto = $d->rawQuery("select photo from #_comment_photo where id_parent = ?",array($v['id']));

								if(!empty($rowCommentPhoto))
								{
									/* Xóa image */
									foreach($rowCommentPhoto as $v_photo)
									{
										$func->deleteFile(UPLOAD_PHOTO.$v_photo['photo']);
									}

									/* Xóa photo */
									$d->rawQuery("delete from #_comment_photo where id_parent = ?",array($v['id']));
								}

								/* Xóa comment video */
								$rowCommentVideo = $d->rawQueryOne("select photo, video from #_comment_video where id_parent = ? limit 0,1",array($v['id']));

								if(!empty($rowCommentVideo))
								{
									$func->deleteFile(UPLOAD_PHOTO.$rowCommentVideo['photo']);
									$func->deleteFile(UPLOAD_VIDEO.$rowCommentVideo['video']);
									$d->rawQuery("delete from #_comment_video where id_parent = ?",array($v['id']));
								}

								/* Xóa child */
								$d->rawQuery("delete from #_comment where id_parent = ? and type = ?",array($v['id'],$type));
							}

							/* Xóa comment main */
							$d->rawQuery("delete from #_comment where id = ? and type = ?",array($v['id'],$type));
						}
					}
				}
			}

			$func->transfer("Xóa dữ liệu thành công", "index.php?com=product&act=man&type=".$type."&p=".$curPage.$strUrl);
		} 
		else
		{
			$func->transfer("Không nhận được dữ liệu", "index.php?com=product&act=man&type=".$type."&p=".$curPage.$strUrl, false);
		}
	}
	/* View list */
	function viewLists()
	{
		global $d, $func, $strUrl, $curPage, $items, $paging, $type;
		
		$where = "";

		if(isset($_REQUEST['keyword']))
		{
			$keyword = htmlspecialchars($_REQUEST['keyword']);
			$where .= " and (namevi LIKE '%$keyword%' or nameen LIKE '%$keyword%')";
		}

		$perPage = 10;
		$startpoint = ($curPage * $perPage) - $perPage;
		$limit = " limit ".$startpoint.",".$perPage;
		$sql = "select * from #_product_list where type = ? $where order by numb,id desc $limit";
		$items = $d->rawQuery($sql,array($type));
		$sqlNum = "select count(*) as 'num' from #_product_list where type = ? $where order by numb,id desc";
		$count = $d->rawQueryOne($sqlNum,array($type));
		$total = (!empty($count)) ? $count['num'] : 0;
		$url = "index.php?com=product&act=man_list&type=".$type;
		$paging = $func->pagination($total,$perPage,$curPage,$url);
	}

	/* Edit list */
	function editList()
	{
		global $d, $func, $strUrl, $curPage, $item, $gallery, $type, $com;

		$id = (!empty($_GET['id'])) ? htmlspecialchars($_GET['id']) : 0;

		if(empty($id))
		{
			$func->transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_list&type=".$type."&p=".$curPage.$strUrl, false);
		}
		else
		{
			$item = $d->rawQueryOne("select * from #_product_list where id = ? and type = ? limit 0,1",array($id,$type));
		
			if(empty($item))
			{
				$func->transfer("Dữ liệu không có thực", "index.php?com=product&act=man_list&type=".$type."&p=".$curPage.$strUrl, false);
			}
			else
			{
				/* Get gallery */
				$gallery = $d->rawQuery("select * from #_gallery where id_parent = ? and com = ? and type = ? and kind = ? and val = ? order by numb,id desc",array($id,$com,$type,'man_list',$type));
			}
		}
	}

	/* Save list */
	function saveList()
	{
		global $d, $strUrl, $func, $flash, $curPage, $config, $com, $type;

		/* Check post */
		if(empty($_POST))
		{
			$func->transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_list&type=".$type."&p=".$curPage.$strUrl, false);
		}

		/* Post dữ liệu */
		$message = '';
		$response = array();
		$id = (!empty($_POST['id'])) ? htmlspecialchars($_POST['id']) : 0;
		$data = (!empty($_POST['data'])) ? $_POST['data'] : null;
		if($data)
		{
			foreach($data as $column => $value)
			{
				$data[$column] = htmlspecialchars($func->sanitize($value));
			}

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

		    if(!empty($config['product'][$type]['slug_list']))
		    {
		    	if(!empty($_POST['slugvi'])) $data['slugvi'] = $func->changeTitle(htmlspecialchars($_POST['slugvi']));
		    	else $data['slugvi'] = (!empty($data['namevi'])) ? $func->changeTitle($data['namevi']) : '';
		    	if(!empty($_POST['slugen'])) $data['slugen'] = $func->changeTitle(htmlspecialchars($_POST['slugen']));
		    	else $data['slugen'] = (!empty($data['nameen'])) ? $func->changeTitle($data['nameen']) : '';
		    }

			$data['type'] = $type;
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

		if(!empty($config['product'][$type]['slug_list']))
		{
			foreach($config['website']['slug'] as $k => $v)
			{
				$dataSlug = array();
				$dataSlug['slug'] = $data['slug'.$k];
				$dataSlug['id'] = $id;
				$dataSlug['copy'] = false;
				$checkSlug = $func->checkSlug($dataSlug);

				if($checkSlug == 'exist')
				{
					$response['messages'][] = 'Đường dẫn ('.$v.') đã tồn tại';
				}
				else if($checkSlug == 'empty')
				{
					$response['messages'][] = 'Đường dẫn ('.$v.') không được trống';
				}
			}
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
				$func->redirect("index.php?com=product&act=edit_list&type=".$type."&p=".$curPage.$strUrl."&id=".$id);
			}
			else
			{
				$func->redirect("index.php?com=product&act=add_list&type=".$type."&p=".$curPage.$strUrl);
			}
		}

		/* Save data */
		if($id)
		{
			$data['date_updated'] = time();
			
			$d->where('id', $id);
			$d->where('type', $type);
			if($d->update('product_list',$data))
			{
				/* Photo */
				if($func->hasFile("file"))
				{
					$photoUpdate = array();
					$file_name = $func->uploadName($_FILES["file"]["name"]);

					if($photo = $func->uploadImage("file", $config['product'][$type]['img_type_list'], UPLOAD_PRODUCT, $file_name))
					{
						$row = $d->rawQueryOne("select id, photo from #_product_list where id = ? and type = ? limit 0,1",array($id,$type));

						if(!empty($row))
						{
							$func->deleteFile(UPLOAD_PRODUCT.$row['photo']);
						}

						$photoUpdate['photo'] = $photo;
						$d->where('id', $id);
						$d->update('product_list', $photoUpdate);
						unset($photoUpdate);
					}
				}

				$func->transfer("Cập nhật dữ liệu thành công", "index.php?com=product&act=man_list&type=".$type."&p=".$curPage.$strUrl);
			}
			else
			{
				$func->transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product&act=man_list&type=".$type."&p=".$curPage.$strUrl, false);
			}
		}
		else
		{		
			$data['date_created'] = time();
			
			if($d->insert('product_list',$data))
			{
				$id_insert = $d->getLastInsertId();

				/* Photo */
				if($func->hasFile("file"))
				{
					$photoUpdate = array();
					$file_name = $func->uploadName($_FILES['file']["name"]);

					if($photo = $func->uploadImage("file", $config['product'][$type]['img_type_list'], UPLOAD_PRODUCT, $file_name))
					{
						$photoUpdate['photo'] = $photo;
						$d->where('id', $id_insert);
						$d->update('product_list', $photoUpdate);
						unset($photoUpdate);
					}
				}
				/* Cập nhật hash khi upload multi */
				$hash = (isset($_POST['hash']) && $_POST['hash'] != '') ? addslashes($_POST['hash']) : null;
				if($hash)
				{
					$d->rawQuery("update #_gallery set hash = ?, id_parent = ? where hash = ?",array('',$id_insert,$hash));
				}

				$func->transfer("Lưu dữ liệu thành công", "index.php?com=product&act=man_list&type=".$type."&p=".$curPage.$strUrl);
			}
			else
			{
				$func->transfer("Lưu dữ liệu bị lỗi", "index.php?com=product&act=man_list&type=".$type."&p=".$curPage.$strUrl, false);
			}
		}
	}

	/* Delete list */
	function deleteList()
	{
		global $d, $strUrl, $func, $curPage, $com, $type;

		$id = (!empty($_GET['id'])) ? htmlspecialchars($_GET['id']) : 0;

		if($id)
		{
			/* Lấy dữ liệu */
			$row = $d->rawQueryOne("select id, photo from #_product_list where id = ? and type = ? limit 0,1",array($id,$type));

			if(!empty($row))
			{
				/* Xóa chính */
				$func->deleteFile(UPLOAD_PRODUCT.$row['photo']);
				$d->rawQuery("delete from #_product_list where id = ?",array($id));

				/* Xóa SEO */
				$d->rawQuery("delete from #_seo where id_parent = ? and com = ? and act = ? and type = ?",array($id,$com,'man_list',$type));

				/* Xóa gallery */
				$row = $d->rawQuery("select id, photo, file_attach from #_gallery where id_parent = ? and kind = ? and com = ?",array($id,'man_list',$com));

				if(count($row))
				{
					foreach($row as $v)
					{
						$func->deleteFile(UPLOAD_PRODUCT.$v['photo']);
						$func->deleteFile(UPLOAD_FILE.$v['file_attach']);
					}

					$d->rawQuery("delete from #_gallery where id_parent = ? and kind = ? and com = ?",array($id,'man_list',$com));
				}

				$func->transfer("Xóa dữ liệu thành công", "index.php?com=product&act=man_list&type=".$type."&p=".$curPage.$strUrl);
			}
			else
			{
				$func->transfer("Xóa dữ liệu bị lỗi", "index.php?com=product&act=man_list&type=".$type."&p=".$curPage.$strUrl, false);
			}
		}
		elseif(isset($_GET['listid']))
		{
			$listid = explode(",",$_GET['listid']);

			for($i=0;$i<count($listid);$i++)
			{
				$id = htmlspecialchars($listid[$i]);

				/* Lấy dữ liệu */
				$row = $d->rawQueryOne("select id, photo from #_product_list where id = ? and type = ? limit 0,1",array($id,$type));

				if(!empty($row))
				{
					/* Xóa chính */
					$func->deleteFile(UPLOAD_PRODUCT.$row['photo']);
					$d->rawQuery("delete from #_product_list where id = ?",array($id));

					/* Xóa SEO */
					$d->rawQuery("delete from #_seo where id_parent = ? and com = ? and act = ? and type = ?",array($id,$com,'man_list',$type));

					/* Xóa gallery */
					$row = $d->rawQuery("select id, photo, file_attach from #_gallery where id_parent = ? and kind = ? and com = ?",array($id,'man_list',$com));

					if(count($row))
					{
						foreach($row as $v)
						{
							$func->deleteFile(UPLOAD_PRODUCT.$v['photo']);
							$func->deleteFile(UPLOAD_FILE.$v['file_attach']);
						}

						$d->rawQuery("delete from #_gallery where id_parent = ? and kind = ? and com = ?",array($id,'man_list',$com));
					}
				}
			}

			$func->transfer("Xóa dữ liệu thành công", "index.php?com=product&act=man_list&type=".$type."&p=".$curPage.$strUrl);
		}
		else
		{
			$func->transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_list&type=".$type."&p=".$curPage.$strUrl, false);
		}
	}

	/* Get cat */
	function viewCats()
	{
		global $d, $func, $strUrl, $curPage, $items, $paging, $type;
		
		$where = "";
		$idlist = (isset($_REQUEST['id_list'])) ? htmlspecialchars($_REQUEST['id_list']) : 0;

		if($idlist) $where .= " and id_list=$idlist";
		if(isset($_REQUEST['keyword']))
		{
			$keyword = htmlspecialchars($_REQUEST['keyword']);
			$where .= " and (namevi LIKE '%$keyword%' or nameen LIKE '%$keyword%')";
		}

		$perPage = 10;
		$startpoint = ($curPage * $perPage) - $perPage;
		$limit = " limit ".$startpoint.",".$perPage;
		$sql = "select * from #_product_cat where type = ? $where order by numb,id desc $limit";
		$items = $d->rawQuery($sql,array($type));
		$sqlNum = "select count(*) as 'num' from #_product_cat where type = ? $where order by numb,id desc";
		$count = $d->rawQueryOne($sqlNum,array($type));
		$total = (!empty($count)) ? $count['num'] : 0;
		$url = "index.php?com=product&act=man_cat".$strUrl."&type=".$type;
		$paging = $func->pagination($total,$perPage,$curPage,$url);
	}

	/* Edit cat */
	function editCat()
	{
		global $d, $func, $strUrl, $curPage, $item, $type;

		$id = (!empty($_GET['id'])) ? htmlspecialchars($_GET['id']) : 0;

		if(empty($id))
		{
			$func->transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_cat&type=".$type."&p=".$curPage.$strUrl, false);
		}
		else
		{
			$item = $d->rawQueryOne("select * from #_product_cat where id = ? and type = ? limit 0,1",array($id,$type));

			if(empty($item))
			{
				$func->transfer("Dữ liệu không có thực", "index.php?com=product&act=man_cat&type=".$type."&p=".$curPage.$strUrl, false);
			}
		}
	}

	/* Save cat */
	function saveCat()
	{
		global $d, $strUrl, $func, $flash, $curPage, $config, $com, $type;

		/* Check post */
		if(empty($_POST))
		{
			$func->transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_cat&type=".$type."&p=".$curPage.$strUrl, false);
		}

		/* Post dữ liệu */
		$message = '';
		$response = array();
		$id = (!empty($_POST['id'])) ? htmlspecialchars($_POST['id']) : 0;
		$data = (!empty($_POST['data'])) ? $_POST['data'] : null;
		if($data)
		{
			foreach($data as $column => $value)
			{
				$data[$column] = htmlspecialchars($func->sanitize($value));
			}

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

		    if(!empty($config['product'][$type]['slug_cat']))
		    {
		    	if(!empty($_POST['slugvi'])) $data['slugvi'] = $func->changeTitle(htmlspecialchars($_POST['slugvi']));
		    	else $data['slugvi'] = (!empty($data['namevi'])) ? $func->changeTitle($data['namevi']) : '';
		    	if(!empty($_POST['slugen'])) $data['slugen'] = $func->changeTitle(htmlspecialchars($_POST['slugen']));
		    	else $data['slugen'] = (!empty($data['nameen'])) ? $func->changeTitle($data['nameen']) : '';
		    }
			
			$data['type'] = $type;
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

		if(!empty($config['product'][$type]['slug_cat']))
		{
			foreach($config['website']['slug'] as $k => $v)
			{
				$dataSlug = array();
				$dataSlug['slug'] = $data['slug'.$k];
				$dataSlug['id'] = $id;
				$dataSlug['copy'] = false;
				$checkSlug = $func->checkSlug($dataSlug);

				if($checkSlug == 'exist')
				{
					$response['messages'][] = 'Đường dẫn ('.$v.') đã tồn tại';
				}
				else if($checkSlug == 'empty')
				{
					$response['messages'][] = 'Đường dẫn ('.$v.') không được trống';
				}
			}
		}
		/* Save data */
		if($id)
		{
			$data['date_updated'] = time();
			
			$d->where('id', $id);
			$d->where('type', $type);
			if($d->update('product_cat',$data))
			{
				/* Photo */
				if($func->hasFile("file"))
				{
					$photoUpdate = array();
					$file_name = $func->uploadName($_FILES["file"]["name"]);

					if($photo = $func->uploadImage("file", $config['product'][$type]['img_type_cat'], UPLOAD_PRODUCT, $file_name))
					{
						$row = $d->rawQueryOne("select id, photo from #_product_cat where id = ? and type = ? limit 0,1",array($id,$type));

						if(!empty($row))
						{
							$func->deleteFile(UPLOAD_PRODUCT.$row['photo']);
						}

						$photoUpdate['photo'] = $photo;
						$d->where('id', $id);
						$d->update('product_cat', $photoUpdate);
						unset($photoUpdate);
					}
				}

				/* SEO */
				if(isset($config['product'][$type]['seo_cat']) && $config['product'][$type]['seo_cat'] == true)
				{
					$d->rawQuery("delete from #_seo where id_parent = ? and com = ? and act = ? and type = ?",array($id,$com,'man_cat',$type));

					$dataSeo['id_parent'] = $id;
					$dataSeo['com'] = $com;
					$dataSeo['act'] = 'man_cat';
					$dataSeo['type'] = $type;
					$d->insert('seo',$dataSeo);
				}

				$func->transfer("Cập nhật dữ liệu thành công", "index.php?com=product&act=man_cat&type=".$type."&p=".$curPage.$strUrl);
			}
			else
			{
				$func->transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product&act=man_cat&type=".$type."&p=".$curPage.$strUrl, false);
			}
		}
		else
		{
			$data['date_created'] = time();
			
			if($d->insert('product_cat',$data))
			{
				$id_insert = $d->getLastInsertId();

				/* Photo */
				if($func->hasFile("file"))
				{
					$photoUpdate = array();
					$file_name = $func->uploadName($_FILES['file']["name"]);

					if($photo = $func->uploadImage("file", $config['product'][$type]['img_type_cat'], UPLOAD_PRODUCT, $file_name))
					{
						$photoUpdate['photo'] = $photo;
						$d->where('id', $id_insert);
						$d->update('product_cat', $photoUpdate);
						unset($photoUpdate);
					}
				}

				/* SEO */
				if(isset($config['product'][$type]['seo_cat']) && $config['product'][$type]['seo_cat'] == true)
				{
					$dataSeo['id_parent'] = $id_insert;
					$dataSeo['com'] = $com;
					$dataSeo['act'] = 'man_cat';
					$dataSeo['type'] = $type;
					$d->insert('seo',$dataSeo);
				}

				$func->transfer("Lưu dữ liệu thành công", "index.php?com=product&act=man_cat&type=".$type."&p=".$curPage.$strUrl);
			}
			else
			{
				$func->transfer("Lưu dữ liệu bị lỗi", "index.php?com=product&act=man_cat&type=".$type."&p=".$curPage.$strUrl, false);
			}
		}
	}

	/* Delete cat */
	function deleteCat()
	{
		global $d, $strUrl, $func, $curPage, $com, $type;

		$id = (!empty($_GET['id'])) ? htmlspecialchars($_GET['id']) : 0;

		if($id)
		{
			/* Lấy dữ liệu */
			$row = $d->rawQueryOne("select id, photo from #_product_cat where id = ? and type = ? limit 0,1",array($id,$type));

			if(!empty($row))
			{
				/* Xóa chính */
				$func->deleteFile(UPLOAD_PRODUCT.$row['photo']);
				$d->rawQuery("delete from #_product_cat where id = ?",array($id));

				/* Xóa SEO */
				$d->rawQuery("delete from #_seo where id_parent = ? and com = ? and act = ? and type = ?",array($id,$com,'man_cat',$type));

				$func->transfer("Xóa dữ liệu thành công", "index.php?com=product&act=man_cat&type=".$type."&p=".$curPage.$strUrl);
			}
			else
			{
				$func->transfer("Xóa dữ liệu bị lỗi", "index.php?com=product&act=man_cat&type=".$type."&p=".$curPage.$strUrl, false);
			}
		}
		elseif(isset($_GET['listid']))
		{
			$listid = explode(",",$_GET['listid']);

			for($i=0;$i<count($listid);$i++)
			{
				$id = htmlspecialchars($listid[$i]);

				/* Lấy dữ liệu */
				$row = $d->rawQueryOne("select id, photo from #_product_cat where id = ? and type = ? limit 0,1",array($id,$type));

				if(!empty($row))
				{
					/* Xóa chính */
					$func->deleteFile(UPLOAD_PRODUCT.$row['photo']);
					$d->rawQuery("delete from #_product_cat where id = ?",array($id));

					/* Xóa SEO */
					$d->rawQuery("delete from #_seo where id_parent = ? and com = ? and act = ? and type = ?",array($id,$com,'man_cat',$type));
				}
			}

			$func->transfer("Xóa dữ liệu thành công", "index.php?com=product&act=man_cat&type=".$type."&p=".$curPage.$strUrl);
		}
		else
		{
			$func->transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_cat&type=".$type."&p=".$curPage.$strUrl, false);
		}
	}
?>