<?php
	define('NN_CONTRACT', '25022001');
	$config = array(
		'database' => array(
			'server-name' => $_SERVER["SERVER_NAME"],
			'url' => '/shophouse/',
			'type' => 'mysql',
			'host' => 'localhost',
			'username' => 'root',
			'password' => '',
			'dbname' => 'doan_db',
			'port' => 3306,
			'prefix' => 'table_',
			'charset' => 'utf8mb4'
		),
		'login' => array(
			'admin' => 'LoginAdmin' . NN_CONTRACT,
			'member' => 'LoginMember' . NN_CONTRACT,
			'attempt' => 5,
			'delay' => 15
		),
		'website' => array(
	        'lang' => array(
	            'vi' => 'Tiếng Việt'
	        ),
	        'lang-doc' => 'vi',
	        'slug' => array(
	            'vi' => 'Tiếng Việt'
	        )
	    ),
	);

	error_reporting(1);
	/* Cấu hình base */
	$http = 'http://';
	$configUrl = $config['database']['server-name'] . $config['database']['url'];
	$configBase = $http . $configUrl;

	/* Token */
	define('TOKEN', md5(NN_CONTRACT . $config['database']['url']));

	/* Path */
	define('ROOT', str_replace(basename(__DIR__), '', __DIR__));
	define('ASSET', $http . $configUrl);
	define('ADMIN', 'admin');

	/* Cấu hình login */
	$loginAdmin = $config['login']['admin'];
	$loginMember = $config['login']['member'];

	// /* Cấu hình upload */
	// require_once LIBRARIES . "constant.php";
	// var_dump($loginAdmin);die('xxx');
?>