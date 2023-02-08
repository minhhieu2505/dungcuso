<?php
	session_start();
	define('LIBRARIES','../libraries/');
    define('THUMBS','thumbs');
    define('WATERMARK','watermark');

	if(empty($_SESSION['lang'])) $_SESSION['lang'] = 'vi';
    $lang = $_SESSION['lang'];

    require_once LIBRARIES."config.php";
    require_once LIBRARIES.'autoload.php';
    new AutoLoad();
    $d = new PDODb($config['database']);
    $cache = new Cache($d);
    $func = new Functions($d, $cache);
    // $cart = new Cart($d);

    /* Slug lang */
    $sluglang = 'slugvi';

    /* Setting */
    $sqlCache = "select * from #_setting";
    $setting = $cache->get($sqlCache, null, 'fetch', 7200);
    $optsetting = (!empty($setting['options'])) ? json_decode($setting['options'],true) : null;
?>