<?php
    if(!defined('SOURCES')) die("Error");

    /* Query allpage */

    $logo = $d->rawQueryOne("select photo from #_photo where type = 'logo'");
    $splist = $d->rawQuery("select namevi,id,slugvi from #_product_list where type = 'san-pham'");
    $slider = $d->rawQuery("select namevi,id,link,photo from #_photo where type = 'slide'");
    $advertise1 = $d->rawQuery("select namevi,id,link,photo from #_photo where type = 'advertise1' limit 2");
    $advertise = $d->rawQuery("select namevi,id,link,photo from #_photo where type = 'advertise2'");

?>