<?php
	include "config.php";

	$result = 0;
	$id = (!empty($_GET['id'])) ? htmlspecialchars($_GET['id']) : 0;
    $d->rawQuery("delete from gallery where id = ?", array($id));
?>