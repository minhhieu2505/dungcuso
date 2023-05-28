<?php
include "config.php";

/* Paginations */
$where = "";
$order = "";
$getPage = (!empty($_GET['p'])) ? htmlspecialchars($_GET['p']) : 1;
$curPage = $getPage;
$perPage = 20;
$startpoint = ($curPage * $perPage) - $perPage;
$limit = " limit " . $startpoint . "," . $perPage;

$id_category = (!empty($_GET['id_category'])) ? htmlspecialchars($_GET['id_category']) : "";
$id_sort = (!empty($_GET['id_sort'])) ? htmlspecialchars($_GET['id_sort']) : 0;
$from = (!empty($_GET['from'])) ? htmlspecialchars($_GET['from']) : 0;
$to = (!empty($_GET['to'])) ? htmlspecialchars($_GET['to']) : 0;
if (!empty($id_category)) {
    $where .= " and find_in_set(id_category,'$id_category')";
}
if (!empty($to)) {
    $where .= " and sale_price >=" . $from . " and sale_price <= " . $to;
}

if ($id_sort == 2) {
    $order .= " order by sale_price desc";
} elseif ($id_sort == 1) {
    $order .= " order by sale_price asc";
} else {
    $order .= " order by id desc";
}

/* Get data */
$sql = "select name, slug, id, photo, regular_price, sale_price, discount from product where id <> 0 $where and find_in_set('hienthi',status) $order $limit";
$items = $d->rawQuery($sql);
$sqlNum = "select count(*) as 'num' from #_product where id <> 0 $where and find_in_set('hienthi',status) order by date_created desc";
$count = $d->rawQueryOne($sqlNum);
$total = (!empty($count)) ? $count['num'] : 0;
$url = 'san-pham?id_category='.$id_category.'&id_sort='.$id_sort.'&from='.$from.'&to='.$to;
$paging = $func->pagination($total, $perPage, $curPage, $url);
?>
<?php if ($items) { ?>
    <div class="grid-products">
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
                                            <?php if ($v['regular_price']) { ?>
                                                <?= $func->formatMoney($v['regular_price']); ?>
                                            <?php } else { ?>
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
    </div>
    <div class="pagination-home w-100">
        <?= (!empty($paging)) ? $paging : '' ?>
    </div>
<?php } else { ?>
    <div class="full-row">
        <div class="alert alert-warning w-100" role="alert">
            <strong>
                Không có sản phẩm phù hợp
            </strong>
        </div>
    </div>
<?php } ?>