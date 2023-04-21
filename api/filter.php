<?php
include "config.php";

/* Paginations */
include LIBRARIES . "class/class.PaginationsAjax.php";
$pagingAjax = new PaginationsAjax();
$pagingAjax->perpage = (!empty($_GET['perpage'])) ? htmlspecialchars($_GET['perpage']) : 1;
$eShow = htmlspecialchars($_GET['eShow']);
$p = (!empty($_GET['p'])) ? htmlspecialchars($_GET['p']) : 1;
$start = ($p - 1) * $pagingAjax->perpage;
$pageLink = "api/product.php?perpage=" . $pagingAjax->perpage;
$tempLink = "";
$where = "";
$params = array();

$id_category = (!empty($_POST['id_category'])) ? htmlspecialchars($_POST['id_category']) : "";
$from = (!empty($_POST['from'])) ? htmlspecialchars($_POST['from']) : 0;
$to = (!empty($_POST['to'])) ? htmlspecialchars($_POST['to']) : 0;
if(!empty($id_category)){
    $where .= " and find_in_set(id_category,'$id_category')";
}
if(!empty($to)){
    $where .= " and sale_price >=".$from." and sale_price <= ".$to;
}

$tempLink .= "&p=";
$pageLink .= $tempLink;

/* Get data */
$sql = "select name, slug, id, photo, regular_price, sale_price, discount from product where id <> 0 $where and find_in_set('hienthi',status) order by id desc";
$sqlCache = $sql . " ";
$items = $d->rawQuery($sqlCache, $params);

/* Count all data */
// $countItems = count($cache->get($sql, $params, 'result', 7200));

/* Get page result */
// $pagingItems = $pagingAjax->getAllPageLinks($countItems, $pageLink, $eShow);
?>
<?php if ($items) { ?>
        <?php foreach ($items as $k => $v) { ?>
            <div class="">
                <div class="product">
                    <div class="box-product">
                        <a href="<?= $v['slug'] ?>" class="pic-product scale-img">
                            <img src="upload/product/<?= $v['photo'] ?>" alt="" width="600" height="600">
                        </a>
                        <div class="info-product">
                            <h3 class="name-product"><a href="<?= $v['slug'] ?>" class="text-decoration-none text-split2"><?= $v['name'] ?></a></h3>
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
                                <div class="product-cart"><a class="addcart" data-id="<?= $v['id'] ?>" data-action="addnow"><i
                                            class="fas fa-shopping-cart"></i></a></div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php } ?>
    <div class="pagination-ajax">
        <?= $pagingItems ?>
    </div>
<?php } ?>