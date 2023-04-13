<?php
	if(!defined('SOURCES')) die("Error");

	switch($act)
	{
		/* Photo static */
		case "photo_static":
			viewPhotoStatic();
			$template = "photo/static/photo_static";
			break;
		case "save_static":
			savePhotoStatic();
			break;

		/* Photos */
		case "man_photo":
			viewPhotos();
			$template 
= "photo/man/photos";
			break;
		case "add_photo":
			$template = "photo/man/photo_add";
			break;
		case "edit_photo":
			editPhoto();
			$template = "photo/man/photo_edit";
			break;
		case "save_photo":
			savePhoto();
			break;
		case "delete_photo":
			deletePhoto();
			break;

		default:
			$template = "404";
	}

	/* View photo static */
	function viewPhotoStatic()
	{
		global $d, $item, $type;

		$item = $d->rawQueryOne("select * from multi_media where type = ? limit 0,1",array($type));
	}

	/* Save photo static */
	function savePhotoStatic()
	{
		global $d, $func, $flash, $config, $type;

		/* Post dữ liệu */
		$row = $d->rawQueryOne("select id from multi_media where type = ? limit 0,1",array($type));
		$message = '';
		$response = array();
		$id = (!empty($row['id']) && $row['id'] > 0) ? $row['id'] : 0;
		$data = (!empty($_POST['data'])) ? $_POST['data'] : null;
		if($data)
		{
			foreach($data as $column => $value)
			{
				if(is_array($value))
				{
					foreach($value as $k2 => $v2) $option[$k2] = $func->sanitize($v2);
					$data[$column] = json_encode($option);
				}
				else
				{
					$data[$column] = htmlspecialchars($func->sanitize($value));
				}
			}
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

		/* Valid data link */
		if(!empty($config['photo']['photo_static'][$type]['link']))
		{
			if(!empty($data['link']) && !$func->isUrl($data['link']))
			{
				$response['messages'][] = 'Đường dẫn không hợp lệ';
			}
		}

		/* Valid data video */
		if(!empty($config['photo']['photo_static'][$type]['video']))
		{
			if(empty($data['link_video']))
			{
				$response['messages'][] = 'Đường dẫn video không được trống';
			}

			if(!empty($data['link_video']) && !$func->isYoutube($data['link_video']))
			{
				$response['messages'][] = 'Đường dẫn video không hợp lệ';
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
			$func->redirect("index.php?source=photo&act=photo_static&type=".$type);
		}

		
		/* Save data */
		if($id)
		{
			$data['date_updated'] = time();

			$d->where('id', $id);
			$d->where('type', $type);
			if($d->update('multi_media',$data))
			{
				/* Photo */
				if($func->hasFile("file"))
				{
					$photoUpdate = array();
					$file_name = $func->uploadName($_FILES["file"]["name"]);

					if($photo = $func->uploadImage("file", $config['photo']['photo_static'][$type]['img_type'], "../upload/photo/", $file_name))
					{
						$row = $d->rawQueryOne("select id, photo from multi_media where id = ? and type = ? limit 0,1",array($id,$type));

						if(!empty($row))
						{
							$func->deleteFile("../upload/photo/".$row['photo']);
						}

						$photoUpdate['photo'] = $photo;
						$d->where('id', $id);
						$d->update('multi_media', $photoUpdate);
						unset($photoUpdate);
					}
				}

				$func->transfer("Cập nhật dữ liệu thành công", "index.php?source=photo&act=photo_static&type=".$type);
			}
			else
			{
				$func->transfer("Cập nhật dữ liệu bị lỗi", "index.php?source=photo&act=photo_static&type=".$type, false);
			}
		}
		else
		{
			
			$data['date_created'] = time();

			if((!empty($config['photo']['photo_static'][$type]['images']) && $func->hasFile("file")) || (isset($data['link_video']) && $data['link_video'] != ''))
			{
				if($d->insert('multi_media',$data))
				{
					$id_insert = $d->getLastInsertId();

					/* Photo */
					if($func->hasFile("file"))
					{
						$photoUpdate = array();
						$file_name = $func->uploadName($_FILES['file']["name"]);

						if($photo = $func->uploadImage("file", $config['photo']['photo_static'][$type]['img_type'], './upload/photo', $file_name))
						{
							$photoUpdate['photo'] = $photo;
							$d->where('id', $id_insert);
							$d->update('multi_media', $photoUpdate);
							unset($photoUpdate);
						}
					}

					$func->transfer("Lưu dữ liệu thành công", "index.php?source=photo&act=photo_static&type=".$type);
				}
				else
				{
					$func->transfer("Lưu dữ liệu bị lỗi", "index.php?source=photo&act=photo_static&type=".$type, false);
				}
			}
			else
			{
				$func->transfer("Dữ liệu rỗng", "index.php?source=photo&act=photo_static&type=".$type, false);
			}
		}
	}

	/* View photo */
	function viewPhotos()
	{
		global $d, $func, $curPage, $items, $paging, $type;

		$perPage = 10;
		$startpoint = ($curPage * $perPage) - $perPage;
		$limit = " limit ".$startpoint.",".$perPage;
		$sql = "select * from multi_media where type = ?  order by id desc $limit";
		$items = $d->rawQuery($sql,array($type));
		$sqlNum = "select count(*) as 'num' from multi_media where type = ? order by id desc";
		$count = $d->rawQueryOne($sqlNum,array($type));
		$total = (!empty($count)) ? $count['num'] : 0;
		$url = "index.php?source=photo&act=man_photo&type=".$type;
		$paging = $func->pagination($total,$perPage,$curPage,$url);
	}

	/* Edit photo */
	function editPhoto()
	{
		global $d, $func, $curPage, $item, $list_cat, $type;
		
		$id = (!empty($_GET['id'])) ? htmlspecialchars($_GET['id']) : 0;

		if(empty($id))
		{
			$func->transfer("Không nhận được dữ liệu", "index.php?source=photo&act=man_photo&type=".$type."&p=".$curPage, false);
		}
		else
		{
			$item = $d->rawQueryOne("select * from multi_media where id = ? and type = ? limit 0,1",array($id,$type));

			if(empty($item))
			{
				$func->transfer("Dữ liệu không có thực", "index.php?source=photo&act=man_photo&type=".$type."&p=".$curPage, false);
			}
		}
	}

	/* Save photo */
	function savePhoto()
	{
		global $d, $func, $flash, $curPage, $config, $type;

		/* Check post */
		if(empty($_POST))
		{
			$func->transfer("Không nhận được dữ liệu", "index.php?source=photo&act=man_photo&type=".$type."&p=".$curPage, false);
		}

		/* Post dữ liệu */
		$message = '';
		$response = array();
		$id = (!empty($_POST['id'])) ? htmlspecialchars($_POST['id']) : 0;
		$data = (!empty($_POST['data'])) ? $_POST['data'] : null;
		$dataMultiTemp = (!empty($_POST['dataMulti'])) ? $_POST['dataMulti'] : null;
		if($data)
		{
			foreach($data as $column => $value)
			{
				$data[$column] = htmlspecialchars($func->sanitize($value));
			}
		}

		/* Save data */
		if($id>0)
		{
			/* Valid data link */
			if(!empty($config['photo']['man_photo'][$type]['link_photo']))
			{
				if(!empty($data['link']) && !$func->isUrl($data['link']))
				{
					$response['messages'][] = 'Đường dẫn không hợp lệ';
				}
			}

			/* Valid data video */
			if(!empty($config['photo']['man_photo'][$type]['video_photo']))
			{
				if(empty($data['link_video']))
				{
					$response['messages'][] = 'Đường dẫn video không được trống';
				}

				if(!empty($data['link_video']) && !$func->isYoutube($data['link_video']))
				{
					$response['messages'][] = 'Đường dẫn video không hợp lệ';
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
				$func->redirect("index.php?source=photo&act=edit_photo&type=".$type."&id=".$id);
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

			$data['date_updated'] = time();


			$d->where('id', $id);
			$d->where('type', $type);
			if($d->update('multi_media',$data))
			{
				/* Photo */
				if($func->hasFile("file"))
				{
					$photoUpdate = array();
					$file_name = $func->uploadName($_FILES["file"]["name"]);

					if($photo = $func->uploadImage("file", $config['photo']['man_photo'][$type]['img_type_photo'], '../upload/photo/', $file_name))
					{
						$row = $d->rawQueryOne("select id, photo from multi_media where id = ? and type = ? limit 0,1",array($id,$type));

						if(!empty($row))
						{
							$func->deleteFile('../upload/photo/'.$row['photo']);
						}

						$photoUpdate['photo'] = $photo;
						$d->where('id', $id);
						$d->update('multi_media', $photoUpdate);
						unset($photoUpdate);
					}
				}

				$func->transfer("Cập nhật dữ liệu thành công", "index.php?source=photo&act=man_photo&type=".$type."&p=".$curPage);
			}
			else
			{
				$func->transfer("Cập nhật dữ liệu bị lỗi", "index.php?source=photo&act=man_photo&type=".$type."&p=".$curPage, false);
			}
		}
		else
		{
			$numberPhoto = (isset($config['photo']['man_photo'][$type]['number_photo'])) ? $config['photo']['man_photo'][$type]['number_photo'] : 0;

			if($numberPhoto && $dataMultiTemp)
			{
				$success = false;

				for($i=0;$i<count($dataMultiTemp);$i++)
				{
					$success_photo = false;
					$success_video = false;
					$dataMulti = $dataMultiTemp[$i];
					if(!empty($dataMulti['status']))
					{
						$dataStatus = implode(",", $dataMulti['status']);
						$dataMulti['status'] = (!empty($dataStatus)) ? rtrim($dataStatus, ",") : "";
					}
					else
					{
						$dataMulti['status'] = "";
					}
					$dataMulti['date_created'] = time();
					$dataMulti['type'] = $type;

					if(isset($config['photo']['man_photo'][$type]['images_photo']) && $config['photo']['man_photo'][$type]['images_photo'] == true)
					{
						if($func->hasFile("file".$i))
						{
							$success_photo = true;
						}
					}

					/* Valid data video */
					if(isset($config['photo']['man_photo'][$type]['video_photo']) && $config['photo']['man_photo'][$type]['video_photo'] == true)
					{
						if(!empty($dataMulti['link_video']))
						{
							$success_video = true;
						}

						if(!empty($dataMulti['link_video']) && !$func->isYoutube($dataMulti['link_video']))
						{
							$response['messages'][] = 'Đường dẫn video không hợp lệ';
						}
					}

					/* Valid data link */
					if(!empty($config['photo']['man_photo'][$type]['link_photo']))
					{
						if(!empty($dataMulti['link']) && !$func->isUrl($dataMulti['link']))
						{
							$response['messages'][] = 'Đường dẫn không hợp lệ';
						}
					}

					if(!empty($response))
					{
						/* Flash data */
						if(!empty($dataMulti))
						{
							foreach($dataMulti as $k => $v)
							{
								if(!empty($v))
								{
									$flash->set($k.$i, $v);
								}
							}
						}
					}

					if(($success_photo || $success_video) && empty($response))
					{
						if($d->insert('multi_media',$dataMulti))
						{
							$id_insert = $d->getLastInsertId();

							/* Photo */
							if(isset($config['photo']['man_photo'][$type]['images_photo']) && $config['photo']['man_photo'][$type]['images_photo'] == true)
							{
								if($func->hasFile("file".$i))
								{
									$photoUpdate = array();
									$file_name = $func->uploadName($_FILES["file".$i]["name"]);

									if($photo = $func->uploadImage("file".$i, $config['photo']['man_photo'][$type]['img_type_photo'], "../upload/photo/",$file_name.$i))
									{
										$photoUpdate['photo'] = $photo;
										$d->where('id', $id_insert);
										$d->update('multi_media', $photoUpdate);
										unset($photoUpdate);
									}
								}
							}

							$success = true;
						}
						else
						{
							$func->transfer("Lưu dữ liệu bị lỗi", "index.php?source=photo&act=man_photo&type=".$type."&p=".$curPage, false);
						}
					}
				}

				if(!empty($response))
				{
					/* Errors */
					$response['status'] = 'danger';
					$message = base64_encode(json_encode($response));
					$flash->set('message', $message);
					$func->redirect("index.php?source=photo&act=add_photo&type=".$type);
				}

				if($success == false)
				{
					$func->transfer("Lưu dữ liệu bị lỗi", "index.php?source=photo&act=man_photo&type=".$type."&p=".$curPage, false);
				}
				else
				{
					$func->transfer("Lưu dữ liệu thành công", "index.php?source=photo&act=man_photo&type=".$type."&p=".$curPage);
				}
			}

			$func->transfer("Dữ liệu rỗng", "index.php?source=photo&act=man_photo&type=".$type."&p=".$curPage, false);
		}
		
	}

	/* Delete photo */
	function deletePhoto()
	{
		global $d, $func, $curPage, $type;
		
		$id = (!empty($_GET['id'])) ? htmlspecialchars($_GET['id']) : 0;

		if($id)
		{
			$row = $d->rawQueryOne("select id, photo from multi_media where id = ? and type = ? limit 0,1",array($id,$type));

			if(!empty($row))
			{
				$func->deleteFile(UPLOAD_PHOTO.$row['photo']);
				$d->rawQuery("delete from multi_media where id = ? and type = ?",array($id,$type));
				$func->transfer("Xóa dữ liệu thành công", "index.php?source=photo&act=man_photo&type=".$type."&p=".$curPage);
			}
			else
			{
				$func->transfer("Xóa dữ liệu bị lỗi", "index.php?source=photo&act=man_photo&type=".$type."&p=".$curPage, false);
			}
		}
		elseif(isset($_GET['listid']))
		{
			$listid = explode(",",$_GET['listid']);

			for($i=0;$i<count($listid);$i++)
			{
				$id = htmlspecialchars($listid[$i]);
				$row = $d->rawQueryOne("select id, photo from multi_media where id = ? and type = ? limit 0,1",array($id,$type));

				if(!empty($row))
				{
					$func->deleteFile(UPLOAD_PHOTO.$row['photo']);
					$d->rawQuery("delete from multi_media where id = ? and type = ?",array($id,$type));
				}
			}
			
			$func->transfer("Xóa dữ liệu thành công", "index.php?source=photo&act=man_photo&type=".$type."&p=".$curPage);
		}
		else
		{
			$func->transfer("Không nhận được dữ liệu", "index.php?source=photo&act=man_photo&type=".$type."&p=".$curPage, false);
		}
	}
?>