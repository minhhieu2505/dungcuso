<?php  
	if(!defined('SOURCES')) die("Error");

    $criteria = $d->rawQuery("select name,id,link,photo,description from multi_media where type = 'tieuchi' and find_in_set('hienthi',status)");
    $advertise = $d->rawQuery("select photo from multi_media where type = 'advertise' and find_in_set('hienthi',status)");
    $bestseller = $d->rawQuery("select name, photo, slug, id, regular_price, sale_price, discount from product where find_in_set('hienthi',status) order by discount desc limit 8");
    $promotion = $d->rawQuery("select name, photo, slug, id, regular_price, sale_price, discount from #_product where find_in_set('khuyenmai',status) and find_in_set('hienthi',status) order by id desc");
    $producthot = $d->rawQuery("select name, photo, slug, id, regular_price, sale_price, discount from #_product where find_in_set('hienthi',status) order by view desc");
    $newsnb = $d->rawQuery("select name, photo, slug, id, date_created, description from #_news where type = 'tin-tuc' and find_in_set('hienthi',status) order by id desc");
    // $question = $d->rawQuery("select name, photo, slug, id, date_created from #_news where type = 'cau-hoi' and find_in_set('hienthi',status) order by id desc");

?>