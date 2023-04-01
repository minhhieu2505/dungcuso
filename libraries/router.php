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
    $router->map('GET|POST', '[a:com]', 'allpage', 'show');
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
		array("tbl" => "product", "field" => "id", "source" => "product", "com" => "san-pham", "type" => "san-pham"),
		
		/* Tin tức */
		array("tbl" => "news", "field" => "id", "source" => "news", "com" => "kinh-nghiem", "type" => "kinh-nghiem"),
		
		/* Hướng dẫn mua hàng */
		array("tbl" => "news", "field" => "id", "source" => "news", "com" => "huong-dan-mua-hang", "type" => "huong-dan-mua-hang"),
		
		/* Câu hỏi */
		array("tbl" => "news", "field" => "id", "source" => "news", "com" => "cau-hoi", "type" => "cau-hoi"),
		
		/* Chính sách */
		array("tbl" => "news", "field" => "id", "source" => "news", "com" => "chinh-sach", "type" => "chinh-sach"),
	
		/* Liên hệ */
		array("tbl" => "static", "source" => "contact", "com" => "lien-he", "type" => "lien-he"),

	);
	
	/* Find data */
	if(!empty($com) && !in_array($com, ['tim-kiem']))
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
		case 'lien-he':
			$source = "contact";
			$template = "contact/contact";
			$titleMain = "Liên hệ";
			break;
		case 'san-pham-moi':
			$source = "product";
			$template = isset($_GET['id']) ? "product/product_detail" : "product/product";
			$type = "san-pham";
			$titleMain = "Sản phẩm mới";
			break;
		case 'kinh-nghiem':
			$source = "news";
			$template = isset($_GET['id']) ? "news/news_detail" : "news/news";
			$type = $com;
			$titleMain = "Kinh nghiệm";
			break;
		case 'huong-dan-mua-hang':
			$source = "news";
			$template = isset($_GET['id']) ? "news/news_detail" : "news/news";
			$type = $com;
			$titleMain = "Hướng dẫn mua hàng";
			break;
		case 'cau-hoi':
			$source = "news";
			$template = isset($_GET['id']) ? "news/news_detail" : "news/news";
			$type = $com;
			$titleMain = "Câu hỏi";
			break;
		case 'chinh-sach':
			$source = "news";
			$template = isset($_GET['id']) ? "news/news_detail" : "news/news";
			$type = $com;
			$titleMain = "Chính sách";
			break;
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