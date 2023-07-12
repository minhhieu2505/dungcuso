<?php
include "config.php";

$cmd = (!empty($_POST['cmd'])) ? htmlspecialchars($_POST['cmd']) : '';
$id = (!empty($_POST['id'])) ? htmlspecialchars($_POST['id']) : 0;
$quantity = (!empty($_POST['quantity'])) ? htmlspecialchars($_POST['quantity']) : 1;
$code = (!empty($_POST['code'])) ? htmlspecialchars($_POST['code']) : '';
$ward = (!empty($_POST['ward'])) ? htmlspecialchars($_POST['ward']) : 0;

if ($cmd == 'add-cart' && $id > 0) {
    $cart->addToCart($quantity, $id);
    $max = (!empty($_SESSION['cart'])) ? count($_SESSION['cart']) : 0;
    $data = array('max' => $max);

    echo json_encode($data);
} else if ($cmd == 'update-cart' && $id > 0 && $code != '') {
    if (!empty($_SESSION['cart'])) {
        $max = count($_SESSION['cart']);
        for ($i = 0; $i < $max; $i++) {
            if ($code == $_SESSION['cart'][$i]['code']) {
                if ($quantity) $_SESSION['cart'][$i]['qty'] = $quantity;
                break;
            }
        }
    }
    $proinfo = $cart->getProductInfo($id);
    $regular_price = $func->formatMoney($proinfo['regular_price'] * $quantity);
    $sale_price = $func->formatMoney($proinfo['sale_price'] * $quantity);
    $temp = $cart->getOrderTotal();
    $tempText = $func->formatMoney($temp);
    $total = $cart->getOrderTotal();
    $totalText = $func->formatMoney($total);
    $data = array('regularPrice' => $regular_price, 'salePrice' => $sale_price, 'tempText' => $tempText, 'totalText' => $totalText);

    echo json_encode($data);
} else if ($cmd == 'delete-cart' && $code != '') {
    if (!empty($config['order']['ship'])) {
        $shipData = (!empty($ward)) ? $func->getInfoDetail('ship_price', "ward", $ward) : array();
        $ship = (!empty($shipData)) ? $shipData['ship_price'] : 0;
    }

    $cart->removeProduct($code);
    $max = (!empty($_SESSION['cart'])) ? count($_SESSION['cart']) : 0;
    $temp = $cart->getOrderTotal();
    $tempText = $func->formatMoney($temp);
    $total = $cart->getOrderTotal();
    if (!empty($ship)) $total += $ship;
    $totalText = $func->formatMoney($total);
    $data = array('max' => $max, 'tempText' => $tempText, 'totalText' => $totalText);

    echo json_encode($data);
} else if ($cmd == 'ship-cart') {
    $shipData = array();
    $shipPrice = 0;
    $shipText = '0đ';
    $total = 0;
    $totalText = '';

    if ($id) $shipData = $func->getInfoDetail('ship_price', "ward", $id);

    $total = $cart->getOrderTotal();
    if (!empty($shipData['ship_price'])) {
        $total += $shipData['ship_price'];
        $shipText = $func->formatMoney($shipData['ship_price']);
    }
    $totalText = $func->formatMoney($total);
    $shipPrice = (!empty($shipData['ship_price'])) ? $shipData['ship_price'] : 0;
    $data = array('shipText' => $shipText, 'ship' => $shipPrice, 'totalText' => $totalText);

    echo json_encode($data);
} else if ($cmd == 'popup-cart') { ?>
    <form class="form-cart" method="post" action="" enctype="multipart/form-data">
        <div class="wrap-cart">
            <div class="top-cart border-right-0">
                <div class="list-procart">
                    <div class="procart procart-label">
                        <div class="form-row row">
                            <div class="pic-procart col-3 col-md-2">Hình ảnh</div>
                            <div class="info-procart col-6 col-md-5">Tên sản phẩm</div>
                            <div class="quantity-procart col-3 col-md-2">
                                <p>Số lượng</p>
                                <p>Thành tiền</p>
                            </div>
                            <div class="price-procart col-3 col-md-3">Thành tiền</div>
                        </div>
                    </div>
                    <?php $max = count($_SESSION['cart']);
                    for ($i = 0; $i < $max; $i++) {
                        $pid = $_SESSION['cart'][$i]['productid'];
                        $quantity = $_SESSION['cart'][$i]['qty'];
                        $code = ($_SESSION['cart'][$i]['code']) ? $_SESSION['cart'][$i]['code'] : '';
                        $proinfo = $cart->getProductInfo($pid);
                        $pro_price = $proinfo['regular_price'];
                        $pro_price_new = $proinfo['sale_price'];
                        $pro_price_qty = $pro_price * $quantity;
                        $pro_price_new_qty = $pro_price_new * $quantity; ?>
                        <div class="procart procart-<?= $code ?>">
                            <div class="form-row row">
                                <div class="pic-procart col-3 col-md-2">
                                    <a class="text-decoration-none" href="<?= $proinfo[$sluglang] ?>" target="_blank" title="<?= $proinfo['name'] ?>"><img src="upload/product/<?=$proinfo['photo']?>" width="85" height="85" alt=""></a>
                                    <a class="del-procart text-decoration-none" data-code="<?= $code ?>">
                                        <i class="fa fa-times-circle"></i>
                                        <span>Xóa</span>
                                    </a>
                                </div>
                                <div class="info-procart col-6 col-md-5">
                                    <h3 class="name-procart"><a class="text-decoration-none" href="<?= $proinfo[$sluglang] ?>" target="_blank" title="<?= $proinfo['name'] ?>"><?= $proinfo['name'] ?></a></h3>
                                </div>
                                <div class="quantity-procart col-3 col-md-2">
                                    <div class="price-procart price-procart-rp">
                                        <?php if ($proinfo['sale_price']) { ?>
                                            <p class="price-new-cart load-price-new-<?= $code ?>">
                                                <?= $func->formatMoney($pro_price_new_qty) ?>
                                            </p>
                                            <p class="price-old-cart load-price-<?= $code ?>">
                                                <?= $func->formatMoney($pro_price_qty) ?>
                                            </p>
                                        <?php } else { ?>
                                            <p class="price-new-cart load-price-<?= $code ?>">
                                                <?= $func->formatMoney($pro_price_qty) ?>
                                            </p>
                                        <?php } ?>
                                    </div>
                                    <div class="quantity-counter-procart quantity-counter-procart-<?= $code ?>">
                                        <span class="counter-procart-minus counter-procart">-</span>
                                        <input type="number" class="quantity-procart" min="1" value="<?= $quantity ?>" data-pid="<?= $pid ?>" data-code="<?= $code ?>" />
                                        <span class="counter-procart-plus counter-procart">+</span>
                                    </div>
                                </div>
                                <div class="price-procart col-3 col-md-3">
                                    <?php if ($proinfo['sale_price']) { ?>
                                        <p class="price-new-cart load-price-new-<?= $code ?>">
                                            <?= $func->formatMoney($pro_price_new_qty) ?>
                                        </p>
                                        <p class="price-old-cart load-price-<?= $code ?>">
                                            <?= $func->formatMoney($pro_price_qty) ?>
                                        </p>
                                    <?php } else { ?>
                                        <p class="price-new-cart load-price-<?= $code ?>">
                                            <?= $func->formatMoney($pro_price_qty) ?>
                                        </p>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="money-procart">
                    <div class="total-procart">
                        <p>Tạm tính:</p>
                        <p class="total-price load-price-temp"><?= $func->formatMoney($cart->getOrderTotal()) ?></p>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="san-pham" class="buymore-cart text-decoration-none" title="Tiếp tục mua hàng">
                        <i class="fa fa-angle-double-left"></i>
                        <span>Tiếp tục mua hàng</span>
                    </a>
                    <a class="btn btn-primary btn-cart" href="gio-hang" title="Thanh toán">Thanh toán</a>
                </div>
            </div>
        </div>
    </form>
<?php }
?>