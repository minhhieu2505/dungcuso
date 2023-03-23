<?php
	session_start();
	define('LIBRARIES','../../libraries/');

    require_once LIBRARIES."config.php";
    require_once LIBRARIES.'autoload.php';
    new AutoLoad();
    $injection = new AntiSQLInjection();
    $d = new PDODb($config['database']);
    $cache = new Cache($d);
    $func = new Functions($d, $cache);

	$username = (!empty($_POST['username'])) ? $_POST['username'] : '';
	$password = (!empty($_POST['password'])) ? $_POST['password'] : '';
	$error = "";
	$success = "";
	$login_failed = false;
	/* Kiểm tra thông tin đăng nhập */
	if($username == '' && $password == '')
	{
		$error = "Chưa nhập tên đăng nhập và mật khẩu";
	}
	else if($username == '')
	{
		$error = "Chưa nhập tên đăng nhập";
	}
	else if($password == '')
	{
		$error = "Chưa nhập mật khẩu";
	}
	else
	{
		/* Kiểm tra đăng nhập */
		$row = $d->rawQueryOne("select * from #_user where username = ? and find_in_set('hienthi',status) limit 0,1",array($username));

		if(!empty($row['id']))
		{
			if(($row['password'] == $func->encryptPassword($password)))
			{
				$timenow = time();
				$id_user = $row['id'];
				$token = md5(time());
				$user_agent = $_SERVER['HTTP_USER_AGENT'];
				$sessionhash = md5(sha1($row['password'].$row['username']));
				
				   /* Tạo Session login */
				$_SESSION[$loginAdmin]['active'] = true;
				$_SESSION[$loginAdmin]['id'] = $row['id'];
				$_SESSION[$loginAdmin]['username'] = $row['username'];
				$_SESSION[$loginAdmin]['fullname'] = $row['fullname'];
				$_SESSION[$loginAdmin]['phone'] = $row['phone'];
				$_SESSION[$loginAdmin]['email'] = $row['email'];
				$_SESSION[$loginAdmin]['role'] = $row['role'];
				$_SESSION[$loginAdmin]['secret_key'] = $row['secret_key'];
				$_SESSION[$loginAdmin]['token'] = $sessionhash;
				$_SESSION[$loginAdmin]['password'] = $row['password'];
				$_SESSION[$loginAdmin]['login_session'] = $sessionhash;
				$_SESSION[$loginAdmin]['login_token'] = $token;

				/* Tạo Session Token Website */
				$_SESSION[TOKEN] = true;

				/* Cập nhật quyền của user đăng nhập */
				$secret_key = $_SESSION[$loginAdmin]['token'];
				$d->rawQuery("update #_user set secret_key = ? where id = ?",array($secret_key,$row['id']));

				$success = "Đăng nhập thành công";
			}
			else
			{
				$login_failed = true;
				$error = "Mật khẩu không chính xác";
			}
		}
		else
		{
			$login_failed = true;
			$error = "Tên đăng nhập không tồn tại";
		}
	}
	$data = array('success' => $success, 'error' => $error);
	echo json_encode($data);
?>