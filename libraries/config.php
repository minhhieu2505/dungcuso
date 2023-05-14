<?php
	$config = array(
		'database' => array(
			'server-name' => $_SERVER["SERVER_NAME"].":8081",
			'url' => '/dungcuso/',
			'type' => 'mysql',
			'host' => 'localhost',
			'username' => 'root',
			'password' => '',
			'dbname' => 'db_dungcuso',
			'port' => 3306,
			'prefix' => '',
			'charset' => 'utf8mb4'
		)
	);

	error_reporting(1);
	/* Cấu hình base */
	$http = 'http://';
	$configUrl = $config['database']['server-name'] . $config['database']['url'];
	$configBase = $http . $configUrl;

	// /* Token */
	// define('TOKEN', md5(NN_CONTRACT . $config['database']['url']));

	/* Path */
	define('ROOT', str_replace(basename(__DIR__), '', __DIR__));
	define('ASSET', $http . $configUrl);
	define('ADMIN', 'admin');

	// /* Cấu hình login */
	$loginAdmin = 'LoginAdmin25052001';
	$loginMember = 'LoginMember25052001';

	// // /* Cấu hình upload */
	// // require_once LIBRARIES . "constant.php";
	// // var_dump($loginAdmin);die('xxx');
?>