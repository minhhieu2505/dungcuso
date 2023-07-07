<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
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
        $order_payment = (!empty($dataOrder['order_payment'])) ? htmlspecialchars($dataOrder['order_payment']) : '';
        $error = false;

        /* Price */
        $total_price = $cart->getOrderTotal();

        $data_donhang = array();
        $data_donhang['fullname'] = $fullname;
        if(!empty($_SESSION[$loginMember])){
            
            $data_donhang['id_user'] = $userDetail['id'];
        }
        $data_donhang['email'] = $email;
        $data_donhang['phone'] = $phone;
        $data_donhang['notes'] = $requirements;
        $data_donhang['code'] = $code;
        $data_donhang['total_price'] = $total_price;
        $data_donhang['order_payment'] = $order_payment;
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
        
        require 'vendor/autoload.php';
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = 0;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'hieuminhtruong2505@gmail.com';                     //SMTP username
            $mail->Password   = 'yjdhzuiuesqsmmrp';                               //SMTP password
            $mail->SMTPSecure = 'tls';          //Enable implicit TLS encryption
            $mail->Port       = 587;
            $mail->CharSet = "utf-8";                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('from@example.com', 'Mailer');   //Add a recipient
            $mail->addAddress($email);               //Name is optional
            
            // Body
            $body = '<table border="0" width="100%">';
		$body .= '
				<tr>
					<th align="left" colspan="2">
					<table width="100%">
					<tr>
					<td><font size="4">Thông tin đặt hàng từ website <a href="http://'.$configUrl.'">'.$configUrl.'</a></font> 
					</td>
					</table>
					
					</th>
				</tr>
				<tr>
					<th width="30%" align="left">Họ tên :</th>
					<td>&nbsp; '.$fullname.'</td>
				</tr>
				
				<tr>
					<th align="left">Email :</th>
					<td>&nbsp; '.$email.'</td>
			    </tr>
				<tr>
					<th align="left">Điện thoại :</th>
					<td>&nbsp; '.$phone.'</td>
			    </tr>
				<tr>
					<th align="left">Địa chỉ:</th>
					<td>&nbsp; '.$address.'</td>
			    </tr>
				
				<tr>
					<th align="left">Nội dung :</th>
					<td >&nbsp; '.$requirements.'</td>
			    </tr>
				<tr>
					<th align="left" colspan="2">&nbsp;</th>
			    </tr>
				';
		$body .= '</table>';
  

		$body.='<table border="0" cellpadding="5px" cellspacing="1px" style="font-size:12px; background:#FFF; width:100%;">';


			if(is_array($_SESSION['cart']))
			{
				$body.='<tr style="background:#274392; font-weight:bold; color:#FFF; border-left:1px solid #CCC; border-right:1px solid #CCC;"><th style="padding:5px; width:5%; text-align:center;">STT</th><th style="padding:5px; width:10%; text-align:center;">Hình ảnh</th><th style="padding:5px; width:45%; text-align:center;">Sản phẩm</th><th style="padding:5px; width:15%; text-align:center;">Giá</th><th style="padding:5px; width:10%; text-align:center;">Số lượng</th><th style="padding:5px; width:15%; text-align:center;">Thành tiền</th></tr>';
				$max=count($_SESSION['cart']);
				for($i=0;$i<$max;$i++){
					$pid=$_SESSION['cart'][$i]['productid'];
                    $q=$_SESSION['cart'][$i]['qty'];
                    $pDetail = $d->rawQueryOne("select * from #_product where id = ? limit 0,1", array($pid));

					if($q==0) continue;
            		$body.='<tr><td>'.($i+1).'</td>';
					$body.='<td> <a href="http://'.$configUrl.$pDetail['slug'].'" target="_blank"><img src="http://'.$configUrl.'upload/product/'.$pDetail['photo'].'" width="70" /></a></td>';
            		$body.='<td>';
            		$body.='	<p><a href="http://'.$configUrl.$pDetail['slug'].'" target="_blank">'.$pDetail['name'].'</a></p>';
            		$body.='</td>';
                    $body.='<td>'.number_format($pDetail['sale_price'],0, ',', '.').'&nbsp;đ</td>';
                    $body.='<td>'.$q.'</td>';                 
                    $body.='<td>'.number_format($pDetail['sale_price']*$q,0, ',', '.') .'&nbsp;đ</td>
                    </tr>';
				}
				$body.='<tr><td colspan="6">
				  <table width="100%" cellpadding="0" cellspacing="0" border="0">

				 </table>
                </td></tr>';
            }
			else{
				$body.='<tr bgColor="#FFFFFF"><td>There are no items in your shopping cart!</td>';
			}
       $body.=' </table> '; 

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Đơn hàng '.$code;
            $mail->Body    = $body;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            unset($_SESSION['cart']);
            $func->transfer("Đặt hàng thành công", $configBase);
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
