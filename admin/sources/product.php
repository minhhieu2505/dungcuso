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
		global $d, $func, $strUrl, $curPage, $item, $type, $com, $act;

		if(!empty($_GET['id'])) $id = htmlspecialchars($_GET['id']);
		else if(!empty($_GET['id_copy'])) $id = htmlspecialchars($_GET['id_copy']);
		else $id = 0;

		if(empty($id))
		{
			$func->transfer("Không nhận được sản phẩm", "index.php?com=product&act=man&type=".$type."&p=".$curPage.$strUrl, false);
		}
		else
		{
			$item = $d->rawQueryOne("select * from #_product where id = ? and type = ? limit 0,1",array($id,$type));

			if(empty($item))
			{
				$func->transfer("sản phẩm không có thực", "index.php?com=product&act=man&type=".$type."&p=".$curPage.$strUrl, false);
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
			$func->transfer("Không nhận được sản phẩm", "index.php?com=product&act=man&type=".$type."&p=".$curPage.$strUrl, false);
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

		    if(!empty($_POST['slugvi'])) $data['slugvi'] = $func->changeTitle(htmlspecialchars($_POST['slugvi']));
		    	else $data['slugvi'] = (!empty($data['namevi'])) ? $func->changeTitle($data['namevi']) : '';

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
			$dataSlug = array();
				$dataSlug['slug'] = $data['slugvi'];
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
		if($id && $act!='save_copy')
		{
			
			$data['date_updated'] = time();
			$d->where('id', $id);
			$d->where('type', $type);
			// die('xx');
			if($d->update('product',$data))
			{
				
				/* Photo */
				if($func->hasFile("file"))
				{
					
					$photoUpdate = array();
					$file_name = $func->uploadName($_FILES["file"]["name"]);

					if($photo = $func->uploadImage("file", $config['product'][$type]['img_type'], '../upload/product/', $file_name))
					{
						$row = $d->rawQueryOne("select id, photo from #_product where id = ? and type = ? limit 0,1",array($id,$type));

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
				$func->transfer("Cập nhật sản phẩm thành công", "index.php?com=product&act=man&type=".$type);
			}
			else
			{
					
				if($savehere)
				{
					$func->transfer("Cập nhật sản phẩm bị lỗi", "index.php?com=product&act=edit&type=".$type."&p=".$curPage.$strUrl."&id=".$id, false);
				}
				else
				{
					$func->transfer("Cập nhật sản phẩm bị lỗi", "index.php?com=product&act=man&type=".$type."&p=".$curPage.$strUrl, false);
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

					if($photo = $func->uploadImage("file", $config['product'][$type]['img_type'], '../upload/product/', $file_name))
					{
						$photoUpdate['photo'] = $photo;
						$d->where('id', $id_insert);
						$d->update('product', $photoUpdate);
						unset($photoUpdate);
					}
				}
				$func->transfer("Lưu sản phẩm thành công", "index.php?com=product&act=man&type=".$type);

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
			$row = $d->rawQueryOne("select id, photo from #_product where id = ? and type = ? limit 0,1",array($id,$type));

			if(!empty($row))
			{
				/* Xóa chính */
				$func->deleteFile('../upload/product/'.$row['photo']);
				$d->rawQuery("delete from #_product where id = ?",array($id));


				$func->transfer("Xóa sản phẩm thành công", "index.php?com=product&act=man&type=".$type."&p=".$curPage.$strUrl);
			}
			else
			{
				$func->transfer("Xóa sản phẩm bị lỗi", "index.php?com=product&act=man&type=".$type."&p=".$curPage.$strUrl, false);
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

			$func->transfer("Xóa sản phẩm thành công", "index.php?com=product&act=man&type=".$type."&p=".$curPage.$strUrl);
		} 
		else
		{
			$func->transfer("Không nhận được sản phẩm", "index.php?com=product&act=man&type=".$type."&p=".$curPage.$strUrl, false);
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
			$func->transfer("Không nhận được sản phẩm", "index.php?com=product&act=man_list&type=".$type."&p=".$curPage.$strUrl, false);
		}
		else
		{
			$item = $d->rawQueryOne("select * from #_product_list where id = ? and type = ? limit 0,1",array($id,$type));
		
			if(empty($item))
			{
				$func->transfer("sản phẩm không có thực", "index.php?com=product&act=man_list&type=".$type."&p=".$curPage.$strUrl, false);
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
			$func->transfer("Không nhận được sản phẩm", "index.php?com=product&act=man_list&type=".$type."&p=".$curPage.$strUrl, false);
		}

		/* Post sản phẩm */
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
			$dataSlug = array();
				$dataSlug['slug'] = $data['slugvi'];
				$dataSlug['id'] = $id;
				$dataSlug['copy'] = false;
				$checkSlug = $func->checkSlug($dataSlug);

				if($checkSlug == 'exist')
				{
					$response['messages'][] = 'Đường dẫn đã tồn tại';
				}
				else if($checkSlug == 'empty')
				{
					$response['messages'][] = 'Đường dẫn không được trống';
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

					if($photo = $func->uploadImage("file", $config['product'][$type]['img_type_list'], '../upload/product/', $file_name))
					{
						$row = $d->rawQueryOne("select id, photo from #_product_list where id = ? and type = ? limit 0,1",array($id,$type));

						if(!empty($row))
						{
							$func->deleteFile('../upload/product/'.$row['photo']);
						}

						$photoUpdate['photo'] = $photo;
						$d->where('id', $id);
						$d->update('product_list', $photoUpdate);
						unset($photoUpdate);
					}
				}

				$func->transfer("Cập nhật sản phẩm thành công", "index.php?com=product&act=man_list&type=".$type."&p=".$curPage.$strUrl);
			}
			else
			{
				$func->transfer("Cập nhật sản phẩm bị lỗi", "index.php?com=product&act=man_list&type=".$type."&p=".$curPage.$strUrl, false);
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

					if($photo = $func->uploadImage("file", $config['product'][$type]['img_type_list'], '../upload/product/', $file_name))
					{
						$photoUpdate['photo'] = $photo;
						$d->where('id', $id_insert);
						$d->update('product_list', $photoUpdate);
						unset($photoUpdate);
					}
				}

				$func->transfer("Lưu sản phẩm thành công", "index.php?com=product&act=man_list&type=".$type."&p=".$curPage.$strUrl);
			}
			else
			{
				$func->transfer("Lưu sản phẩm bị lỗi", "index.php?com=product&act=man_list&type=".$type."&p=".$curPage.$strUrl, false);
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
			/* Lấy sản phẩm */
			$row = $d->rawQueryOne("select id, photo from #_product_list where id = ? and type = ? limit 0,1",array($id,$type));

			if(!empty($row))
			{
				/* Xóa chính */
				$func->deleteFile('../upload/product/'.$row['photo']);
				$d->rawQuery("delete from #_product_list where id = ?",array($id));

				$func->transfer("Xóa sản phẩm thành công", "index.php?com=product&act=man_list&type=".$type."&p=".$curPage.$strUrl);
			}
			else
			{
				$func->transfer("Xóa sản phẩm bị lỗi", "index.php?com=product&act=man_list&type=".$type."&p=".$curPage.$strUrl, false);
			}
		}
		elseif(isset($_GET['listid']))
		{
			$listid = explode(",",$_GET['listid']);

			for($i=0;$i<count($listid);$i++)
			{
				$id = htmlspecialchars($listid[$i]);

				/* Lấy sản phẩm */
				$row = $d->rawQueryOne("select id, photo from #_product_list where id = ? and type = ? limit 0,1",array($id,$type));

				if(!empty($row))
				{
					/* Xóa chính */
					$func->deleteFile('../upload/product/'.$row['photo']);
					$d->rawQuery("delete from #_product_list where id = ?",array($id));
				}
			}

			$func->transfer("Xóa sản phẩm thành công", "index.php?com=product&act=man_list&type=".$type."&p=".$curPage.$strUrl);
		}
		else
		{
			$func->transfer("Không nhận được sản phẩm", "index.php?com=product&act=man_list&type=".$type."&p=".$curPage.$strUrl, false);
		}
	}
?>