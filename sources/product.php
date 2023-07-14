<?php
if (!defined('SOURCES'))
	die("Error");

@$id = htmlspecialchars($_GET['id']);
@$idl = htmlspecialchars($_GET['idl']);
if ($id != '') {
	
	/* Lấy sản phẩm detail */
	$rowDetail = $d->rawQueryOne("select * from product where id = ? and find_in_set('hienthi',status) limit 0,1", array($id));
	/* Lấy danh mục sản phẩm */
	$productList = $d->rawQueryOne("select * from category where id = ? and find_in_set('hienthi',status) limit 0,1", array($rowDetail['id_category']));
	/* Cập nhật lượt xem */
	$views = array();
	$views['view'] = $rowDetail['view'] + 1;
	$d->where('id', $rowDetail['id']);
	$d->update('product', $views);
	/* Lấy sản phẩm cùng loại */
	$where = "";
	$where = "id <> ? and id_category = ? and find_in_set('hienthi',status)";
	$params = array($id, $rowDetail['id_category']);
	$sql = "select * from product where $where order by id desc $limit";
	$product = $d->rawQuery($sql, $params);

	/* Comment */
	$namemember = (!empty($_POST['name_member']) ? $_POST['name_member'] : ""); 
	$contentmember = (!empty($_POST['question_member']) ? $_POST['question_member'] : ""); 
	$id_pro = (!empty($_POST['id_pro_question']) ? $_POST['id_pro_question'] : ""); 
	$sumbit_question_member = (!empty($_POST['sumbit_question_member']) ? $_POST['sumbit_question_member'] : ""); 
	$comment_product = (!empty($_POST['comment_product']) ? $_POST['comment_product'] : ""); 
	$dquestion = array();
	if ($sumbit_question_member != "") {
		$dquestion['id_product'] = $rowDetail['id'];
		$dquestion['name'] = $namemember;
		$dquestion['content'] = $contentmember;
		$dquestion['type'] = 1;
		$dquestion['date_created'] = time();
		if($d->insert('comment',$dquestion))
		{
			$func->transfer("Cám ơn bạn đã phản hồi", $configBase.$rowDetail['slug']);
		} else {
			$func->transfer("Hệ thống đang gặp lỗi.", $configBase.$rowDetail['slug']);
		}
	}
	$commnent_product = (!empty($_POST['comment']) ? $_POST['comment'] : ""); 
	$dcomment = array();
	
	if ($_POST['comment_product'] != "") {
		if ($_SESSION[$loginMember]['active'] == true) {
			$contentcomment = (!empty($_POST['comment_product']) ? $_POST['comment_product'] : ""); 
			$dcomment['id_product'] = $rowDetail['id'];
			$dcomment['name'] = $_SESSION[$loginMember]['fullname'];
			$dcomment['id_user'] = $_SESSION[$loginMember]['id'];
			$dcomment['email'] = $_SESSION[$loginMember]['email'];
			$dcomment['content'] = $contentcomment;
			$dcomment['type'] = 2;
			$dcomment['date_created'] = time();
			if($d->insert('comment',$dcomment))
			{
				$func->transfer("Cám ơn bạn đã phản hồi", $configBase.$rowDetail['slug']);
			} else {
				$func->transfer("Hệ thống đang gặp lỗi.", $configBase.$rowDetail['slug']);
			}
		} else {
			$func->transfer("Bạn vui lòng đăng nhập", $configBase."account/dang-nhap", false);
		}
	}
	$question_member = $d->rawQuery("select * from comment where type = '1' and id_product = '".$rowDetail['id']."'");
	$comment_member = $d->rawQuery("select * from comment where type = '2' and id_product = '".$rowDetail['id']."'");
	$breadCumb = array($titleMain, $productList['name'], $rowDetail['name']);
	$func->daxem($rowDetail['id']);
	$prodaxem = array_column($_SESSION['daxem'], 'productid');
    if ($prodaxem) {
        $sqlprodaxem = $d->rawQuery("select * from product where id in(".implode(',',$prodaxem).") and find_in_set('hienthi',status)");
    }

	/* Gallery */
	$gallery = $d->rawQuery("select * from gallery where id_product = '".$rowDetail['id']."'");
} elseif ($idl != '') {
	/* Lấy tất cả sản phẩm */
	$productList = $d->rawQueryOne("select name from category where id = ? and find_in_set('hienthi',status) limit 0,1", array($idl));
	$titleCate = $productList['name'];
	$where = "";
	$where = " id_category = ? and find_in_set('hienthi',status)";
	$params = array($idl);
	$sql = "select photo, name, slug, sale_price, regular_price, discount, id from product where $where order by id desc";
	$product = $d->rawQuery($sql, $params);
	$breadCumb = array($titleMain, $productList['name']);
} else {
	$breadCumb = array($titleMain);
	/* Lấy tất cả sản phẩm */
	$where = "";
	$order = "";
	$where = "id <> 0 and find_in_set('hienthi',status)";
	if ($com == 'san-pham-ban-chay') {
		$where .= " and find_in_set('banchay',status)";
	}
	$id_category = (!empty($_GET['id_category'])) ? htmlspecialchars($_GET['id_category']) : "";
	$id_sort = (!empty($_GET['id_sort'])) ? htmlspecialchars($_GET['id_sort']) : 0;
	$from = (!empty($_GET['from'])) ? htmlspecialchars($_GET['from']) : 0;
	$to = (!empty($_GET['to'])) ? htmlspecialchars($_GET['to']) : 0;
	$p = (!empty($_GET['p'])) ? htmlspecialchars($_GET['p']) : 1;
	if (!empty($id_category)) {
		$where .= " and find_in_set(id_category,'$id_category')";
	}
	if (!empty($to)) {
		$where .= " and sale_price >=" . $from . " and sale_price <= " . $to;
	}

	if ($id_sort == 2) {
		$order .= " order by sale_price desc";
	} elseif ($id_sort == 1) {
		$order .= " order by sale_price asc";
	} else {
		$order .= " order by id desc";
	}
	$curPage = $p;

	$curPage = $getPage;
	$perPage = 20;
	$startpoint = ($curPage * $perPage) - $perPage;
	$limit = " limit " . $startpoint . "," . $perPage;
	$sql = "select photo, name, slug, sale_price, regular_price, discount, id from product where $where $order $limit";
	$product = $d->rawQuery($sql, $params);
	$sqlNum = "select count(*) as 'num' from product where $where order by date_created desc";
	$count = $d->rawQueryOne($sqlNum, $params);
	$total = (!empty($count)) ? $count['num'] : 0;
	$url = $func->getCurrentPageURL();
	$paging = $func->pagination($total, $perPage, $curPage, $url);

	if ($from > 0) {
		$minPrice['sale_price'] = $from;
	} else {
		$minPrice = $d->rawQueryOne("select sale_price from product where id<>0 order by sale_price asc");
	}
	if($to > 0){
		$maxPrice['sale_price'] = $to;
	}else {
		$maxPrice = $d->rawQueryOne("select sale_price from product where id<>0 order by sale_price desc");
	}
	$cate_act = trim(json_encode($id_category),'"');
	$cate_act = explode(',',$cate_act);
}
?>