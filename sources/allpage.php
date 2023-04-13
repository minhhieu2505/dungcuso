<?php
    if(!defined('SOURCES')) die("Error");

    /* Query allpage */

    $logo = $d->rawQueryOne("select photo from multi_media where type = 'logo'");
    $splist = $d->rawQuery("select name,id,slug from category");
    $social = $d->rawQuery("select name,id,link,photo from multi_media where type = 'social'");
    $slider = $d->rawQuery("select name,id,link,photo from multi_media where type = 'slide'");
    // $logo2 = $d->rawQueryOne("select photo from multi_media where type = 'logo2'");
    // $policy = $d->rawQuery("select name,id,slugvi from #_news where type = 'chinh-sach'");
    // $advertise1 = $d->rawQuery("select name,id,link,photo from multi_media where type = 'advertise1' limit 2");
    // $advertise = $d->rawQuery("select name,id,link,photo from multi_media where type = 'advertise2'");
    // $footer = $d->rawQueryOne("select name,id,contentvi from #_static where type = 'footer' limit 1");

	/* Setting */
    $setting = $d->rawQueryOne("select * from #_setting");
    $optsetting = (!empty($setting['options'])) ? json_decode($setting['options'],true) : null;
?>