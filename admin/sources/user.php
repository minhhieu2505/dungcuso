<?php
if (!defined('SOURCES'))
	die("Error");
switch ($act) {
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
	case "info_admin":
		infoAdmin();
		$template = "user/man_admin/info";
		break;
		case "logout":
			logout();
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

	if (isset($_REQUEST['keyword'])) {
		$keyword = htmlspecialchars($_REQUEST['keyword']);
		$where .= " and (username LIKE '%$keyword%' or fullname LIKE '%$keyword%')";
	}

	$perPage = 10;
	$startpoint = ($curPage * $perPage) - $perPage;
	$limit = " limit " . $startpoint . "," . $perPage;
	$sql = "select * from user where id <> 0 $where order by id desc $limit";
	$items = $d->rawQuery($sql);
	$sqlNum = "select count(*) as 'num' from user where id <> 0 $where order by id desc";
	$count = $d->rawQueryOne($sqlNum);
	$total = (!empty($count)) ? $count['num'] : 0;
	$url = "index.php?source=user&act=man_member";
	$paging = $func->pagination($total, $perPage, $curPage, $url);
}

/* Edit member */
function editMember()
{
	global $d, $func, $curPage, $item;

	$id = (!empty($_GET['id'])) ? htmlspecialchars($_GET['id']) : 0;

	if (empty($id)) {
		$func->transfer("Không nhận được dữ liệu", "index.php?source=user&act=man_member&p=" . $curPage, false);
	} else {
		$item = $d->rawQueryOne("select * from user where id = ? limit 0,1", array($id));

		if (empty($item)) {
			$func->transfer("Dữ liệu không có thực", "index.php?source=user&act=man_member&p=" . $curPage, false);
		}
	}
}

/* Save member */
function saveMember()
{
	global $d, $func, $flash, $curPage;

	/* Check post */
	if (empty($_POST)) {
		$func->transfer("Không nhận được dữ liệu", "index.php?source=user&act=man_member&p=" . $curPage, false);
	}

	/* Post dữ liệu */
	$message = '';
	$response = array();
	$id = (!empty($_POST['id'])) ? htmlspecialchars($_POST['id']) : 0;
	$data = (!empty($_POST['data'])) ? $_POST['data'] : null;
	if ($data) {
		foreach ($data as $column => $value) {
			$data[$column] = ($column == 'password') ? $value : htmlspecialchars($func->sanitize($value));
		}

		if (isset($_POST['status'])) {
			$status = '';
			foreach ($_POST['status'] as $attr_column => $attr_value)
				if ($attr_value != "")
					$status .= $attr_value . ',';
			$data['status'] = (!empty($status)) ? rtrim($status, ",") : "";
		} else {
			$data['status'] = "";
		}

		$birthday = $data['birthday'];
		$data['birthday'] = strtotime(str_replace("/", "-", $data['birthday']));
	}

	/* Valid data */
	if (empty($data['username'])) {
		$response['messages'][] = 'Tài khoản không được trống';
	}

	if (!empty($data['username']) && !$func->isAlphaNum($data['username'])) {
		$response['messages'][] = 'Tài khoản chỉ được nhập chữ thường và số (chữ thường không dấu, ghi liền nhau, không khoảng trắng)';
	}

	if (!empty($data['username'])) {
		if ($func->checkAccount($data['username'], 'username', 'member', $id)) {
			$response['messages'][] = 'Tài khoản đã tồn tại';
		}
	}

	if (empty($id) || !empty($data['password'])) {
		if (empty($data['password'])) {
			$response['messages'][] = 'Mật khẩu không được trống';
		}

		if (!empty($data['password']) && empty($_POST['confirm_password'])) {
			$response['messages'][] = 'Xác nhận mật khẩu không được trống';
		}

		if (!empty($data['password']) && !empty($_POST['confirm_password']) && !$func->isMatch($data['password'], $_POST['confirm_password'])) {
			$response['messages'][] = 'Mật khẩu không trùng khớp';
		}
	}

	if (!empty($response)) {
		/* Flash data */
		if (!empty($data)) {
			foreach ($data as $k => $v) {
				if (!empty($v)) {
					$flash->set($k, $v);
				}
			}
		}

		/* Errors */
		$response['status'] = 'danger';
		$message = base64_encode(json_encode($response));
		$flash->set('message', $message);

		if (empty($id)) {
			$func->redirect("index.php?source=user&act=add_member");
		} else {
			$func->redirect("index.php?source=user&act=edit_member&id=" . $id);
		}
	}

	/* Save data */
	if ($id) {
		if ($func->checkRole()) {
			$row = $d->rawQueryOne("select id from user where id = ? limit 0,1", array($id));

			if (!empty($row)) {
				$func->transfer("Bạn không có quyền trên tài khoản này. Mọi thắc mắc xin liên hệ quản trị website", "index.php?source=user&act=man_member&p=" . $curPage, false);
			}
		}

		if (!empty($data['password'])) {
			$password = $data['password'];
			$confirm_password = !empty($_POST['confirm_password']) ? $_POST['confirm_password'] : '';
			$data['password'] = md5($password);
		} else {
			unset($data['password']);
		}

		$d->where('id', $id);
		if ($d->update('member', $data)) {
			$func->transfer("Cập nhật dữ liệu thành công", "index.php?source=user&act=man_member&p=" . $curPage);
		} else {
			$func->transfer("Cập nhật dữ liệu bị lỗi", "index.php?source=user&act=man_member&p=" . $curPage, false);
		}
	} else {
		if (!empty($data['password'])) {
			$data['password'] = md5($data['password']);
		}

		if ($d->insert('member', $data)) {
			$func->transfer("Lưu dữ liệu thành công", "index.php?source=user&act=man_member&p=" . $curPage);
		} else {
			$func->transfer("Lưu dữ liệu bị lỗi", "index.php?source=user&act=man_member&p=" . $curPage, false);
		}
	}
}

/* Delete member */
function deleteMember()
{
	global $d, $func, $curPage;

	$id = (!empty($_GET['id'])) ? htmlspecialchars($_GET['id']) : 0;

	if ($id) {
		$row = $d->rawQueryOne("select id from user where id = ? limit 0,1", array($id));

		if (!empty($row['id'])) {
			$d->rawQuery("delete from user where id = ?", array($id));
			$func->transfer("Xóa dữ liệu thành công", "index.php?source=user&act=man_member&p=" . $curPage);
		} else {
			$func->transfer("Xóa dữ liệu bị lỗi", "index.php?source=user&act=man_member&p=" . $curPage, false);
		}
	} elseif (isset($_GET['listid'])) {
		$listid = explode(",", $_GET['listid']);

		for ($i = 0; $i < count($listid); $i++) {
			$id = htmlspecialchars($listid[$i]);
			$row = $d->rawQueryOne("select id from user where id = ? limit 0,1", array($id));

			if (!empty($row['id'])) {
				$d->rawQuery("delete from user where id = ?", array($id));
			}
		}

		$func->transfer("Xóa dữ liệu thành công", "index.php?source=user&act=man_member&p=" . $curPage);
	} else {
		$func->transfer("Không nhận được dữ liệu", "index.php?source=user&act=man_member&p=" . $curPage, false);
	}
}
/* Info admin */
function infoAdmin()
{
    global $d, $func, $flash, $curPage, $item, $config, $loginAdmin;

    /* Check change password */
    if (!empty($_GET['changepass']) && ($_GET['changepass'] == 1)) {
        $changepass = true;
    } else {
        $changepass = false;
    }

    if (!empty($_POST)) {
        /* Post dữ liệu */
        $message = '';
        $response = array();
        $id = (!empty($_POST['id'])) ? htmlspecialchars($_POST['id']) : 0;
        $data = (!empty($_POST['data'])) ? $_POST['data'] : null;
        if ($data) {
            foreach ($data as $column => $value) {
                $data[$column] = htmlspecialchars($func->sanitize($value));
            }
        }

        if (!empty($changepass)) {
            $old_pass = (!empty($_POST['old-password'])) ? $_POST['old-password'] : '';
            $new_pass = (!empty($_POST['new-password'])) ? $_POST['new-password'] : '';
            $renew_pass = (!empty($_POST['renew-password'])) ? $_POST['renew-password'] : '';

            /* Valid data */
            if (empty($old_pass)) {
                $response['messages'][] = 'Mật khẩu cũ không được trống';
            }

            if (!empty($old_pass)) {
                $row = $d->rawQueryOne("select id, password from #_user where username = ? limit 0,1", array($_SESSION[$loginAdmin]['username']));

                if (empty($row['id']) || (!empty($row['id']) && ($row['password'] != md5($config['website']['secret'] . $old_pass . $config['website']['salt'])))) {
                    $response['messages'][] = 'Mật khẩu cũ không chính xác';
                }
            }

            if (empty($new_pass)) {
                $response['messages'][] = 'Mật khẩu mới không được trống';
            }

            if (!empty($new_pass) && in_array($new_pass, array('123', '123qwe', '123456', 'ninaco'))) {
                $response['messages'][] = 'Mật khẩu bạn đặt quá đơn giãn';
            }

            if (!empty($new_pass) && empty($renew_pass)) {
                $response['messages'][] = 'Xác nhận mật khẩu mới không được trống';
            }

            if (!empty($new_pass) && !empty($renew_pass) && !$func->isMatch($new_pass, $renew_pass)) {
                $response['messages'][] = 'Mật khẩu mới không trùng khớp';
            }

            if (!empty($response)) {
                $response['status'] = 'danger';
                $message = base64_encode(json_encode($response));
                $flash->set('message', $message);
                $func->redirect("index.php?source=user&act=info_admin&changepass=1");
            }

            /* Change to new password */
            $data['password'] = md5($new_pass);
            $flagchangepass = true;
        } else {

            /* Valid data */
            if (empty($data['username'])) {
                $response['messages'][] = 'Tài khoản không được trống';
            }

            if (!empty($data['username']) && !$func->isAlphaNum($data['username'])) {
                $response['messages'][] = 'Tài khoản chỉ được nhập chữ thường và số (chữ thường không dấu, ghi liền nhau, không khoảng trắng)';
            }

            if (!empty($data['username'])) {
                if ($func->checkAccount($data['username'], 'username', 'user', $id)) {
                    $response['messages'][] = 'Tài khoản đã tồn tại';
                }
            }

            if (empty($data['fullname'])) {
                $response['messages'][] = 'Họ tên không được trống';
            }

            if (empty($data['email'])) {
                $response['messages'][] = 'Email không được trống';
            }

            if (!empty($data['email']) && !$func->isEmail($data['email'])) {
                $response['messages'][] = 'Email không hợp lệ';
            }

            if (!empty($data['email'])) {
                if ($func->checkAccount($data['email'], 'email', 'user', $id)) {
                    $response['messages'][] = 'Email đã tồn tại';
                }
            }

            if (!empty($data['phone']) && !$func->isPhone($data['phone'])) {
                $response['messages'][] = 'Số điện thoại không hợp lệ';
            }

            if (empty($data['gender'])) {
                $response['messages'][] = 'Chưa chọn giới tính';
            }

            if (empty($birthday)) {
                $response['messages'][] = 'Ngày sinh không được trống';
            }

            if (!empty($birthday) && !$func->isDate($birthday)) {
                $response['messages'][] = 'Ngày sinh không hợp lệ';
            }

            if (empty($data['address'])) {
                $response['messages'][] = 'Địa chỉ không được trống';
            }

            if (!empty($response)) {
                /* Flash data */
                if (!empty($data)) {
                    foreach ($data as $k => $v) {
                        if (!empty($v)) {
                            $flash->set($k, $v);
                        }
                    }
                }

                /* Errors */
                $response['status'] = 'danger';
                $message = base64_encode(json_encode($response));
                $flash->set('message', $message);
                $func->redirect("index.php?source=user&act=info_admin");
            }
        }

        /* Save data */
        $d->where('username', $_SESSION[$loginAdmin]['username']);
        if ($d->update('user', $data)) {
            if (isset($flagchangepass) && $flagchangepass == true) {
                if (!empty($_SESSION[TOKEN])) unset($_SESSION[TOKEN]);
                unset($_SESSION[$loginAdmin]);
                $func->transfer("Cập nhật dữ liệu thành công", "index.php");
            }

            $func->transfer("Cập nhật dữ liệu thành công", "index.php?source=user&act=info_admin");
        } else {
            $func->transfer("Cập nhật dữ liệu bị lỗi", "index.php?source=user&act=info_admin");
        }
    }

    $item = $d->rawQueryOne("select * from #_user where username = ? limit 0,1", array($_SESSION[$loginAdmin]['username']));
}
?>