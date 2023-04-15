<?php
	if(!defined('SOURCES')) die("Error");

	switch($act)
	{
		/* Man */
		case "man":
			viewMans();
			$template = "news/man/mans";
			break;
		case "add":
			$template = "news/man/man_add";
			break;
		case "edit":
			editMan();
			$template = "news/man/man_add";
			break;
		case "save":
			saveMan();
			break;
		case "delete":
			deleteMan();
			break;
;
		default:
			$template = "404";
	}

	/* View man */
	function viewMans()
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
		$sql = "select * from news where type = ? $where order by id desc $limit";
		$items = $d->rawQuery($sql,array($type));
		$sqlNum = "select count(*) as 'num' from news where type = ? $where order by id desc";
		$count = $d->rawQueryOne($sqlNum,array($type));
		$total = (!empty($count)) ? $count['num'] : 0;
		$url = "index.php?source=news&act=man".$strUrl."&type=".$type;
		$paging = $func->pagination($total,$perPage,$curPage,$url);
	}

	/* Edit man */
	function editMan()
	{
		global $d, $strUrl, $func, $curPage, $item, $gallery, $type, $com, $act;

		if(!empty($_GET['id'])) $id = htmlspecialchars($_GET['id']);
		else $id = 0;

		if(empty($id))
		{
			$func->transfer("Không nhận được dữ liệu", "index.php?source=news&act=man&type=".$type."&p=".$curPage.$strUrl, false);
		}
		else
		{
			$item = $d->rawQueryOne("select * from news where id = ? and type = ? limit 0,1",array($id,$type));
			if(empty($item))
			{
				$func->transfer("Bài viết không có thực", "index.php?source=product&act=man.&p=".$curPage.$strUrl, false);
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
			$func->transfer("Không nhận được dữ liệu", "index.php?source=news&act=man&type=".$type."&p=".$curPage.$strUrl, false);
		}

		/* Post dữ liệu */
		$message = '';
		$response = array();
		$savehere = (isset($_POST['save-here'])) ? true : false;
		$id = (!empty($_POST['id'])) ? htmlspecialchars($_POST['id']) : 0;
		$data = !empty($_POST['data']) ? $_POST['data'] : null;

		if($data)
		{
			foreach($data as $column => $value)
			{
				$data[$column] = htmlspecialchars($func->sanitize($value));
			}

			if(!empty($config['news'][$type]['slug']))
			{
				if(!empty($_POST['slug'])) $data['slug'] = $func->changeTitle(htmlspecialchars($_POST['slug']));
				else $data['slug'] = (!empty($data['name'])) ? $func->changeTitle($data['name']) : '';
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

		if(!empty($config['news'][$type]['slug']))
		{
			$dataSlug = array();
				$dataSlug['slug'] = $data['slug'];
				$dataSlug['id'] = $id;
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
				$func->redirect("index.php?source=news&act=edit&type=".$type."&p=".$curPage.$strUrl."&id=".$id);
			}
			else
			{
				$func->redirect("index.php?source=news&act=add&type=".$type."&p=".$curPage.$strUrl);
			}
		}

		/* Save data */
		if($id)
		{
			$data['date_updated'] = time();

			$d->where('id', $id);
			$d->where('type', $type);
			if($d->update('news',$data))
			{
				/* Photo */
				if($func->hasFile("file"))
				{
					$photoUpdate = array();
					$file_name = $func->uploadName($_FILES["file"]["name"]);
					
					if($photo = $func->uploadImage("file", $config['news'][$type]['img_type'], "../upload/news/", $file_name))
					{
						$row = $d->rawQueryOne("select id, photo from news where id = ? and type = ? limit 0,1",array($id,$type));

						if(!empty($row))
						{
							$func->deleteFile("../upload/news/".$row['photo']);
						}

						$photoUpdate['photo'] = $photo;
						$d->where('id', $id);
						$d->update('news', $photoUpdate);
						unset($photoUpdate);
					}
				}


				$func->transfer("Cập nhật dữ liệu thành công", "index.php?source=news&act=man&type=".$type."&p=".$curPage.$strUrl);
			}
			else
			{
				$func->transfer("Cập nhật dữ liệu bị lỗi", "index.php?source=news&act=man&type=".$type."&p=".$curPage.$strUrl, false);
			}
		}
		else
		{	
			$data['date_created'] = time();

			if($d->insert('news',$data))
			{
				$id_insert = $d->getLastInsertId();

				/* Photo */
				if($func->hasFile("file"))
				{
					$photoUpdate = array();
					$file_name = $func->uploadName($_FILES['file']["name"]);

					if($photo = $func->uploadImage("file", $config['news'][$type]['img_type'], "../upload/news/", $file_name))
					{
						$photoUpdate['photo'] = $photo;
						$d->where('id', $id_insert);
						$d->update('news', $photoUpdate);
						unset($photoUpdate);
					}
				}

				$func->transfer("Lưu dữ liệu thành công", "index.php?source=news&act=man&type=".$type."&p=".$curPage.$strUrl);

			}
			else
			{
				$func->transfer("Lưu dữ liệu bị lỗi", "index.php?source=news&act=man&type=".$type."&p=".$curPage.$strUrl, false);
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
			$row = $d->rawQueryOne("select id, photo from news where id = ? and type = ? limit 0,1",array($id,$type));

			if(!empty($row))
			{
				/* Xóa chính */
				$func->deleteFile("../upload/news/".$row['photo']);
				$d->rawQuery("delete from news where id = ?",array($id));

				if(count($row))
				{
					foreach($row as $v)
					{
						$func->deleteFile("../upload/news/".$v['photo']);
					}
				}

				$func->transfer("Xóa dữ liệu thành công", "index.php?source=news&act=man&type=".$type."&p=".$curPage.$strUrl);
			}
			else
			{
				$func->transfer("Xóa dữ liệu bị lỗi", "index.php?source=news&act=man&type=".$type."&p=".$curPage.$strUrl, false);
			}
		}
		elseif(isset($_GET['listid']))
		{
			$listid = explode(",",$_GET['listid']);

			for($i=0;$i<count($listid);$i++)
			{
				$id = htmlspecialchars($listid[$i]);

				/* Lấy dữ liệu */
				$row = $d->rawQueryOne("select id, photo from news where id = ? and type = ? limit 0,1",array($id,$type));

				if(!empty($row))
				{
					/* Xóa chính */
					$func->deleteFile("../upload/news/".$row['photo']);
					$d->rawQuery("delete from news where id = ?",array($id));
					if(count($row))
					{
						foreach($row as $v)
						{
							$func->deleteFile("../upload/news/".$v['photo']);
						}

					}
				}
			}

			$func->transfer("Xóa dữ liệu thành công", "index.php?source=news&act=man&type=".$type."&p=".$curPage.$strUrl);
		} 
		else
		{
			$func->transfer("Không nhận được dữ liệu", "index.php?source=news&act=man&type=".$type."&p=".$curPage.$strUrl, false);
		}
	}
?>