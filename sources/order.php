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
        if ($insert_order) {
            for ($i = 0; $i < $max; $i++) {
                $pid = $_SESSION['cart'][$i]['productid'];
                $q = $_SESSION['cart'][$i]['qty'];
                $data_donhangchitiet = array();
                $data_donhangchitiet['id_product'] = $pid;
                $data_donhangchitiet['id_order'] = $insert_order;
                $data_donhangchitiet['quantity'] = $q;
                $d->insert('order_detail', $data_donhangchitiet);
            }
        }
    }
    /* Xóa giỏ hàng */
    unset($_SESSION['cart']);
    $func->transfer("Đặt hàng thành công", $configBase);
}
