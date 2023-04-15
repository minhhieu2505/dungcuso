<?php
if (!defined('SOURCES')) die("Error");

/* Tìm kiếm sản phẩm */
if (!empty($_GET['keyword'])) {
    $tukhoa = htmlspecialchars($_GET['keyword']);
    $tukhoa = $func->changeTitle($tukhoa);

    if ($tukhoa) {
        $where = "";
        $where = " (name LIKE ? or slug LIKE ?) and find_in_set('hienthi',status)";
        $params = array("%$tukhoa%", "%$tukhoa%");
        $sql = "select photo, name, slug, sale_price, regular_price, discount, id from #_product where $where order by id desc";
        $product = $d->rawQuery($sql, $params);
    }
}

