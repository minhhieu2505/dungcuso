<?php
    if(!defined('SOURCES')) die("Error");

    /* Query allpage */

    $logo = $d->rawQueryOne("select photo from #_photo where type = 'logo'");
    $logo2 = $d->rawQueryOne("select photo from #_photo where type = 'logo2'");
    $splist = $d->rawQuery("select namevi,id,slugvi from #_product_list where type = 'san-pham'");
    $policy = $d->rawQuery("select namevi,id,slugvi from #_news where type = 'chinh-sach'");
    $slider = $d->rawQuery("select namevi,id,link,photo from #_photo where type = 'slide'");
    $social = $d->rawQuery("select namevi,id,link,photo from #_photo where type = 'social'");
    $advertise1 = $d->rawQuery("select namevi,id,link,photo from #_photo where type = 'advertise1' limit 2");
    $advertise = $d->rawQuery("select namevi,id,link,photo from #_photo where type = 'advertise2'");
    $footer = $d->rawQueryOne("select namevi,id,contentvi from #_static where type = 'footer' limit 1");


?>