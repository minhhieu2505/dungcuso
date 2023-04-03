<?php
if (!defined('SOURCES')) die("Error");

/* Tìm kiếm sản phẩm */
if (!empty($_GET['keyword'])) {
    $tukhoa = htmlspecialchars($_GET['keyword']);
    $tukhoa = $func->changeTitle($tukhoa);

    if ($tukhoa) {
        $where = "";
        $where = "type = ? and (namevi LIKE ? or slugvi LIKE ?) and find_in_set('hienthi',status)";
        $params = array("san-pham", "%$tukhoa%", "%$tukhoa%");
        $sql = "select photo, namevi, slugvi, sale_price, regular_price, discount, id from #_product where $where order by numb,id desc";
        $product = $d->rawQuery($sql, $params);
    }
}

