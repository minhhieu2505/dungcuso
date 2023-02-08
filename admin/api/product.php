<?php 
	include "config.php";
	$id = (!empty($_POST['id'])) ? htmlspecialchars($_POST['id']) : 0;
	$d->rawQuery("delete from #_pricebycolor where id = ?",array($id));
 ?>