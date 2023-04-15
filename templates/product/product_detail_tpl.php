<div class="grid-pro-detail w-clear">
    <div class="row">
        <div class="left-pro-detail col-md-6 col-lg-5 mb-4">
            <a id="Zoom-1" class="MagicZoom"
                data-options="zoomMode: off; hint: off; rightClick: true; selectorTrigger: hover; expandCaption: false; history: false;"
                href=""
                title="<?= $rowDetail['name'] ?>">
                <img src="upload/product/<?=$rowDetail['photo']?>" alt="" width="600" height="600">
            </a>
        </div>

        <div class="right-pro-detail col-md-6 col-lg-7 mb-4">
            <p class="title-pro-detail mb-2"><?= $rowDetail['name'] ?></p>
            <div class="desc-pro-detail"><?= htmlspecialchars_decode($rowDetail['description']) ?></div>
            <ul class="attr-pro-detail">
                <?php if (!empty($rowDetail['code'])) { ?>
                <li class="w-clear">
                    <label class="attr-label-pro-detail">Mã SP:</label>
                    <div class="attr-content-pro-detail"><?= $rowDetail['code'] ?></div>
                </li>
                <?php } ?>
                <li class="w-clear">
                    <label class="attr-label-pro-detail">Giá:</label>
                    <div class="attr-content-pro-detail">
                        <?php if ($rowDetail['sale_price']) { ?>
                        <span class="price-new-pro-detail"><?= $func->formatMoney($rowDetail['sale_price']) ?></span>
                        <span class="price-old-pro-detail"><?= $func->formatMoney($rowDetail['regular_price']) ?></span>
                        <?php } else { ?>
                        <span
                            class="price-new-pro-detail"><?= ($rowDetail['regular_price']) ? $func->formatMoney($rowDetail['regular_price']) : "Liên hệ" ?></span>
                        <?php } ?>
                    </div>
                </li>
                <li class="w-clear">
                    <label class="attr-label-pro-detail d-block">Số lượng:</label>
                    <div class="attr-content-pro-detail d-block">
                        <div class="quantity-pro-detail">
                            <span class="quantity-minus-pro-detail">-</span>
                            <input type="number" class="qty-pro" min="1" value="1" readonly />
                            <span class="quantity-plus-pro-detail">+</span>
                        </div>
                    </div>
                </li>
                <li class="w-clear">
                    <label class="attr-label-pro-detail">Lượt xem:</label>
                    <div class="attr-content-pro-detail"><?= $rowDetail['view'] ?></div>
                </li>
            </ul>
            <div class="cart-pro-detail">
                <a class="btn btn-success addcart rounded-0 mr-2" data-id="<?= $rowDetail['id'] ?>"
                    data-action="addnow">
                    <i class="fas fa-shopping-bag mr-1"></i>
                    <span>Thêm vào giỏ hàng</span>
                </a>
                <a class="btn btn-dark addcart rounded-0" data-id="<?= $rowDetail['id'] ?>" data-action="buynow">
                    <i class="fas fa-shopping-bag mr-1"></i>
                    <span>Mua ngay</span>
                </a>
            </div>
        </div>
    </div>
    <div class="tabs-pro-detail">
        <ul class="nav nav-tabs" id="tabsProDetail" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="info-pro-detail-tab" data-toggle="tab" href="#info-pro-detail"
                    role="tab">Thông tin sản phẩm</a>
            </li>
        </ul>
        <div class="tab-content pt-4 pb-4" id="tabsProDetailContent">
            <div class="tab-pane fade show active content-ck" id="info-pro-detail" role="tabpanel">
                <?= htmlspecialchars_decode($rowDetail['content']) ?>
            </div>
        </div>
    </div>
</div>

<div class="title-main"><span>Sản phẩm cùng loại</span></div>
<div class="content-main w-clear">
    <?php if (!empty($product)) { ?>
        <div class="grid-products grid-6">
        <?php foreach ($product as $k => $v) { ?>
    <div class="">
        <div class="product">
            <div class="box-product">
                <a href="<?=$v['slug']?>" class="pic-product scale-img">
                    <img src="upload/product/<?=$v['photo']?>" alt="" width="600" height="600">
                </a>
                <div class="info-product">
                    <h3 class="name-product"><a href="<?=$v['slug']?>"
                            class="text-decoration-none text-split2"><?=$v['name']?></a></h3>
                    <div class="dflex align-items-center ">
                        <p class="price-product">
                            <?php if($v['discount']) { ?>
                            <span class="price-new"><?=$func->formatMoney($v['sale_price']);?> </span><br>
                            <span class="price-old"><?=$func->formatMoney($v['regular_price']);?> </span>
                            <span class="price-per"><?='-'.$v['discount'].'%'?></span>
                            <?php } else { ?>
                            <div class="price-new">
                                <?php if($v['regular_price']) { $func->formatMoney($v['regular_price']); }
								    else { ?>
                                    <span>
                                        <a href="tel:<?=$optsetting['hotline']?>" class="text-dark">Liên hệ</a>
                                    </span>
                                <?php } ?>
                            </div>
                            <?php } ?>
                        </p>
                        <div class="product-cart"><a class="addcart" data-id="<?=$v['id']?>" data-action="addnow"><i
                                    class="fas fa-shopping-cart"></i></a></div>

                    </div>
                </div>
            </div>
        </div>
    </div>
        <?php } ?>
        </div>
        <?php }  else { ?> 
            <div class="col-12">
    <div class="alert alert-warning w-100" role="alert">
        <strong>Không tìm thấy kết quả</strong>
    </div>
</div>
<?php } ?>
<div class="clear"></div>
<div class="col-12">
    <div class="pagination-home w-100"><?= (!empty($paging)) ? $paging : '' ?></div>
</div>
</div>