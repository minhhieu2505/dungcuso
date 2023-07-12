<form class="form-cart validation-cart" novalidate method="post" action="" enctype="multipart/form-data">
    <div class="wrap-cart">
        <?= $flash->getMessages("frontend") ?>
        <div class="row box-cart">
            <?php if (!empty($_SESSION['cart'])) { ?>
                <div class="top-cart col-12 col-lg-12">
                    <p class="title-cart">Giỏ hàng của bạn:</p>
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
                            $proinfo = $cart->getProductInfo($pid);
                            $pro_price = $proinfo['regular_price'];
                            $pro_price_new = $proinfo['sale_price'];
                            $pro_price_qty = $pro_price * $quantity;
                            $code = $_SESSION['cart'][$i]['code'];
                            $pro_price_new_qty = $pro_price_new * $quantity; ?>
                            <div class="procart procart-<?= $code ?>">
                                <div class="form-row row">
                                    <div class="pic-procart col-3 col-md-2">
                                        <a class="text-decoration-none" href="<?= $proinfo[$sluglang] ?>" target="_blank"
                                            title="<?= $proinfo['name'] ?>">
                                            <img src="upload/product/<?= $proinfo['photo'] ?>" alt="" width="85" height="85">
                                        </a>
                                        <a class="del-procart text-decoration-none" data-code="<?= $code ?>">
                                            <i class="fa fa-times-circle"></i>
                                            <span>Xóa</span>
                                        </a>
                                    </div>
                                    <div class="info-procart col-6 col-md-5">
                                        <h3 class="name-procart"><a class="text-decoration-none" href="<?= $proinfo['slug'] ?>"
                                                target="_blank" title="<?= $proinfo['name'] ?>"><?= $proinfo['name'] ?></a></h3>

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
                                            <input type="number" class="quantity-procart" min="1" value="<?= $quantity ?>"
                                                data-pid="<?= $pid ?>" data-code="<?= $code ?>" />
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
                            <p>Tổng tiền:</p>
                            <p class="total-price load-price-total">
                                <?= $func->formatMoney($cart->getOrderTotal()) ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="bottom-cart col-12 col-lg-12">
                    <div class="section-cart">
                        <p class="title-cart">Thông tin nhận hàng:</p>
                        <div class="row">
                            <div class="col-8">
                                <div class="information-cart">
                                    <div class="form-row row">
                                        <div class="input-cart col-md-6">
                                            <input type="text" class="form-control text-sm" id="fullname"
                                                name="dataOrder[fullname]" placeholder="Nhập họ tên"
                                                value="<?= (!empty($flash->has('fullname'))) ? $flash->get('fullname') : (!empty($userDetail['fullname']) ? $userDetail['fullname'] : '') ?>"
                                                required />
                                        </div>
                                        <div class="input-cart col-md-6">
                                            <input type="number" class="form-control text-sm" id="phone"
                                                name="dataOrder[phone]" placeholder="Số điện thoại"
                                                value="<?= (!empty($flash->has('phone'))) ? $flash->get('phone') : $userDetail['phone'] ?>"
                                                required />
                                        </div>
                                    </div>
                                    <div class="form-row row">
                                        <div class="input-cart col-md-6">
                                            <input type="email" class="form-control text-sm" id="email"
                                                name="dataOrder[email]" placeholder="Email"
                                                value="<?= (!empty($flash->has('email'))) ? $flash->get('email') : $userDetail['email'] ?>"
                                                required />
                                        </div>
                                        <div class="input-cart col-md-6">
                                            <input type="text" class="form-control text-sm" id="address"
                                                name="dataOrder[address]" placeholder="Địa chỉ"
                                                value="<?= (!empty($flash->has('address'))) ? $flash->get('address') : $userDetail['address'] ?>"
                                                required />
                                        </div>
                                    </div>
                                    <div class="input-cart">
                                        <textarea class="form-control text-sm" id="requirements"name="dataOrder[requirements]" placeholder="Ghi chú" /><?= (!empty($flash->has('requirements'))) ? $flash->get('requirements') : '' ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="bottom-cart">
                                    <div class="section-cart">
                                        <p class="title-cart">Hình thức thanh toán:</p>
                                        <div class="information-cart">
                                            <input type="radio" name="dataOrder[order_payment]" value = "Ship Cod">
                                            <label for="shipcode">Ship Code</label><br>
                                            <input type="radio" name="dataOrder[order_payment]" value = "Thanh toán Online">
                                            <label for="banking">Banking</label><br>
                                            <div class="desc-banking">
                                                Quý khách vui lòng thanh toán qua tài khoản *** và ghi lại thông tin thanh toán và mã giao dịch trong phần Ghi chú
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary btn-cart w-100" name="thanhtoan" value="Thanh toán" />
                    </div>
                </div>
            <?php } else { ?>
                <a href="" class="empty-cart text-decoration-none w-100">
                    <i class="fa-duotone fa-cart-xmark"></i>
                    <p>Không có sản phẩm trong giỏ</p>
                    <span class="btn btn-warning">Về trang chủ</span>
                </a>
            <?php } ?>
        </div>
    </div>
</form>