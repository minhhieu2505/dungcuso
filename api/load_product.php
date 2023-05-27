<?php  
	include "config.php";

	$tukhoa = (isset($_POST['term']) && $_POST['term'] != '') ? htmlspecialchars($_POST['term']) : '';
	$keywords = str_replace(' ','%',$tukhoa);
	$tukhoa=$func->changeTitle($keywords);

	$pro = $d->rawQuery("select  photo, name, slug, sale_price, regular_price, discount, id from #_product where id <> 0 and (name LIKE ? or slug LIKE ?) and find_in_set('hienthi',status) order by id desc limit 30",array("%$tukhoa%","%$tukhoa%"));

	$result = array();
	foreach ($pro as $key => $value) {
		$result[$key]['name'] = $value['name'];
		$result[$key]['slug'] = $value['slug'];
		$result[$key]['photo'] = "upload/product/".$value['photo'];
		$result[$key]['price'] = $func->formatMoney($value['sale_price']);
	}

	echo json_encode($result);
?>