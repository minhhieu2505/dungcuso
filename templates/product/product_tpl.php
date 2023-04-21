<div class="row">
    <div class="col-lg-3">
        <div class="box-filter">
            <div class="filter-items">
                <div class="filter-items-name"> Danh mục sản phẩm</div>
                <?php foreach ($splist as $key => $v) { ?>
                    <div class="items-filter-child filter-category" data-idcategory="<?=$v['id']?>">
                        <div class="name-filter"><?=$v['name']?></div>
                        <div class="check-box"><i></i></div>
                    </div>
                <?php } ?>  
            </div>
            <div class="filter-items">
                <div class="filter-items-name"> Giá</div>
                <div class="items-filter-child">
                    <div class="w-100">
                        <div id="range_price"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-9">
        <div class="title-main"><span>
                <?= (!empty($titleCate)) ? $titleCate : @$titleMain ?>
            </span></div>
        <div class="content-main  w-clear">
            <?php if (!empty($product)) { ?>
                <div class="grid-products grid-4">
                    <?php foreach ($product as $k => $v) { ?>
                        <div class="">
                            <div class="product">
                                <div class="box-product">
                                    <a href="<?= $v['slug'] ?>" class="pic-product scale-img">
                                        <img src="upload/product/<?= $v['photo'] ?>" alt="" width="600" height="600">
                                    </a>
                                    <div class="info-product">
                                        <h3 class="name-product"><a href="<?= $v['slug'] ?>"
                                                class="text-decoration-none text-split2"><?= $v['name'] ?></a></h3>
                                        <div class="dflex align-items-center ">
                                            <p class="price-product">
                                                <?php if ($v['discount']) { ?>
                                                    <span class="price-new">
                                                        <?= $func->formatMoney($v['sale_price']); ?>
                                                    </span><br>
                                                    <span class="price-old">
                                                        <?= $func->formatMoney($v['regular_price']); ?>
                                                    </span>
                                                    <span class="price-per">
                                                        <?= '-' . $v['discount'] . '%' ?>
                                                    </span>
                                                <?php } else { ?>
                                                    <span class="price-new">
                                                        <?php if ($v['regular_price']) {
                                                            $func->formatMoney($v['regular_price']);
                                                        } else { ?>
                                                            <span><a href="tel:<?= $optsetting['hotline'] ?>" class="text-dark">Liên
                                                                    hệ</a></span>
                                                        <?php }
                                                        ?>
                                                    </span>
                                                <?php } ?>
                                            </p>
                                            <div class="product-cart"><a class="addcart" data-id="<?= $v['id'] ?>"
                                                    data-action="addnow"><i class="fas fa-shopping-cart"></i></a></div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php } ?>
                </div>
            <?php } else { ?>
                <div class="col-12">
                    <div class="alert alert-warning w-100" role="alert">
                        <strong>Không tìm thấy kết quả</strong>
                    </div>
                </div>
            <?php } ?>
            <div class="clear"></div>
            <div class="col-12">
                <div class="pagination-home w-100">
                    <?= (!empty($paging)) ? $paging : '' ?>
                </div>
            </div>
        </div>
    </div>
</div>