<?php  
	if(!defined('SOURCES')) die("Error");

	@$id = htmlspecialchars($_GET['id']);
	@$idl = htmlspecialchars($_GET['idl']);
	@$idc = htmlspecialchars($_GET['idc']);
	@$idi = htmlspecialchars($_GET['idi']);
	@$ids = htmlspecialchars($_GET['ids']);
	@$idb = htmlspecialchars($_GET['idb']);

	if($id!='')
	{
		/* Lấy sản phẩm detail */
		$rowDetail = $d->rawQueryOne("select type, id, namevi, slugvi, slugen, descvi, contentvi, code, view, id_brand, id_list, id_cat, id_item, id_sub, photo, options, discount, sale_price, regular_price from #_product where id = ? and type = ? and find_in_set('hienthi',status) limit 0,1",array($id,$type));

		/* Lấy giá theo màu sắc */
		$rowPrice = $d->rawQuery("select id, id_color, id_product from #_pricebycolor where id_product = ?",array($rowDetail['id']));

		/* Cập nhật lượt xem */
		$views = array();
		$views['view'] = $rowDetail['view'] + 1;
		$d->where('id',$rowDetail['id']);
		$d->update('product',$views);

        /* Lấy tags */
		$productTags = $d->rawQuery("select id_tags from #_product_tags where id_parent = ?", array($rowDetail['id']));
		$productTags = (!empty($productTags)) ? $func->joinCols($productTags, 'id_tags') : array();

		if(!empty($productTags))
		{
			$rowTags = $d->rawQuery("select id, namevi, slugvi, slugen from #_tags where type='".$type."' and id in ($productTags) and find_in_set('hienthi',status) order by numb,id desc");
		}

		/* Lấy màu */
		$productColor = $d->rawQuery("select id_color from #_product_sale where id_parent = ?", array($rowDetail['id']));
		$productColor = (!empty($productColor)) ? $func->joinCols($productColor, 'id_color') : array();

		$idColor = $d->rawQuery("select id_color from #_pricebycolor where id_product order by id desc", array($id));

		/* Lấy size */
		$productSize = $d->rawQuery("select id_size from #_product_sale where id_parent = ?", array($rowDetail['id']));
		$productSize = (!empty($productSize)) ? $func->joinCols($productSize, 'id_size') : array();

		if(!empty($productSize))
		{
			$rowSize = $d->rawQuery("select id, namevi from #_size where type='".$type."' and id in ($productSize) and find_in_set('hienthi',status) order by numb,id desc");
		}

		/* Lấy cấp 1 */
		$productList = $d->rawQueryOne("select id, namevi, slugvi, slugen from #_product_list where id = ? and type = ? and find_in_set('hienthi',status) limit 0,1",array($rowDetail['id_list'],$type));

		/* Lấy cấp 2 */
		$productCat = $d->rawQueryOne("select id, namevi, slugvi, slugen from #_product_cat where id = ? and type = ? and find_in_set('hienthi',status) limit 0,1",array($rowDetail['id_cat'],$type));

		/* Lấy cấp 3 */
		$productItem = $d->rawQueryOne("select id, namevi, slugvi, slugen from #_product_item where id = ? and type = ? and find_in_set('hienthi',status) limit 0,1",array($rowDetail['id_item'],$type));

		/* Lấy cấp 4 */
		$productSub = $d->rawQueryOne("select id, namevi, slugvi, slugen from #_product_sub where id = ? and type = ? and find_in_set('hienthi',status) limit 0,1",array($rowDetail['id_sub'],$type));
		
		/* Lấy thương hiệu */
		$productBrand = $d->rawQueryOne("select namevi, slugvi, slugen, id from #_product_brand where id = ? and type = ? and find_in_set('hienthi',status)",array($rowDetail['id_brand'],$type));
		
		/* Lấy hình ảnh con */
		$rowDetailPhoto = $d->rawQuery("select photo from #_gallery where id_parent = ? and com='product' and type = ? and kind='man' and val = ? and find_in_set('hienthi',status) order by numb,id desc",array($rowDetail['id'],$type,$type));

		/* Lấy sản phẩm cùng loại */
		$where = "";
		$where = "id <> ? and id_list = ? and type = ? and find_in_set('hienthi',status)";
		$params = array($id,$rowDetail['id_list'],$type);

		$curPage = $getPage;
		$perPage = 8;
		$startpoint = ($curPage * $perPage) - $perPage;
		$limit = " limit ".$startpoint.",".$perPage;
		$sql = "select photo, namevi, slugvi, slugen, sale_price, regular_price, discount, id from #_product where $where order by numb,id desc $limit";
		$product = $d->rawQuery($sql,$params);
		$sqlNum = "select count(*) as 'num' from #_product where $where order by numb,id desc";
		$count = $d->rawQueryOne($sqlNum,$params);
		$total = (!empty($count)) ? $count['num'] : 0;
		$url = $func->getCurrentPageURL();
		$paging = $func->pagination($total,$perPage,$curPage,$url);

		/* Comment */
		$comment = new Comments($d, $func, $rowDetail['id'], $rowDetail['type']);

		/* SEO */
		$seoDB = $seo->getOnDB($rowDetail['id'],'product','man',$rowDetail['type']);
		$seo->set('h1',$rowDetail['name'.vi]);
		if(!empty($seoDB['title'.$seolang])) $seo->set('title',$seoDB['title'.$seolang]);
		else $seo->set('title',$rowDetail['name'.vi]);
		if(!empty($seoDB['keywords'.$seolang])) $seo->set('keywords',$seoDB['keywords'.$seolang]);
		if(!empty($seoDB['description'.$seolang])) $seo->set('description',$seoDB['description'.$seolang]);
		$seo->set('url',$func->getPageURL());
		$imgJson = (!empty($rowDetail['options'])) ? json_decode($rowDetail['options'],true) : null;
		if(empty($imgJson) || ($imgJson['p'] != $rowDetail['photo']))
		{
			$imgJson = $func->getImgSize($rowDetail['photo'],UPLOAD_PRODUCT_L.$rowDetail['photo']);
			$seo->updateSeoDB(json_encode($imgJson),'product',$rowDetail['id']);
		}
		if(!empty($imgJson))
		{
			$seo->set('photo',$configBase.THUMBS.'/'.$imgJson['w'].'x'.$imgJson['h'].'x2/'.UPLOAD_PRODUCT_L.$rowDetail['photo']);
			$seo->set('photo:width',$imgJson['w']);
			$seo->set('photo:height',$imgJson['h']);
			$seo->set('photo:type',$imgJson['m']);
		}

		/* breadCrumbs */
		if(!empty($titleMain)) $breadcr->set($com,$titleMain);
		if(!empty($productList)) $breadcr->set($productList[$sluglang],$productList['name'.vi]);
		if(!empty($productCat)) $breadcr->set($productCat[$sluglang],$productCat['name'.vi]);
		if(!empty($productItem)) $breadcr->set($productItem[$sluglang],$productItem['name'.vi]);
		if(!empty($productSub)) $breadcr->set($productSub[$sluglang],$productSub['name'.vi]);
		$breadcr->set($rowDetail[$sluglang],$rowDetail['name'.vi]);
		$breadcrumbs = $breadcr->get();
	}
	else if($idl!='')
	{
		/* Lấy cấp 1 detail */
		$productList = $d->rawQueryOne("select id, namevi, slugvi, slugen, type, photo, options from #_product_list where id = ? and type = ? limit 0,1",array($idl,$type));

		/* SEO */
		$titleCate = $productList['name'.vi];
		$seoDB = $seo->getOnDB($productList['id'],'product','man_list',$productList['type']);
		$seo->set('h1',$productList['name'.vi]);
		if(!empty($seoDB['title'.$seolang])) $seo->set('title',$seoDB['title'.$seolang]);
		else $seo->set('title',$productList['name'.vi]);
		if(!empty($seoDB['keywords'.$seolang])) $seo->set('keywords',$seoDB['keywords'.$seolang]);
		if(!empty($seoDB['description'.$seolang])) $seo->set('description',$seoDB['description'.$seolang]);
		$seo->set('url',$func->getPageURL());
		$imgJson = (!empty($productList['options'])) ? json_decode($productList['options'],true) : null;
		if(empty($imgJson) || ($imgJson['p'] != $productList['photo']))
		{
			$imgJson = $func->getImgSize($productList['photo'],UPLOAD_PRODUCT_L.$productList['photo']);
			$seo->updateSeoDB(json_encode($imgJson),'product_list',$productList['id']);
		}
		if(!empty($imgJson))
		{
			$seo->set('photo',$configBase.THUMBS.'/'.$imgJson['w'].'x'.$imgJson['h'].'x2/'.UPLOAD_PRODUCT_L.$productList['photo']);
			$seo->set('photo:width',$imgJson['w']);
			$seo->set('photo:height',$imgJson['h']);
			$seo->set('photo:type',$imgJson['m']);
		}

		/* Lấy sản phẩm */
		$where = "";
		$where = "id_list = ? and type = ? and find_in_set('hienthi',status)";
		$params = array($idl,$type);

		$curPage = $getPage;
		$perPage = 20;
		$startpoint = ($curPage * $perPage) - $perPage;
		$limit = " limit ".$startpoint.",".$perPage;
		$sql = "select photo, namevi, slugvi, slugen, sale_price, regular_price, discount, id from #_product where $where order by numb,id desc $limit";
		$product = $d->rawQuery($sql,$params);
		$sqlNum = "select count(*) as 'num' from #_product where $where order by numb,id desc";
		$count = $d->rawQueryOne($sqlNum,$params);
		$total = (!empty($count)) ? $count['num'] : 0;
		$url = $func->getCurrentPageURL();
		$paging = $func->pagination($total,$perPage,$curPage,$url);

		/* breadCrumbs */
		if(!empty($titleMain)) $breadcr->set($com,$titleMain);
		if(!empty($productList)) $breadcr->set($productList[$sluglang],$productList['name'.vi]);
		$breadcrumbs = $breadcr->get();	
	}
	else if($idc!='')
	{
		/* Lấy cấp 2 detail */
		$productCat = $d->rawQueryOne("select id, id_list, namevi, slugvi, slugen, type, photo, options from #_product_cat where id = ? and type = ? limit 0,1",array($idc,$type));

		/* Lấy cấp 1 */
		$productList = $d->rawQueryOne("select id, namevi, slugvi, slugen from #_product_list where id = ? and type = ? limit 0,1",array($productCat['id_list'],$type));

		/* Lấy sản phẩm */
		$where = "";
		$where = "id_cat = ? and type = ? and find_in_set('hienthi',status)";
		$params = array($idc,$type);

		$curPage = $getPage;
		$perPage = 20;
		$startpoint = ($curPage * $perPage) - $perPage;
		$limit = " limit ".$startpoint.",".$perPage;
		$sql = "select photo, namevi, slugvi, slugen, sale_price, regular_price, discount, id from #_product where $where order by numb,id desc $limit";
		$product = $d->rawQuery($sql,$params);
		$sqlNum = "select count(*) as 'num' from #_product where $where order by numb,id desc";
		$count = $d->rawQueryOne($sqlNum,$params);
		$total = (!empty($count)) ? $count['num'] : 0;
		$url = $func->getCurrentPageURL();
		$paging = $func->pagination($total,$perPage,$curPage,$url);

		/* SEO */
		$titleCate = $productCat['name'.vi];
		$seoDB = $seo->getOnDB($productCat['id'],'product','man_cat',$productCat['type']);
		$seo->set('h1',$productCat['name'.vi]);
		if(!empty($seoDB['title'.$seolang])) $seo->set('title',$seoDB['title'.$seolang]);
		else $seo->set('title',$productCat['name'.vi]);
		if(!empty($seoDB['keywords'.$seolang])) $seo->set('keywords',$seoDB['keywords'.$seolang]);
		if(!empty($seoDB['description'.$seolang])) $seo->set('description',$seoDB['description'.$seolang]);
		$seo->set('url',$func->getPageURL());
		$imgJson = (!empty($productCat['options'])) ? json_decode($productCat['options'],true) : null;
		if(empty($imgJson) || ($imgJson['p'] != $productCat['photo']))
		{
			$imgJson = $func->getImgSize($productCat['photo'],UPLOAD_PRODUCT_L.$productCat['photo']);
			$seo->updateSeoDB(json_encode($imgJson),'product_cat',$productCat['id']);
		}
		if(!empty($imgJson))
		{
			$seo->set('photo',$configBase.THUMBS.'/'.$imgJson['w'].'x'.$imgJson['h'].'x2/'.UPLOAD_PRODUCT_L.$productCat['photo']);
			$seo->set('photo:width',$imgJson['w']);
			$seo->set('photo:height',$imgJson['h']);
			$seo->set('photo:type',$imgJson['m']);
		}

		/* breadCrumbs */
		if(!empty($titleMain)) $breadcr->set($com,$titleMain);
		if(!empty($productList)) $breadcr->set($productList[$sluglang],$productList['name'.vi]);
		if(!empty($productCat)) $breadcr->set($productCat[$sluglang],$productCat['name'.vi]);
		$breadcrumbs = $breadcr->get();
	}
	else if($idi!='')
	{
		/* Lấy cấp 3 detail */
		$productItem = $d->rawQueryOne("select id, id_list, id_cat, namevi, slugvi, slugen, type, photo, options from #_product_item where id = ? and type = ? limit 0,1",array($idi,$type));

		/* Lấy cấp 1 */
		$productList = $d->rawQueryOne("select id, namevi, slugvi, slugen from #_product_list where id = ? and type = ? limit 0,1",array($productItem['id_list'],$type));

		/* Lấy cấp 2 */
		$productCat = $d->rawQueryOne("select id, namevi, slugvi, slugen from #_product_cat where id_list = ? and id = ? and type = ? limit 0,1",array($productItem['id_list'],$productItem['id_cat'],$type));

		/* Lấy sản phẩm */
		$where = "";
		$where = "id_item = ? and type = ? and find_in_set('hienthi',status)";
		$params = array($idi,$type);

		$curPage = $getPage;
		$perPage = 20;
		$startpoint = ($curPage * $perPage) - $perPage;
		$limit = " limit ".$startpoint.",".$perPage;
		$sql = "select photo, namevi, slugvi, slugen, sale_price, regular_price, discount, id from #_product where $where order by numb,id desc $limit";
		$product = $d->rawQuery($sql,$params);
		$sqlNum = "select count(*) as 'num' from #_product where $where order by numb,id desc";
		$count = $d->rawQueryOne($sqlNum,$params);
		$total = (!empty($count)) ? $count['num'] : 0;
		$url = $func->getCurrentPageURL();
		$paging = $func->pagination($total,$perPage,$curPage,$url);

		/* SEO */
		$titleCate = $productItem['name'.vi];
		$seoDB = $seo->getOnDB($productItem['id'],'product','man_item',$productItem['type']);
		$seo->set('h1',$productItem['name'.vi]);
		if(!empty($seoDB['title'.$seolang])) $seo->set('title',$seoDB['title'.$seolang]);
		else $seo->set('title',$productItem['name'.vi]);
		if(!empty($seoDB['keywords'.$seolang])) $seo->set('keywords',$seoDB['keywords'.$seolang]);
		if(!empty($seoDB['description'.$seolang])) $seo->set('description',$seoDB['description'.$seolang]);
		$seo->set('url',$func->getPageURL());
		$imgJson = (!empty($productItem['options'])) ? json_decode($productItem['options'],true) : null;
		if(empty($imgJson) || ($imgJson['p'] != $productItem['photo']))
		{
			$imgJson = $func->getImgSize($productItem['photo'],UPLOAD_PRODUCT_L.$productItem['photo']);
			$seo->updateSeoDB(json_encode($imgJson),'product_item',$productItem['id']);
		}
		if(!empty($imgJson))
		{
			$seo->set('photo',$configBase.THUMBS.'/'.$imgJson['w'].'x'.$imgJson['h'].'x2/'.UPLOAD_PRODUCT_L.$productItem['photo']);
			$seo->set('photo:width',$imgJson['w']);
			$seo->set('photo:height',$imgJson['h']);
			$seo->set('photo:type',$imgJson['m']);
		}

		/* breadCrumbs */
		if(!empty($titleMain)) $breadcr->set($com,$titleMain);
		if(!empty($productList)) $breadcr->set($productList[$sluglang],$productList['name'.vi]);
		if(!empty($productCat)) $breadcr->set($productCat[$sluglang],$productCat['name'.vi]);
		if(!empty($productItem)) $breadcr->set($productItem[$sluglang],$productItem['name'.vi]);
		$breadcrumbs = $breadcr->get();
	}
	else if($ids!='')
	{
		/* Lấy cấp 4 */
		$productSub = $d->rawQueryOne("select id, id_list, id_cat, id_item, namevi, slugvi, slugen, type, photo, options from #_product_sub where id = ? and type = ? limit 0,1",array($ids,$type));

		/* Lấy cấp 1 */
		$productList = $d->rawQueryOne("select id, namevi, slugvi, slugen from #_product_list where id = ? and type = ? limit 0,1",array($productSub['id_list'],$type));

		/* Lấy cấp 2 */
		$productCat = $d->rawQueryOne("select id, namevi, slugvi, slugen from #_product_cat where id_list = ? and id = ? and type = ? limit 0,1",array($productSub['id_list'],$productSub['id_cat'],$type));

		/* Lấy cấp 3 */
		$productItem = $d->rawQueryOne("select id, namevi, slugvi, slugen from #_product_item where id_list = ? and id_cat = ? and id = ? and type = ? limit 0,1",array($productSub['id_list'],$productSub['id_cat'],$productSub['id_item'],$type));

		/* Lấy sản phẩm */
		$where = "";
		$where = "id_sub = ? and type = ? and find_in_set('hienthi',status)";
		$params = array($ids,$type);

		$curPage = $getPage;
		$perPage = 20;
		$startpoint = ($curPage * $perPage) - $perPage;
		$limit = " limit ".$startpoint.",".$perPage;
		$sql = "select photo, namevi, slugvi, slugen, sale_price, regular_price, discount, id from #_product where $where order by numb,id desc $limit";
		$product = $d->rawQuery($sql,$params);
		$sqlNum = "select count(*) as 'num' from #_product where $where order by numb,id desc";
		$count = $d->rawQueryOne($sqlNum,$params);
		$total = (!empty($count)) ? $count['num'] : 0;
		$url = $func->getCurrentPageURL();
		$paging = $func->pagination($total,$perPage,$curPage,$url);

		/* SEO */
		$titleCate = $productSub['name'.vi];
		$seoDB = $seo->getOnDB($productSub['id'],'product','man_sub',$productSub['type']);
		$seo->set('h1',$productSub['name'.vi]);
		if(!empty($seoDB['title'.$seolang])) $seo->set('title',$seoDB['title'.$seolang]);
		else $seo->set('title',$productSub['name'.vi]);
		if(!empty($seoDB['keywords'.$seolang])) $seo->set('keywords',$seoDB['keywords'.$seolang]);
		if(!empty($seoDB['description'.$seolang])) $seo->set('description',$seoDB['description'.$seolang]);
		$seo->set('url',$func->getPageURL());
		$imgJson = (!empty($productSub['options'])) ? json_decode($productSub['options'],true) : null;
		if(empty($imgJson) || ($imgJson['p'] != $productSub['photo']))
		{
			$imgJson = $func->getImgSize($productSub['photo'],UPLOAD_PRODUCT_L.$productSub['photo']);
			$seo->updateSeoDB(json_encode($imgJson),'product_sub',$productSub['id']);
		}
		if(!empty($imgJson))
		{
			$seo->set('photo',$configBase.THUMBS.'/'.$imgJson['w'].'x'.$imgJson['h'].'x2/'.UPLOAD_PRODUCT_L.$productSub['photo']);
			$seo->set('photo:width',$imgJson['w']);
			$seo->set('photo:height',$imgJson['h']);
			$seo->set('photo:type',$imgJson['m']);
		}

		/* breadCrumbs */
		if(!empty($titleMain)) $breadcr->set($com,$titleMain);
		if(!empty($productList)) $breadcr->set($productList[$sluglang],$productList['name'.vi]);
		if(!empty($productCat)) $breadcr->set($productCat[$sluglang],$productCat['name'.vi]);
		if(!empty($productItem)) $breadcr->set($productItem[$sluglang],$productItem['name'.vi]);
		if(!empty($productSub)) $breadcr->set($productSub[$sluglang],$productSub['name'.vi]);
		$breadcrumbs = $breadcr->get();
	}
	else if($idb!='')
	{
		/* Lấy brand detail */
		$productBrand = $d->rawQueryOne("select namevi, slugvi, slugen, id, type, photo, options from #_product_brand where id = ? and type = ? limit 0,1",array($idb,$type));

		/* SEO */
		$titleCate = $productBrand['name'.vi];
		$seoDB = $seo->getOnDB($productBrand['id'],'product','man_brand',$productBrand['type']);
		$seo->set('h1',$productBrand['name'.vi]);
		if(!empty($seoDB['title'.$seolang])) $seo->set('title',$seoDB['title'.$seolang]);
		else $seo->set('title',$productBrand['name'.vi]);
		if(!empty($seoDB['keywords'.$seolang])) $seo->set('keywords',$seoDB['keywords'.$seolang]);
		if(!empty($seoDB['description'.$seolang])) $seo->set('description',$seoDB['description'.$seolang]);
		$seo->set('url',$func->getPageURL());
		$imgJson = (!empty($productBrand['options'])) ? json_decode($productBrand['options'],true) : null;
		if(empty($imgJson) || ($imgJson['p'] != $productBrand['photo']))
		{
			$imgJson = $func->getImgSize($productBrand['photo'],UPLOAD_PRODUCT_L.$productBrand['photo']);
			$seo->updateSeoDB(json_encode($imgJson),'product_brand',$productBrand['id']);
		}
		if(!empty($imgJson))
		{
			$seo->set('photo',$configBase.THUMBS.'/'.$imgJson['w'].'x'.$imgJson['h'].'x2/'.UPLOAD_PRODUCT_L.$productBrand['photo']);
			$seo->set('photo:width',$imgJson['w']);
			$seo->set('photo:height',$imgJson['h']);
			$seo->set('photo:type',$imgJson['m']);
		}

		/* Lấy sản phẩm */
		$where = "";
		$where = "id_brand = ? and type = ? and find_in_set('hienthi',status)";
		$params = array($productBrand['id'],$type);

		$curPage = $getPage;
		$perPage = 20;
		$startpoint = ($curPage * $perPage) - $perPage;
		$limit = " limit ".$startpoint.",".$perPage;
		$sql = "select photo, namevi, slugvi, slugen, sale_price, regular_price, discount, id from #_product where $where order by numb,id desc $limit";
		$product = $d->rawQuery($sql,$params);
		$sqlNum = "select count(*) as 'num' from #_product where $where order by numb,id desc";
		$count = $d->rawQueryOne($sqlNum,$params);
		$total = (!empty($count)) ? $count['num'] : 0;
		$url = $func->getCurrentPageURL();
		$paging = $func->pagination($total,$perPage,$curPage,$url);

		/* breadCrumbs */
		$breadcr->set($productBrand[$sluglang],$titleCate);
		$breadcrumbs = $breadcr->get();
	}
	else
	{
		/* Lấy tất cả sản phẩm */
		$where = "";
		$where = "type = ? and find_in_set('hienthi',status)";
		$params = array($type);

		$curPage = $getPage;
		$perPage = 20;
		$startpoint = ($curPage * $perPage) - $perPage;
		$limit = " limit ".$startpoint.",".$perPage;
		$sql = "select photo, namevi, slugvi, slugen, sale_price, regular_price, discount, id from #_product where $where order by numb,id desc $limit";
		$product = $d->rawQuery($sql,$params);
		$sqlNum = "select count(*) as 'num' from #_product where $where order by numb,id desc";
		$count = $d->rawQueryOne($sqlNum,$params);
		$total = (!empty($count)) ? $count['num'] : 0;
		$url = $func->getCurrentPageURL();
		$paging = $func->pagination($total,$perPage,$curPage,$url);

		/* breadCrumbs */
		if(!empty($titleMain)) $breadcr->set($com,$titleMain);
		$breadcrumbs = $breadcr->get();
	}
?>