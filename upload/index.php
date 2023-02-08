<?php  
	if(!defined('SOURCES')) die("Error");

    $slider = $cache->get("select name$lang, photo, link from #_photo where type = ? and find_in_set('hienthi',status) order by numb,id desc", array('slide'), 'result', 7200);
    $pronb = $cache->get("select id from #_product where type = ? and find_in_set('noibat',status) and find_in_set('hienthi',status)", array('san-pham'), 'result', 7200);
    $newsnb = $cache->get("select name$lang, slugvi, slugen, desc$lang, date_created, id, photo from #_news where type = ? and find_in_set('noibat',status) and find_in_set('hienthi',status) order by numb,id desc limit 6", array('kinh-nghiem'), 'result', 7200);
    $partner = $cache->get("select name$lang, link, photo from #_photo where type = ? and find_in_set('hienthi',status) order by numb, id desc", array('doitac'), 'result', 7200);
    $advertise1 = $cache->get("select name$lang, link, photo from #_photo where type = ? and find_in_set('hienthi',status) order by numb, id desc limit 2", array('advertise1'), 'result', 7200);
    $criteria = $cache->get("select name$lang, desc$lang, photo from #_photo where type = ? and find_in_set('hienthi',status) order by numb, id desc", array('criteria'), 'result', 7200);
    $advertise = $cache->get("select name$lang, desc$lang, photo from #_photo where type = ? and find_in_set('hienthi',status) order by numb, id desc", array('advertise2'), 'result', 7200);
    $bestseller = $cache->get("select name$lang, photo, slugvi, slugen, id, regular_price, sale_price, discount from #_product where type = ? and find_in_set('banchay',status) and find_in_set('hienthi',status) order by numb,id desc", array('san-pham'), 'result', 7200);
    $promotion = $cache->get("select name$lang, photo, slugvi, slugen, id, regular_price, sale_price, discount from #_product where type = ? and find_in_set('khuyenmai',status) and find_in_set('hienthi',status) order by numb,id desc", array('san-pham'), 'result', 7200);
    $producthot = $cache->get("select name$lang, photo, slugvi, slugen, id, regular_price, sale_price, discount from #_product where type = ? and find_in_set('hot',status) and find_in_set('hienthi',status) order by numb,id desc", array('san-pham'), 'result', 7200);
    $category = $cache->get("select name$lang, link, id, photo from #_photo where type = ? and find_in_set('hienthi',status) order by numb,id desc", array('category'), 'result', 7200);
    $question = $cache->get("select name$lang, slugvi, slugen, desc$lang, date_created, id, photo from #_news where type = ? and find_in_set('hienthi',status) order by numb,id desc limit 8", array('cau-hoi'), 'result', 7200);


    /* SEO */
    $seoDB = $seo->getOnDB(0,'setting','update','setting');
    if(!empty($seoDB['title'.$seolang])) $seo->set('h1',$seoDB['title'.$seolang]);
    if(!empty($seoDB['title'.$seolang])) $seo->set('title',$seoDB['title'.$seolang]);
    if(!empty($seoDB['keywords'.$seolang])) $seo->set('keywords',$seoDB['keywords'.$seolang]);
    if(!empty($seoDB['description'.$seolang])) $seo->set('description',$seoDB['description'.$seolang]);
    $seo->set('url',$func->getPageURL());
    $imgJson = (!empty($logo['options'])) ? json_decode($logo['options'],true) : null;
    if(empty($imgJson) || ($imgJson['p'] != $logo['photo']))
    {
        $imgJson = $func->getImgSize($logo['photo'],UPLOAD_PHOTO_L.$logo['photo']);
        $seo->updateSeoDB(json_encode($imgJson),'photo',$logo['id']);
    }
    if(!empty($imgJson))
    {
        $seo->set('photo',$configBase.THUMBS.'/'.$imgJson['w'].'x'.$imgJson['h'].'x2/'.UPLOAD_PHOTO_L.$logo['photo']);
        $seo->set('photo:width',$imgJson['w']);
        $seo->set('photo:height',$imgJson['h']);
        $seo->set('photo:type',$imgJson['m']);
    }
?>