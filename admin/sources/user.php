<?php
	if(!defined('SOURCES')) die("Error");
	switch($act)
	{
		/* Members */
		case "man_member":
			viewMembers();
			$template = "user/man_member/mans";
			break;
		case "add_member":
			$template = "user/man_member/man_add";
			break;
		case "edit_member":
			editMember();
			$template = "user/man_member/man_add";
			break;
		case "save_member":
			saveMember();
			break;
		case "delete_member":
			deleteMember();
			break;
	
	}


	/* Logout admin */
	function logout()
	{
		global $d, $func, $loginAdmin;

		/* Hủy bỏ login */
		unset($_SESSION[$loginAdmin]);
		$func->redirect("index.php?source=user&act=login");
	}

	/* View member */
	function viewMembers()
	{
		global $d, $func, $curPage, $items, $paging, $config;

		$where = "";

		if(isset($_REQUEST['keyword']))
		{
			$keyword = htmlspecialchars($_REQUEST['keyword']);
			$where .= " and (username LIKE '%$keyword%' or fullname LIKE '%$keyword%')";
		}

		$perPage = 10;
		$startpoint = ($curPage * $perPage) - $perPage;
		$limit = " limit ".$startpoint.",".$perPage;
		$sql = "select * from user where id <> 0 $where order by id desc $limit";
		$items = $d->rawQuery($sql);
		$sqlNum = "select count(*) as 'num' from user where id <> 0 $where order by id desc";
		$count = $d->rawQueryOne($sqlNum);
		$total = (!empty($count)) ? $count['num'] : 0;
		$url = "index.php?source=user&act=man_member";
		$paging = $func->pagination($total,$perPage,$curPage,$url);
	}

	/* Edit member */
	function editMember()
	{
		global $d, $func, $curPage, $item;

		$id = (!empty($_GET['id'])) ? htmlspecialchars($_GET['id']) : 0;

		if(empty($id))
		{
			$func->transfer("Không nhận được dữ liệu", "index.php?source=user&act=man_member&p=".$curPage, false);
		}
		else
		{
			$item = $d->rawQueryOne("select * from user where id = ? limit 0,1",array($id));

			if(empty($item))
			{
				$func->transfer("Dữ liệu không có thực", "index.php?source=user&act=man_member&p=".$curPage, false);
			}
		}
	}

	/* Save member */
	function saveMember()
	{
		global $d, $func, $flash, $curPage;
		
		/* Check post */
		if(empty($_POST))
		{
			$func->transfer("Không nhận được dữ liệu", "index.php?source=user&act=man_member&p=".$curPage, false);
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
				$data[$column] = ($column == 'password') ? $value : htmlspecialchars($func->sanitize($value));
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

			$birthday = $data['birthday'];
			$data['birthday'] = strtotime(str_replace("/","-",$data['birthday']));
		}

		/* Valid data */
		if(empty($data['username']))
		{
			$response['messages'][] = 'Tài khoản không được trống';
		}

		if(!empty($data['username']) && !$func->isAlphaNum($data['username']))
		{
			$response['messages'][] = 'Tài khoản chỉ được nhập chữ thường và số (chữ thường không dấu, ghi liền nhau, không khoảng trắng)';
		}

		if(!empty($data['username']))
		{
			if($func->checkAccount($data['username'], 'username', 'member', $id))
			{
				$response['messages'][] = 'Tài khoản đã tồn tại';
			}
		}

		if(empty($id) || !empty($data['password']))
		{
			if(empty($data['password']))
			{
				$response['messages'][] = 'Mật khẩu không được trống';
			}
			
			if(!empty($data['password']) && empty($_POST['confirm_password']))
			{
				$response['messages'][] = 'Xác nhận mật khẩu không được trống';
			}
			
			if(!empty($data['password']) && !empty($_POST['confirm_password']) && !$func->isMatch($data['password'], $_POST['confirm_password']))
			{
				$response['messages'][] = 'Mật khẩu không trùng khớp';
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

			if(empty($id))
			{
				$func->redirect("index.php?source=user&act=add_member");
			}
			else
			{
				$func->redirect("index.php?source=user&act=edit_member&id=".$id);
			}
		}

		/* Save data */
		if($id)
		{
			if($func->checkRole())
			{
				$row = $d->rawQueryOne("select id from user where id = ? limit 0,1",array($id));

				if(!empty($row))
				{
					$func->transfer("Bạn không có quyền trên tài khoản này. Mọi thắc mắc xin liên hệ quản trị website", "index.php?source=user&act=man_member&p=".$curPage, false);
				}
			}
			
			if(!empty($data['password']))
			{
				$password = $data['password'];
				$confirm_password = !empty($_POST['confirm_password']) ? $_POST['confirm_password'] : '';
				$data['password'] = md5($password);
			}
			else
			{
				unset($data['password']);
			}
			
			$d->where('id', $id);
			if($d->update('member',$data))
			{
				$func->transfer("Cập nhật dữ liệu thành công", "index.php?source=user&act=man_member&p=".$curPage);
			}
			else
			{
				$func->transfer("Cập nhật dữ liệu bị lỗi", "index.php?source=user&act=man_member&p=".$curPage, false);
			}
		}
		else
		{		
			if(!empty($data['password']))
			{
				$data['password'] = md5($data['password']);
			}
			
			if($d->insert('member',$data))
			{
				$func->transfer("Lưu dữ liệu thành công", "index.php?source=user&act=man_member&p=".$curPage);
			}
			else
			{
				$func->transfer("Lưu dữ liệu bị lỗi", "index.php?source=user&act=man_member&p=".$curPage, false);
			}
		}
	}

	/* Delete member */
	function deleteMember()
	{
		global $d, $func, $curPage;
		
		$id = (!empty($_GET['id'])) ? htmlspecialchars($_GET['id']) : 0;

		if($id)
		{
			$row = $d->rawQueryOne("select id from user where id = ? limit 0,1",array($id));

			if(!empty($row['id']))
			{
				$d->rawQuery("delete from user where id = ?",array($id));
				$func->transfer("Xóa dữ liệu thành công", "index.php?source=user&act=man_member&p=".$curPage);
			}
			else
			{
				$func->transfer("Xóa dữ liệu bị lỗi", "index.php?source=user&act=man_member&p=".$curPage, false);
			}
		}
		elseif(isset($_GET['listid']))
		{
			$listid = explode(",",$_GET['listid']);

			for($i=0;$i<count($listid);$i++)
			{
				$id = htmlspecialchars($listid[$i]);
				$row = $d->rawQueryOne("select id from user where id = ? limit 0,1",array($id));

				if(!empty($row['id']))
				{
					$d->rawQuery("delete from user where id = ?",array($id));
				}
			}

			$func->transfer("Xóa dữ liệu thành công","index.php?source=user&act=man_member&p=".$curPage);
		}
		else
		{
			$func->transfer("Không nhận được dữ liệu","index.php?source=user&act=man_member&p=".$curPage, false);
		}
	}
?>