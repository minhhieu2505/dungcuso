<?php
    if(!defined('SOURCES')) die("Error");

    /* Query allpage */

    $logo = $d->rawQueryOne("select photo from #_photo where type = 'logo'");
    $splist = $d->rawQuery("select namevi,id,slugvi from #_product_list where type = 'san-pham'");
?>