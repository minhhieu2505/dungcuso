<?php
/* Router */
$router->setBasePath($config['database']['url']);
$router->map('GET', array(ADMIN . '/', 'admin'), function () {
	global $func, $config;
	$func->redirect($config['database']['url'] . ADMIN . "/index.php");
	exit;
});
$router->map('GET', array(ADMIN, 'admin'), function () {
	global $func, $config;
	$func->redirect($config['database']['url'] . ADMIN . "/index.php");
	exit;
});
$router->map('GET|POST', '', 'index', 'home');
$router->map('GET|POST', 'index.php', 'index', 'index');
$router->map('GET|POST', '[a:com]', 'allpage', 'show');
$router->map('GET|POST', '[a:com]/[a:action]', 'account', 'account');

/* Router match */
$match = $router->match();

/* Router check */
if (is_array($match)) {
	if (is_callable($match['target'])) {
		call_user_func_array($match['target'], $match['params']);
	} else {
		$com = (!empty($match['params']['com'])) ? htmlspecialchars($match['params']['com']) : htmlspecialchars($match['target']);
		$getPage = !empty($_GET['p']) ? htmlspecialchars($_GET['p']) : 1;
	}
} else {
	header('HTTP/1.0 404 Not Found', true, 404);
	include("404.php");
	exit;
}


/* Slug lang */
$sluglang = 'slug';

/* Tối ưu link */
$requick = array(
	/* Sản phẩm */
	array("tbl" => "category", "field" => "idl", "source" => "product", "com" => "san-pham"),
	array("tbl" => "product", "field" => "id", "source" => "product", "com" => "san-pham"),

	/* Tin tức */
	array("tbl" => "news", "field" => "id", "source" => "news", "com" => "tin-tuc", "type" => "tin-tuc"),

	/* Hướng dẫn mua hàng */
	array("tbl" => "news", "field" => "id", "source" => "news", "com" => "huong-dan-mua-hang", "type" => "huong-dan-mua-hang"),

	/* Chính sách */
	array("tbl" => "news", "field" => "id", "source" => "news", "com" => "chinh-sacha", "type" => "chinh-sacha"),

);
/* Find data */
if (!empty($com) && !in_array($com, ['tim-kiem','account', 'san-pham-moi'])) {
	foreach ($requick as $k => $v) {
		$urlTbl = (!empty($v['tbl'])) ? $v['tbl'] : '';
		$urlTblTag = (!empty($v['tbltag'])) ? $v['tbltag'] : '';
		$urlType = (!empty($v['type'])) ? $v['type'] : '';
		$urlField = (!empty($v['field'])) ? $v['field'] : '';
		$urlCom = (!empty($v['com'])) ? $v['com'] : '';
		$where = "";
		if (!empty($urlType)) {
			$where .= " and type = '" . $urlType . "' ";
		}
		if (!empty($urlTbl) && !in_array($urlTbl, ['static', 'photo'])) {
			$row = $d->rawQueryOne("select id from $urlTbl where slug = ? $where limit 0,1", array($com));
			if (!empty($row['id'])) {
				$_GET[$urlField] = $row['id'];
				$com = $urlCom;
				break;
			}
		}
	}
}

var_dump($com);


/* Switch coms */
switch ($com) {
	case 'san-pham':
		$source = "product";
		$template = isset($_GET['id']) ? "product/product_detail" : "product/product";
		$titleMain = "Sản phẩm";
		break;
	case 'san-pham-ban-chay':
		$source = "product";
		$template = "product/product";
		$titleMain = "Sản phẩm bán chạy";
		break;
	case 'tin-tuc':
		$source = "news";
		$template = isset($_GET['id']) ? "news/news_detail" : "news/news";
		$type = $com;
		$titleMain = "Tin tức";
		break;
	case 'huong-dan-mua-hang':
		$source = "news";
		$template = isset($_GET['id']) ? "news/news_detail" : "news/news";
		$type = $com;
		$titleMain = "Hướng dẫn mua hàng";
		break;

	case 'chinh-sacha':
		$source = "news";
		$template = isset($_GET['id']) ? "news/news_detail" : "news/news";
		$type = $com;
		$titleMain = "Chính sách";
		break;
	case 'lien-he':
		$source = "contact";
		$template = "contact/contact";
		$titleMain = "Liên hệ";
		break;
	case 'tim-kiem':
		$source = "search";
		$template = "product/product";
		$titleMain = "Tìm kiếm";
		break;
	case 'gio-hang':
		$source = "order";
		$template = 'order/order';
		$titleMain = "Giỏ hàng";
		break;
	case 'account':
        $source = "user";
        break;
	case 'index':
		$source = "index";
		$template = "index/index";
		break;
	case 'login':
		$source = "login";
		$template = "account/login";
		break;

	default:
		header('HTTP/1.0 404 Not Found', true, 404);
		include("404.php");
		exit();
}

/* Require datas for all page */
require_once SOURCES . "allpage.php";

/* Include sources */
if (!empty($source)) {
	include SOURCES . $source . ".php";
}

/* Include sources */
if (empty($template)) {
	header('HTTP/1.0 404 Not Found', true, 404);
	include("404.php");
	exit();
}
?>