<?php
if (!defined('SOURCES')) die("Error");

if (!empty($_POST['dataOrder']['fullname'])) {

    /* Check order */
    if (empty($_SESSION['cart'])) {
        $func->transfer("Đơn hàng không hợp lệ. Vui lòng thử lại sau.", $configBase, false);
    }

    /* Data */
    $dataOrder = (!empty($_POST['dataOrder'])) ? $_POST['dataOrder'] : null;

    /* Check data */
    if (!empty($dataOrder)) {
        /* Info */
        $code = strtoupper($func->stringRandom(6));
        $order_date = time();
        $fullname = (!empty($dataOrder['fullname'])) ? htmlspecialchars($dataOrder['fullname']) : '';
        $email = (!empty($dataOrder['email'])) ? htmlspecialchars($dataOrder['email']) : '';
        $phone = (!empty($dataOrder['phone'])) ? htmlspecialchars($dataOrder['phone']) : '';
        $address = (!empty($dataOrder['address'])) ? htmlspecialchars($dataOrder['address']) : '';
        $requirements = (!empty($dataOrder['requirements'])) ? htmlspecialchars($dataOrder['requirements']) : '';
        $error = false;

        /* Price */
        $total_price = $cart->getOrderTotal();

        $data_donhang = array();
        $data_donhang['fullname'] = $fullname;
        $data_donhang['id_user'] = $userDetail['id'];
        $data_donhang['email'] = $email;
        $data_donhang['phone'] = $phone;
        $data_donhang['notes'] = $requirements;
        $data_donhang['code'] = $code;
        $data_donhang['total_price'] = $total_price;
        $data_donhang['date_created'] = time();
        $insert_order = $d->insert('`order`', $data_donhang);
        /* Cart */
        $order_detail = '';
        $max = (!empty($_SESSION['cart'])) ? count($_SESSION['cart']) : 0;
        for ($i = 0; $i < $max; $i++) {
            $pid = $_SESSION['cart'][$i]['productid'];
            $q = $_SESSION['cart'][$i]['qty'];
            $data_donhangchitiet = array();
            $data_donhangchitiet['id_product'] = $pid;
            $data_donhangchitiet['id_order'] = $insert_order;
            $data_donhangchitiet['quantity'] = $q;
            $flags = -1;            
            /* Kiểm tra số lượng tồn */
            $rowDetail = $d->rawQueryOne("select id, name, inventory from #_product where id = ? limit 0,1", array($pid));
            $inventoryed = 0;
            $inventoryed = $rowDetail['inventory'] - $q;
            if($inventoryed > 0){
                $d->insert('order_detail', $data_donhangchitiet);
            } else {
                /* Xóa đơn hàng */
                $error = true;
                unset($_SESSION['cart'][$i]);
                $d->rawQuery("delete from `order` where id = ?", array($insert_order));
                $func->transfer("".$rowDetail['name']." không đủ số lượng tồn kho, bạn vui lòng liên hệ quản trị viên website để được giải quyết", $configBase."lien-he");
            }
        }
        if($error != true){
            for ($i = 0; $i < $max; $i++) {    
                $id_product = $_SESSION['cart'][$i]['productid'];  
                $quanlity = $_SESSION['cart'][$i]['qty']; 
                $detail = $d->rawQueryOne("select id, name, inventory from #_product where id = ? limit 0,1", array($id_product));   
                $inventory = array();
                $inventory['inventory'] = $detail['inventory'] - $quanlity;
                $d->where('id', $detail['id']);
                $d->update('product', $inventory);
            }
        }
    }
    if($error != true){
        //These must be at the top of your script, not inside a function        
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.example.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'user@example.com';                     //SMTP username
            $mail->Password   = 'secret';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('from@example.com', 'Mailer');
            $mail->addAddress('030619120@caothang.edu.vn', 'Joe User');     //Add a recipient
            $mail->addAddress('hieuminhtruong2505@gmail.com');               //Name is optional

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Here is the subject';
            $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Message has been sent';
            unset($_SESSION['cart']);
            $func->transfer("Đặt hàng thành công", $configBase);
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
