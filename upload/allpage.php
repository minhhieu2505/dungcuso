<?php
    if(!defined('SOURCES')) die("Error");

    /* Query allpage */
    $favicon = $cache->get("select photo from #_photo where type = ? and act = ? and find_in_set('hienthi',status) limit 0,1", array('favicon','photo_static'), 'fetch', 7200);
    $logo = $cache->get("select id, photo, options from #_photo where type = ? and act = ? limit 0,1", array('logo','photo_static'), 'fetch', 7200);
    $logo2 = $cache->get("select id, photo, options from #_photo where type = ? and act = ? limit 0,1", array('logo2','photo_static'), 'fetch', 7200);
    $slogan = $cache->get("select name$lang from #_static where type = ? limit 0,1", array('slogan'), 'fetch', 7200);
    $social = $cache->get("select name$lang, photo, link from #_photo where type = ? and find_in_set('hienthi',status) order by numb,id desc", array('social'), 'result', 7200);
    $splist = $cache->get("select name$lang, slugvi, slugen, id, icon from #_product_list where type = ? and find_in_set('hienthi',status) order by numb,id desc", array('san-pham'), 'result', 7200);
    $ttlist = $cache->get("select name$lang, slugvi, slugen, id from #_news_list where type = ? and find_in_set('hienthi',status) order by numb,id desc", array('tin-tuc'), 'result', 7200);
    $footer = $cache->get("select name$lang, content$lang from #_static where type = ? limit 0,1", array('footer'), 'fetch', 7200);
    $policy = $cache->get("select name$lang, slugvi, slugen, id, photo from #_news where type = ? and find_in_set('hienthi',status) order by numb,id desc", array('chinh-sach'), 'result', 7200);
    $procatnb = $cache->get("select name$lang, slugvi, slugen, icon from #_product_cat where type = ? and find_in_set('header',status) and find_in_set('hienthi',status) order by numb,id desc limit 4", array('san-pham'), 'result', 7200);
    $brand = $cache->get("select name$lang, slugvi, slugen, id, photo from #_product_brand where type = ? and find_in_set('hienthi',status) order by numb,id desc", array('san-pham'), 'result', 7200);
    $brand = $d->rawQuery("select name$lang, slugvi, slugen, id, type, photo, options from #_product_brand where type = ? and find_in_set('hienthi', status) order by numb, id desc", array("san-pham"));
    $filter_price = $d->rawQuery("select name$lang,  regular_price, sale_price, id from #_product where type = ? and find_in_set('hienthi', status) order by numb, id desc", array("filter-price"));
    $advertisepro = $cache->get("select name$lang, desc$lang, photo from #_photo where type = ? and find_in_set('hienthi',status) order by numb, id desc limit 2", array('advertise3'), 'result', 7200);
    $doyouknow = $cache->get("select content$lang from #_static where type = ? and find_in_set('hienthi',status) limit 1", array('doyouknow'), 'fetch', 7200);
    $camket = $cache->get("select name$lang, desc$lang from #_news where type = ? and find_in_set('hienthi',status) order by numb,id desc", array('cam-ket'), 'result', 7200);
    $policy2 = $cache->get("select name$lang, slugvi, slugen, id, photo from #_news where type = ? and find_in_set('hienthi',status) order by numb,id desc", array('chinh-sach2'), 'result', 7200);
    $color1 = $cache->get("select name$lang from #_static where type = ? limit 0,1", array('color1'), 'fetch', 7200);
    $color2 = $cache->get("select name$lang from #_static where type = ? limit 0,1", array('color2'), 'fetch', 7200);
    $color3 = $cache->get("select name$lang from #_static where type = ? limit 0,1", array('color3'), 'fetch', 7200);
    $color4 = $cache->get("select name$lang from #_static where type = ? limit 0,1", array('color4'), 'fetch', 7200);
    $color5 = $cache->get("select name$lang from #_static where type = ? limit 0,1", array('color5'), 'fetch', 7200);
    $color6 = $cache->get("select name$lang from #_static where type = ? limit 0,1", array('color6'), 'fetch', 7200);
    $color7 = $cache->get("select name$lang from #_static where type = ? limit 0,1", array('color7'), 'fetch', 7200);
    $splistnb = $cache->get("select name$lang, slugvi, slugen, id, photo, color from #_product_list where type = ? and find_in_set('noibat',status) and find_in_set('hienthi',status) order by numb,id desc", array('san-pham'), 'result', 7200);




    /* Get statistic */
    $counter = $statistic->getCounter();
    $online = $statistic->getOnline();
     
    /* Newsletter */
    if(!empty($_POST['newsletter'])&&$_POST['newsletter']=='submit')
    {
        $responseCaptcha = $_POST['recaptcha_response_newsletter'];
       
        $resultCaptcha = $func->checkRecaptcha($responseCaptcha);
        $scoreCaptcha = (!empty($resultCaptcha['score'])) ? $resultCaptcha['score'] : 0;
        $actionCaptcha = (!empty($resultCaptcha['action'])) ? $resultCaptcha['action'] : '';
        $testCaptcha = (!empty($resultCaptcha['test'])) ? $resultCaptcha['test'] : false;
        $dataNewsletter = (!empty($_POST['dataNewsletter'])) ? $_POST['dataNewsletter'] : null;

        /* Valid data */
        if(empty($dataNewsletter['email']))
        {
            $flash->set('error', 'Email không được trống');
        }

        if(!empty($dataNewsletter['email']) && !$func->isEmail($dataNewsletter['email']))
        {
            $flash->set('error', 'Email không hợp lệ');
        }

        $error = $flash->get('error');

        if(!empty($error))
        {
            $func->transfer($error, $configBase, false);
        }

        /* Save data */
        if(($scoreCaptcha >= 0.3 && $actionCaptcha == 'Newsletter') || $testCaptcha == true)
        {
            $data = array();
            $data['email'] = htmlspecialchars($dataNewsletter['email']);
            $data['date_created'] = time();
            $data['type'] = 'dangkynhantin';

            if($d->insert('newsletter',$data))
            {
                $func->transfer("Đăng ký nhận tin thành công. Chúng tôi sẽ liên hệ với bạn sớm.", $configBase);
            }
            else
            {
                $func->transfer("Đăng ký nhận tin thất bại. Vui lòng thử lại sau.", $configBase, false);
            }
        }
        else
        {
            $func->transfer("Đăng ký nhận tin thất bại. Vui lòng thử lại sau.", $configBase, false);
        }
    }
?>