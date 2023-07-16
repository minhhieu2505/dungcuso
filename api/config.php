<?php
	session_start();
	define('LIBRARIES','../libraries/');
    define('THUMBS','thumbs');
    $lang = 'vi';

    require_once LIBRARIES."config.php";
    require_once LIBRARIES.'autoload.php';
    new AutoLoad();
    $d = new PDODb($config['database']);
    $func = new Functions($d);
    $cart = new Cart($d);

    /* Setting */
    $setting = $d->rawQueryOne("select * from #_setting");
    $optsetting = (!empty($setting['options'])) ? json_decode($setting['options'],true) : null;
?>