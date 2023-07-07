<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (!defined('SOURCES'))
    die("Error");

$action = htmlspecialchars($match['params']['action']);
switch ($action) {
    case 'dang-nhap':
        $titleMain = "Đăng nhập";
        $template = "account/login";
        if (!empty($_SESSION[$loginMember]['active']))
            $func->transfer("Trang không tồn tại", $configBase, false);
        if (!empty($_POST['login-user']))
            loginMember();
        break;

    case 'dang-ky':
        $titleMain = "Đăng ký";
        $template = "account/registration";
        if (!empty($_SESSION[$loginMember]['active']))
            $func->transfer("Trang không tồn tại", $configBase, false);
        if (!empty($_POST['register-user']))
            signupMember();
        break;

    case 'thong-tin-ca-nhan':
        $titleMain = "Thông tin cá nhân";
        $template = "account/info";
        if (empty($_SESSION[$loginMember]['active']))
            $func->transfer("Trang không tồn tại", $configBase, false);
        infoMember();
        break;
    case 'don-hang-cua-ban':
        $titleMain = "Đơn hàng của bạn";
        $template = "account/order_user";
        if (empty($_SESSION[$loginMember]['active']))
            $func->transfer("Trang không tồn tại", $configBase, false);
        orderMember();
        break;
    case 'doi-mat-khau':
        $titleMain = "Đổi mật khẩu";
        $template = "account/change_password";
        if (empty($_SESSION[$loginMember]['active']))
            $func->transfer("Trang không tồn tại", $configBase, false);
        changepassword();
        break;
    case 'dang-xuat':
        if (empty($_SESSION[$loginMember]['active']))
            $func->transfer("Trang không tồn tại", $configBase, false);
        logoutMember();
    case 'chi-tiet-don-hang':
        if (empty($_SESSION[$loginMember]['active']))
            $func->transfer("Trang không tồn tại", $configBase, false);
        $template = "account/order_detail";
        $titleMain = "Chi tiết đơn hàng";
        $order_detail = $d->rawQuery("select * from `order_detail` where id_order = " . $_GET['id']);
        break;
    default:
        header('HTTP/1.0 404 Not Found', true, 404);
        include("404.php");
        exit();
}

function infoMember()
{
    global $d, $func, $flash, $rowDetail, $configBase, $loginMember;

    $iduser = $_SESSION[$loginMember]['id'];

    if ($iduser) {
        $rowDetail = $d->rawQueryOne("select fullname, username, gender, birthday, email, phone, address from #_user where id = ? limit 0,1", array($iduser));

        if (!empty($_POST['info-user'])) {
            $message = '';
            $response = array();
            $fullname = (!empty($_POST['fullname'])) ? htmlspecialchars($_POST['fullname']) : '';
            $email = (!empty($_POST['email'])) ? htmlspecialchars($_POST['email']) : '';
            $phone = (!empty($_POST['phone'])) ? htmlspecialchars($_POST['phone']) : 0;
            $address = (!empty($_POST['address'])) ? htmlspecialchars($_POST['address']) : '';

            /* Valid data */
            if (!empty($email)) {
                if (!$func->isEmail($email)) {
                    $response['messages'][] = 'Email không hợp lệ';
                }

                if ($func->checkAccount($email, 'email', 'user', $iduser)) {
                    $response['messages'][] = 'Email đã tồn tại';
                }
            }

            if (!empty($phone) && !$func->isPhone($phone)) {
                $response['messages'][] = 'Số điện thoại không hợp lệ';
            }
            if (!empty($response)) {
                /* Flash data */
                $flash->set('fullname', $fullname);
                $flash->set('email', $email);
                $flash->set('phone', $phone);
                $flash->set('address', $address);

                /* Errors */
                $response['status'] = 'danger';
                $message = base64_encode(json_encode($response));
                $flash->set('message', $message);
                $func->redirect($configBase . "account/thong-tin-ca-nhan");
            }

            $data['fullname'] = $fullname;
            $data['email'] = $email;
            $data['phone'] = $phone;
            $data['address'] = $address;

            $d->where('id', $iduser);
            if ($d->update('user', $data)) {
                $func->transfer("Cập nhật thông tin thành công", $configBase . "account/thong-tin-ca-nhan");
            } else {
                $func->transfer("Cập nhật thông tin thất bại", $configBase . "account/thong-tin-ca-nhan", false);
            }
        }
    } else {
        $func->transfer("Trang không tồn tại", $configBase, false);
    }
}

function loginMember()
{
    global $d, $func, $flash, $loginMember, $configBase;

    /* Data */
    $username = (!empty($_POST['username'])) ? htmlspecialchars($_POST['username']) : '';
    $password = (!empty($_POST['password'])) ? $_POST['password'] : '';
    $passwordMD5 = md5($password);
    $remember = (!empty($_POST['remember-user'])) ? htmlspecialchars($_POST['remember-user']) : false;

    /* Valid data */
    if (empty($username)) {
        $response['messages'][] = 'Tên đăng nhập không được trống';
    }

    if (empty($password)) {
        $response['messages'][] = 'Mật khẩu không được trống';
    }

    if (!empty($response)) {
        $response['status'] = 'danger';
        $message = base64_encode(json_encode($response));
        $flash->set("message", $message);
        $func->redirect($configBase . "account/dang-nhap");
    }

    $row = $d->rawQueryOne("select id, password, username, phone, address, email, fullname from #_user where username = ? limit 0,1", array($username));

    if (!empty($row)) {
        if ($row['password'] == $passwordMD5) {
            /* Tạo login session */
            $id_user = $row['id'];
            /* Lưu session login */
            $_SESSION[$loginMember]['active'] = true;
            $_SESSION[$loginMember]['id'] = $row['id'];
            $_SESSION[$loginMember]['username'] = $row['username'];
            $_SESSION[$loginMember]['phone'] = $row['phone'];
            $_SESSION[$loginMember]['address'] = $row['address'];
            $_SESSION[$loginMember]['email'] = $row['email'];
            $_SESSION[$loginMember]['fullname'] = $row['fullname'];

            $func->transfer("Đăng nhập thành công", $configBase);
        } else {
            $response['messages'][] = 'Tên đăng nhập hoặc mật khẩu không chính xác. Hoặc tài khoản của bạn chưa được xác nhận từ Quản trị website';
        }
    } else {
        $response['messages'][] = 'Tên đăng nhập hoặc mật khẩu không chính xác. Hoặc tài khoản của bạn chưa được xác nhận từ Quản trị website';
    }

    /* Response error */
    if (!empty($response)) {
        $response['status'] = 'danger';
        $message = base64_encode(json_encode($response));
        $flash->set("message", $message);
        $func->redirect($configBase . "account/dang-nhap");
    }
}

function signupMember()
{
    global $d, $func, $flash, $configBase;


    /* Data */
    $message = '';
    $response = array();
    $username = (!empty($_POST['username'])) ? htmlspecialchars($_POST['username']) : '';
    $password = (!empty($_POST['password'])) ? $_POST['password'] : '';
    $passwordMD5 = md5($password);
    $repassword = (!empty($_POST['repassword'])) ? $_POST['repassword'] : '';
    $fullname = (!empty($_POST['fullname'])) ? htmlspecialchars($_POST['fullname']) : '';
    $email = (!empty($_POST['email'])) ? htmlspecialchars($_POST['email']) : '';
    $phone = (!empty($_POST['phone'])) ? htmlspecialchars($_POST['phone']) : 0;
    $address = (!empty($_POST['address'])) ? htmlspecialchars($_POST['address']) : '';

    /* Valid data */

    if (!empty($username)) {
        if (!$func->isAlphaNum($username)) {
            $response['messages'][] = 'Tài khoản chỉ được nhập chữ thường và số (chữ thường không dấu, ghi liền nhau, không khoảng trắng)';
        }

        if ($func->checkAccount($username, 'username', 'user')) {
            $response['messages'][] = 'Tài khoản đã tồn tại';
        }
    }

    if (!empty($password) && empty($repassword)) {
        $response['messages'][] = 'Xác nhận mật khẩu không được trống';
    }

    if (!empty($password) && !empty($repassword) && !$func->isMatch($password, $repassword)) {
        $response['messages'][] = 'Mật khẩu không trùng khớp';
    }

    if (!empty($email)) {
        if (!$func->isEmail($email)) {
            $response['messages'][] = 'Email không hợp lệ';
        }

        if ($func->checkAccount($email, 'email', 'user')) {
            $response['messages'][] = 'Email đã tồn tại';
        }
    }

    if (!empty($phone) && !$func->isPhone($phone)) {
        $response['messages'][] = 'Số điện thoại không hợp lệ';
    }
    var_dump($_POST);

    if (!empty($response)) {
        /* Flash data */
        $flash->set('fullname', $fullname);
        $flash->set('username', $username);
        $flash->set('email', $email);
        $flash->set('phone', $phone);
        $flash->set('address', $address);

        /* Errors */
        $response['status'] = 'danger';
        $message = base64_encode(json_encode($response));
        $flash->set('message', $message);
        $func->redirect($configBase . "account/dang-ky");
    }

    /* Save data */
    $data['fullname'] = $fullname;
    $data['username'] = $username;
    $data['password'] = md5($password);
    $data['email'] = $email;
    $data['phone'] = $phone;
    $data['address'] = $address;
    $data['status'] = '';
    $data['role'] = 0;
    if ($d->insert('user', $data)) {
        require 'vendor/autoload.php';
                $mail = new PHPMailer(true);
                try {
                    //Server settings
                    $mail->SMTPDebug = 0; //Enable verbose debug output
                    $mail->isSMTP(); //Send using SMTP
                    $mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
                    $mail->SMTPAuth = true; //Enable SMTP authentication
                    $mail->Username = 'hieuminhtruong2505@gmail.com'; //SMTP username
                    $mail->Password = 'yjdhzuiuesqsmmrp'; //SMTP password
                    $mail->SMTPSecure = 'tls'; //Enable implicit TLS encryption
                    $mail->Port = 587;
                    $mail->CharSet = "utf-8"; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                    //Recipients
                    $mail->setFrom('from@example.com', 'Mailer'); //Add a recipient
                    $mail->addAddress($email); //Name is optional

                    // Body
                    $body = '<table border="0" width="100%">';
                    $body .= '
				<tr>
					<th align="left" colspan="2">
					<table width="100%">
					<tr>
					<td><font size="4">Đăng ký tài khoản từ website <a href="http://' . $configUrl . '">' . $configUrl . '</a></font> 
					</td>
					</table>
					</th>
				</tr>
                <div>Chúc mừng bạn đã đăng ký tài khoản thành công</div>
				';
                    //Content
                    $mail->isHTML(true); //Set email format to HTML
                    $mail->Subject = 'Đăng ký tài khoản thành công';
                    $mail->Body = $body;
                    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                    $mail->send();
                    $func->transfer("Đăng ký thành viên thành công. Vui lòng đăng nhập", $configBase . "account/dang-nhap");
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
        
    } else {
        $func->transfer("Đăng ký thành viên thất bại. Vui lòng thử lại sau.", $configBase, false);
    }
}
function logoutMember()
{
    global $d, $func, $loginMember, $configBase;

    unset($_SESSION[$loginMember]);
    $func->redirect($configBase);
}
function orderMember()
{
    global $d, $func, $loginMember, $configBase, $order_user;
    $order_user = $d->rawQuery("select * from `order` where id_user = " . $_SESSION[$loginMember]['id']);
}
/*Change pass word */
function changepassword()
{
    global $d, $func, $flash, $rowDetail, $configBase, $loginMember;

    $iduser = $_SESSION[$loginMember]['id'];

    if ($iduser) {
        $rowDetail = $d->rawQueryOne("select * from #_user where id = ? limit 0,1", array($iduser));
        $password_old = (!empty($_POST['password-old'])) ? $_POST['password-old'] : '';
        $password_new = (!empty($_POST['password-new'])) ? $_POST['password-new'] : '';
        $password = (!empty($_POST['password'])) ? $_POST['password'] : '';
        $passwordMD5 = md5($password);
        if (!empty($_POST['change_password'] != "")) {
            $message = '';
            $response = array();
            $password = (!empty($_POST['password'])) ? htmlspecialchars($_POST['password']) : '';

            /* Valid data */
            if ($rowDetail['password'] != md5($password_old)) {
                $response['messages'][] = 'Mật khẩu không đúng';
            }

            if ($password_new != $password) {
                $response['messages'][] = 'Mật khẩu không trùng khớp';
            }

            if (!empty($response)) {
                /* Flash data */
                $flash->set('password', $password);

                /* Errors */
                $response['status'] = 'danger';
                $message = base64_encode(json_encode($response));
                $flash->set('message', $message);
                $func->redirect($configBase . "account/doi-mat-khau");
            }

            $data['password'] = $passwordMD5;

            $d->where('id', $iduser);
            if ($d->update('user', $data)) {
                $func->transfer("Cập nhật mật khẩu thành công", $configBase . "account/thong-tin-ca-nhan");
            } else {
                $func->transfer("Cập nhật mật khẩu thất bại", $configBase . "account/thong-tin-ca-nhan", false);
            }
        }
    } else {
        $func->transfer("Trang không tồn tại", $configBase, false);
    }

}