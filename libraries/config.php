<?php
	$config = array(
		'database' => array(
			'server-name' => $_SERVER["SERVER_NAME"],
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

	/* Path */
	define('ROOT', str_replace(basename(__DIR__), '', __DIR__));
	define('ASSET', $http . $configUrl);
	define('ADMIN', 'admin');

	// /* Cấu hình login */
	$loginAdmin = 'LoginAdmin25052001';
	$loginMember = 'LoginMember25052001';
?>
