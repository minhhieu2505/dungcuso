<?php
    /* Router */
    $router->setBasePath($config['database']['url']);
    $router->map('GET', array(ADMIN.'/', 'admin'), function(){
    	global $func, $config;
    	$func->redirect($config['database']['url'].ADMIN."/index.php");
    	exit;
    });
    $router->map('GET', array(ADMIN, 'admin'), function(){
    	global $func, $config;
    	$func->redirect($config['database']['url'].ADMIN."/index.php");
    	exit;
    });
    $router->map('GET|POST', '', 'index', 'home');
    $router->map('GET|POST', 'index.php', 'index', 'index');
    $router->map('GET|POST', 'sitemap.xml', 'sitemap', 'sitemap');
    $router->map('GET|POST', '[a:com]', 'allpage', 'show');
    $router->map('GET|POST', '[a:com]/[a:lang]/', 'allpagelang', 'lang');
    $router->map('GET|POST', '[a:com]/[a:action]', 'account', 'account');
    /* Router match */
    $match = $router->match();

    /* Router check */
	if(is_array($match))
	{
		if(is_callable($match['target']))
		{
			call_user_func_array($match['target'], $match['params']); 
		}
		else
		{
			$com = (!empty($match['params']['com'])) ? htmlspecialchars($match['params']['com']) : htmlspecialchars($match['target']);
			$getPage = !empty($_GET['p']) ? htmlspecialchars($_GET['p']) : 1;
		}
	}
	else
	{
		header('HTTP/1.0 404 Not Found', true, 404);
		include("404.php");
		exit;
	}

	/* Setting */
    $sqlCache = "select * from #_setting";
    $setting = $cache->get($sqlCache, null, 'fetch', 7200);
    $optsetting = (!empty($setting['options'])) ? json_decode($setting['options'],true) : null;
	/* Slug lang */
    $sluglang = 'slugvi';

	/* Tối ưu link */
	$requick = array(
		/* Sản phẩm */
		array("tbl" => "product_list", "field" => "idl", "source" => "product", "com" => "san-pham", "type" => "san-pham"),
		array("tbl" => "product_cat", "field" => "idc", "source" => "product", "com" => "san-pham", "type" => "san-pham"),
		array("tbl" => "product_item", "field" => "idi", "source" => "product", "com" => "san-pham", "type" => "san-pham"),
		array("tbl" => "product_sub", "field" => "ids", "source" => "product", "com" => "san-pham", "type" => "san-pham"),
		array("tbl" => "product_brand", "field" => "idb", "source" => "product", "com" => "thuong-hieu", "type" => "san-pham"),
		array("tbl" => "product", "field" => "id", "source" => "product", "com" => "san-pham", "type" => "san-pham", "menu" => true),
		
		/* Tags */
		array("tbl" => "tags", "tbltag" => "product", "field" => "id", "source" => "tags", "com" => "tags-san-pham", "type" => "san-pham", "menu" => true),
		array("tbl" => "tags", "tbltag" => "news", "field" => "id", "source" => "tags", "com" => "tags-tin-tuc", "type" => "tin-tuc", "menu" => true),

		/* Thư viện ảnh */
		array("tbl" => "product", "field" => "id", "source" => "product", "com" => "thu-vien-anh", "type" => "thu-vien-anh", "menu" => true),

		/* Video */
		array("tbl" => "photo", "field" => "id", "source" => "video", "com" => "video", "type" => "video", "menu" => true),

		/* Tin tức */
		array("tbl" => "news_list", "field" => "idl", "source" => "news", "com" => "tin-tuc", "type" => "tin-tuc"),
		array("tbl" => "news_cat", "field" => "idc", "source" => "news", "com" => "tin-tuc", "type" => "tin-tuc"),
		array("tbl" => "news_item", "field" => "idi", "source" => "news", "com" => "tin-tuc", "type" => "tin-tuc"),
		array("tbl" => "news_sub", "field" => "ids", "source" => "news", "com" => "tin-tuc", "type" => "tin-tuc"),
		array("tbl" => "news", "field" => "id", "source" => "news", "com" => "tin-tuc", "type" => "tin-tuc", "menu" => true),

		/* Bài viết */
		array("tbl" => "news", "field" => "id", "source" => "news", "com" => "tuyen-dung", "type" => "tuyen-dung", "menu" => true),
		array("tbl" => "news", "field" => "id", "source" => "news", "com" => "chinh-sach", "type" => "chinh-sach", "menu" => false),

		/* Trang tĩnh */
		array("tbl" => "static", "field" => "id", "source" => "static", "com" => "gioi-thieu", "type" => "gioi-thieu", "menu" => true),

		/* Liên hệ */
		array("tbl" => "", "field" => "id", "source" => "", "com" => "lien-he", "type" => "", "menu" => true),
	);

	/* Find data */
	if(!empty($com) && !in_array($com, ['tim-kiem', 'account', 'sitemap']))
	{
		foreach($requick as $k => $v)
		{
			$urlTbl = (!empty($v['tbl'])) ? $v['tbl'] : '';
			$urlTblTag = (!empty($v['tbltag'])) ? $v['tbltag'] : '';
			$urlType = (!empty($v['type'])) ? $v['type'] : '';
			$urlField = (!empty($v['field'])) ? $v['field'] : '';
			$urlCom = (!empty($v['com'])) ? $v['com'] : '';
			
			if(!empty($urlTbl) && !in_array($urlTbl, ['static', 'photo']))
			{
				$row = $d->rawQueryOne("select id from #_$urlTbl where $sluglang = ? and type = ? and find_in_set('hienthi',status) limit 0,1",array($com,$urlType));
				
				if(!empty($row['id']))
				{
					$_GET[$urlField] = $row['id'];
					$com = $urlCom;
					break;
				}
			}
		}
	}

	/* Switch coms */
	switch($com)
	{
		case 'san-pham':
			$source = "product";
			$template = isset($_GET['id']) ? "product/product_detail" : "product/product";
			$type = $com;
			$titleMain = "Sản phẩm";
			break;
		case '':
		case 'index':
			$source = "index";
			$template ="index/index";
			break;

		default: 
			header('HTTP/1.0 404 Not Found', true, 404);
			include("404.php");
			exit();
	}
	/* Require datas for all page */
	require_once SOURCES."allpage.php";

	/* Include sources */
	if(!empty($source))
    {
        include SOURCES.$source.".php";
    }

    /* Include sources */
	if(empty($template))
	{
		header('HTTP/1.0 404 Not Found', true, 404);
		include("404.php");
		exit();
	}
?>