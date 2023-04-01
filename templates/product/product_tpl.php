<div class="title-main"><span><?= (!empty($titleCate)) ? $titleCate : @$titleMain ?></span></div>
<div class="content-main grid-products w-clear">
    <?php if (!empty($product)) {
        foreach ($product as $k => $v) { ?>
    <div class="">
        <div class="product">
            <div class="box-product">
                <a href="<?=$v['slugvi']?>" class="pic-product scale-img">
                    <img src="upload/product/<?=$v['photo']?>" alt="" width="600" height="600">
                </a>
                <div class="info-product">
                    <h3 class="name-product"><a href="<?=$v['slugvi']?>"
                            class="text-decoration-none text-split2"><?=$v['namevi']?></a></h3>
                    <div class="dflex align-items-center ">
                        <p class="price-product">
                            <?php if($v['discount']) { ?>
                            <span class="price-new"><?=$v['sale_price']?> đ</span><br>
                            <span class="price-old"><?=$v['regular_price']?> đ</span>
                            <span class="price-per"><?='-'.$v['discount'].'%'?></span>
                            <?php } else { ?>
                            <span class="price-new">
                                <?php if($v['regular_price']) { 
																$v['regular_price']; }
																else { ?>
                                <span><a href="tel:<?=$optsetting['hotline']?>" class="text-dark">Liên hệ</a></span>
                                <?php }
															?></span>
                            <?php } ?>
                        </p>
                        <div class="product-cart"><a class="addcart" data-id="<?=$v['id']?>" data-action="addnow"><i
                                    class="fas fa-shopping-cart"></i></a></div>

                    </div>
                </div>
            </div>
        </div>
                                                                </div>
    
    <?php }
    } else { ?> <div class="col-12">
    <div class="alert alert-warning w-100" role="alert">
        <strong><?= khongtimthayketqua ?></strong>
    </div>
</div>
<?php } ?>
<div class="clear"></div>
<div class="col-12">
    <div class="pagination-home w-100"><?= (!empty($paging)) ? $paging : '' ?></div>
</div>
</div>