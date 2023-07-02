<?php
define('LIBRARIES', './libraries/');
define('SOURCES', './sources/');
define('LAYOUT', 'layout/');
define('THUMBS', 'thumbs');
define('TEMPLATE', './templates/');

require_once LIBRARIES . "config.php";
require_once LIBRARIES . 'autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

	include_once LIBRARIES."PHPMailer/PHPMailer.php";
	include_once LIBRARIES."PHPMailer/SMTP.php";
	include_once LIBRARIES."PHPMailer/Exception.php";
new AutoLoad();
$d = new PDODb($config['database']);
$flash = new Flash();
$router = new AltoRouter();
$func = new Functions($d);
$cart = new Cart($d);
/* Router */
require_once LIBRARIES . "router.php";
include TEMPLATE . "index.php";

?>