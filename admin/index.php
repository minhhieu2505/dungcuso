<?php
	session_start();
	define('LIBRARIES','../libraries/');
	define('SOURCES','./sources/');
	define('TEMPLATE','./templates/');
	define('LAYOUT','layout/');
	require_once LIBRARIES."config.php";
    require_once LIBRARIES.'autoload.php';
    new AutoLoad();
    $d = new PDODb($config['database']);
    $flash = new Flash();
	$cache = new Cache($d);
    $func = new Functions($d, $cache);
	
	/* Config type */
	require_once LIBRARIES."config-type.php";
	
	/* Setting */
	$setting = $d->rawQueryOne("select * from #_setting limit 0,1");
	$optsetting = (isset($setting['options']) && $setting['options'] != '') ? json_decode($setting['options'],true) : null;
	
	/* Requick */
	require_once LIBRARIES."requick.php";
	
?>
<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="assets/images/favicon.png" rel="shortcut icon" type="image/x-icon" />
	<title>Administrator</title>
	<!-- Css all -->
	<?php include TEMPLATE.LAYOUT."css.php"; ?>
	<script src="assets/js/jquery.min.js"></script>
</head>
<body class="sidebar-mini hold-transition text-sm <?=(!isset($_SESSION[$loginAdmin]['active']) || $_SESSION[$loginAdmin]['active']==false)?'login-page':''?>">
    <!-- Wrapper -->
	<?php if(isset($_SESSION[$loginAdmin]['active']) && ($_SESSION[$loginAdmin]['active'] == true)) { ?>
		<div class="wrapper">
			<?php
				include TEMPLATE.LAYOUT."header.php";
				include TEMPLATE.LAYOUT."menu.php";
				?>
			<div class="content-wrapper">
				<?php include TEMPLATE.$template."_tpl.php"; ?>
			</div>
			<?php include TEMPLATE.LAYOUT."footer.php"; ?>
		</div>
	<?php } else { include TEMPLATE."user/login_tpl.php" ; } ?>

	<!-- Js all -->
	<?php include TEMPLATE.LAYOUT."js.php"; ?>
</body>
</html>