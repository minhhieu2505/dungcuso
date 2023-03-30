<?php  
	if(!defined('SOURCES')) die("Error");

	@$id = htmlspecialchars($_GET['id']);
	@$idl = htmlspecialchars($_GET['idl']);
	@$idc = htmlspecialchars($_GET['idc']);

	if($id!='')
	{
		/* Lấy sản phẩm detail */
		$rowDetail = $d->rawQueryOne("select type, id, namevi, slugvi, slugen, descvi, contentvi, code, view, id_brand, id_list, id_cat, id_item, id_sub, photo, options, discount, sale_price, regular_price from #_product where id = ? and type = ? and find_in_set('hienthi',status) limit 0,1",array($id,$type));

		/* Cập nhật lượt xem */
		$views = array();
		$views['view'] = $rowDetail['view'] + 1;
		$d->where('id',$rowDetail['id']);
		$d->update('product',$views);

		/* Lấy cấp 1 */
		$productList = $d->rawQueryOne("select id, namevi, slugvi, slugen from #_product_list where id = ? and type = ? and find_in_set('hienthi',status) limit 0,1",array($rowDetail['id_list'],$type));

		/* Lấy cấp 2 */
		$productCat = $d->rawQueryOne("select id, namevi, slugvi, slugen from #_product_cat where id = ? and type = ? and find_in_set('hienthi',status) limit 0,1",array($rowDetail['id_cat'],$type));

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
		// $comment = new Comments($d, $func, $rowDetail['id'], $rowDetail['type']);

	}
	else if($idl!='')
	{
		/* Lấy cấp 1 detail */
		$productList = $d->rawQueryOne("select id, namevi, slugvi, slugen, type, photo, options from #_product_list where id = ? and type = ? limit 0,1",array($idl,$type));

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
	}
?>