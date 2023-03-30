<?php  
	if(!defined('SOURCES')) die("Error");

    $criteria = $d->rawQuery("select namevi,id,link,photo,descvi from #_photo where type = 'criteria'");
    $bestseller = $d->rawQuery("select namevi, photo, slugvi, slugen, id, regular_price, sale_price, discount from #_product where type = 'san-pham' and find_in_set('banchay',status) and find_in_set('hienthi',status) order by numb,id desc");
    $promotion = $d->rawQuery("select namevi, photo, slugvi, slugen, id, regular_price, sale_price, discount from #_product where type = 'san-pham' and find_in_set('khuyenmai',status) and find_in_set('hienthi',status) order by numb,id desc");
    $producthot = $d->rawQuery("select namevi, photo, slugvi, slugen, id, regular_price, sale_price, discount from #_product where type = 'san-pham' and find_in_set('hot',status) and find_in_set('hienthi',status) order by numb,id desc");
    $newsnb = $d->rawQuery("select namevi, photo, slugvi, slugen, id, date_created, descvi from #_news where type = 'kinh-nghiem' order by numb,id desc");
    $question = $d->rawQuery("select namevi, photo, slugvi, slugen, id, date_created from #_news where type = 'cau-hoi' and find_in_set('hienthi',status) order by numb,id desc");

?>