<?php  
	if(!defined('SOURCES')) die("Error");

	@$id = htmlspecialchars($_GET['id']);
	@$idl = htmlspecialchars($_GET['idl']);

	if($id!='')
	{
		/* Lấy sản phẩm detail */
		$rowDetail = $d->rawQueryOne("select * from #_product where id = ? and find_in_set('hienthi',status) limit 0,1",array($id));
		/* Lấy danh mục sản phẩm */
		$productList = $d->rawQueryOne("select * from category where id = ? and find_in_set('hienthi',status) limit 0,1",array($rowDetail['id_category']));
		/* Cập nhật lượt xem */
		$views = array();
		$views['view'] = $rowDetail['view'] + 1;
		$d->where('id',$rowDetail['id']);
		$d->update('product',$views);
		/* Lấy sản phẩm cùng loại */
		$where = "";
		$where = "id <> ? and id_category = ? and find_in_set('hienthi',status)";
		$params = array($id,$rowDetail['id_category']);
		$sql = "select * from #_product where $where order by id desc $limit";
		$product = $d->rawQuery($sql,$params);

		$breadCumb = array($titleMain,$productList['name'],$rowDetail['name']);
	} elseif ($idl!=''){
		/* Lấy tất cả sản phẩm */
		$productList = $d->rawQueryOne("select name from category where id = ? and find_in_set('hienthi',status) limit 0,1",array($idl));
		$titleCate = $productList['name'];
		$where = "";
		$where = " id_category = ? and find_in_set('hienthi',status)";
		$params = array($idl);
		$sql = "select photo, name, slug, sale_price, regular_price, discount, id from #_product where $where order by id desc";
		$product = $d->rawQuery($sql,$params);
		$breadCumb = array($titleMain,$productList['name']);
	} else {
		$breadCumb = array($titleMain);
		/* Lấy tất cả sản phẩm */
		$where = "";
		$where = "id <> 0 and find_in_set('hienthi',status)";
		if($com == 'san-pham-ban-chay'){
			$where .= " and find_in_set('banchay',status)";
		}

		$curPage = $getPage;
		$perPage = 20;
		$startpoint = ($curPage * $perPage) - $perPage;
		$limit = " limit " . $startpoint . "," . $perPage;
		$sql = "select photo, name, slug, sale_price, regular_price, discount, id from #_product where $where order by date_created desc $limit";
		$product = $d->rawQuery($sql, $params);
		$sqlNum = "select count(*) as 'num' from #_product where $where order by date_created desc";
		$count = $d->rawQueryOne($sqlNum, $params);
		$total = (!empty($count)) ? $count['num'] : 0;
		$url = $func->getCurrentPageURL();
		$paging = $func->pagination($total, $perPage, $curPage, $url);
		
		$minPrice = $d->rawQueryOne("select sale_price from #_product where id<>0 order by sale_price asc");
		$maxPrice = $d->rawQueryOne("select sale_price from #_product where id<>0 order by sale_price desc");
	}
?>