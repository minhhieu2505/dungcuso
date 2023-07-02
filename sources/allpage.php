<?php
    if (!defined('SOURCES')) die("Error");
    /* Query allpage */
    $logo = $d->rawQueryOne("select photo from multi_media where type = 'logo' and find_in_set('hienthi',status)");
    $splist = $d->rawQuery("select name,id,slug from category where find_in_set('hienthi',status)");
    $social = $d->rawQuery("select name,id,link,photo from multi_media where type = 'social'");
    $slider = $d->rawQuery("select name,id,link,photo from multi_media where type = 'slide'");
    $policy = $d->rawQuery("select name,id,slug from news where type = 'chinh-sacha'");
    $commit = $d->rawQuery("select name,id,slug,content from news where type = 'cam-ket'");
    $minPrice = $d->rawQueryOne("select sale_price from product where id<>0 order by sale_price asc");
    $maxPrice = $d->rawQueryOne("select sale_price from product where id<>0 order by sale_price desc");
    if($_SESSION[$loginMember]['active'] == true){
        $userDetail = $d->rawQueryOne("select * from user where id = ".$_SESSION[$loginMember]['id']); 
    }
    /* Setting */
    $setting = $d->rawQueryOne("select * from #_setting");
    $optsetting = (!empty($setting['options'])) ? json_decode($setting['options'], true) : null;
?>