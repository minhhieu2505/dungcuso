<?php
    if (!defined('SOURCES')) die("Error");
    /* Query allpage */
    $logo = $d->rawQueryOne("select photo from multi_media where type = 'logo'");
    $splist = $d->rawQuery("select name,id,slug from category");
    $social = $d->rawQuery("select name,id,link,photo from multi_media where type = 'social'");
    $slider = $d->rawQuery("select name,id,link,photo from multi_media where type = 'slide'");
    $policy = $d->rawQuery("select name,id,slug from #_news where type = 'chinh-sacha'");
    $minPrice = $d->rawQueryOne("select sale_price from #_product where id<>0 order by sale_price asc");
    $maxPrice = $d->rawQueryOne("select sale_price from #_product where id<>0 order by sale_price desc");

    /* Setting */
    $setting = $d->rawQueryOne("select * from #_setting");
    $optsetting = (!empty($setting['options'])) ? json_decode($setting['options'], true) : null;
?>