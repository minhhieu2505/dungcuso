<?php  
	if(!defined('SOURCES')) die("Error");

	@$id = htmlspecialchars($_GET['id']);
	@$idl = htmlspecialchars($_GET['idl']);

	if($id!='')
	{
		/* Lấy sản phẩm detail */
		$rowDetail = $d->rawQueryOne("select type, id, namevi, slugvi, descvi, contentvi, code, view, id_list, photo, discount, sale_price, regular_price from #_product where id = ? and type = ? and find_in_set('hienthi',status) limit 0,1",array($id,$type));

		/* Lấy danh mục sản phẩm */
		$productList = $d->rawQueryOne("select namevi from #_product_list where id = ? and type = ? and find_in_set('hienthi',status) limit 0,1",array($rowDetail['id_list'],$type));


		/* Cập nhật lượt xem */
		$views = array();
		$views['view'] = $rowDetail['view'] + 1;
		$d->where('id',$rowDetail['id']);
		$d->update('product',$views);


		/* Lấy sản phẩm cùng loại */
		$where = "";
		$where = "id <> ? and id_list = ? and type = ? and find_in_set('hienthi',status)";
		$params = array($id,$rowDetail['id_list'],$type);
		$sql = "select photo, namevi, slugvi, sale_price, regular_price, discount, id from #_product where $where order by numb,id desc $limit";
		$product = $d->rawQuery($sql,$params);

		$breadCumb = array($titleMain,$productList['namevi'],$rowDetail['namevi']);
	} elseif ($idl!=''){
		/* Lấy tất cả sản phẩm */
		$productList = $d->rawQueryOne("select namevi from #_product_list where id = ? and type = ? and find_in_set('hienthi',status) limit 0,1",array($idl,$type));
		$titleCate = $productList['namevi'];
		$where = "";
		$where = "type = ? and id_list = ? and find_in_set('hienthi',status)";
		$params = array($type, $idl);
		$sql = "select photo, namevi, slugvi, sale_price, regular_price, discount, id from #_product where $where order by numb,id desc";
		$product = $d->rawQuery($sql,$params);
		$breadCumb = array($titleMain,$productList['namevi']);
	} else {
		$breadCumb = array($titleMain);
		/* Lấy tất cả sản phẩm */
		$where = "";
		$where = "type = ? and find_in_set('hienthi',status)";
		if($com == 'san-pham-moi'){
			$where .= " and find_in_set('hienthi',status)";
		}
		$params = array($type);
		$sql = "select photo, namevi, slugvi, sale_price, regular_price, discount, id from #_product where $where order by numb,id desc";
		$product = $d->rawQuery($sql,$params);
	}
?>