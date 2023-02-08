<?php
	if(!defined('SOURCES')) die("Error");

	/* Kiểm tra active coupon */
	if(!$config['coupon']) $func->transfer("Trang không tồn tại", "index.php", false);

	switch($act)
	{
		case "man":
			get_items();
			$template = "coupon/man/items";
			break;

		case "add":
			$template = "coupon/man/item_add";
			break;

		case "edit":
			get_item();
			$template = "coupon/man/item_add";
			break;

		case "save":
			save_item();
			break;

		case "delete":
			delete_item();
			break;
			
		default:
			$template = "404";
	}

	/* Get coupon */
	function get_items()
	{
		global $d, $func, $curPage, $items, $paging;

		$where = "";

		if(isset($_REQUEST['keyword']))
		{
			$keyword = htmlspecialchars($_REQUEST['keyword']);
			$where .= " and ma = '$keyword'";
		}

		$per_page = 10;
		$startpoint = ($curPage * $per_page) - $per_page;
		$limit = " limit ".$startpoint.",".$per_page;
		$sql = "select * from #_coupon where id > 0 $where order by stt,id desc $limit";
		$items = $d->rawQuery($sql);
		$sqlNum = "select count(*) as 'num' from #_coupon where id<>0 $where order by stt,id desc";
		$count = $d->rawQueryOne($sqlNum);
		$total = $count['num'];
		$url = "index.php?com=coupon&act=man";
		$paging = $func->pagination($total,$per_page,$curPage,$url);
	}

	/* Edit coupon */
	function get_item()
	{
		global $d, $func, $curPage, $item;
		
		$id = htmlspecialchars($_GET['id']);

		if(!$id) $func->transfer("Không nhận được dữ liệu", "index.php?com=coupon&act=man&p=".$curPage, false);

		$item = $d->rawQueryOne("select * from #_coupon where id = ? limit 0,1",array($id));

		if(!$item['id']) $func->transfer("Dữ liệu không có thực", "index.php?com=coupon&act=man&p=".$curPage, false);
	}

	/* Save coupon */
	function save_item()
	{
		global $d, $func, $curPage;
		
		if(empty($_POST)) $func->transfer("Không nhận được dữ liệu", "index.php?com=coupon&act=man&p=".$curPage, false);

		$id = (isset($_POST['id'])) ? htmlspecialchars($_POST['id']) : 0;
		
		/* Post dữ liệu */
		$data = isset($_POST['data']) ? $_POST['data'] : null;
		foreach($data as $column => $value) {
			$data[$column] = htmlspecialchars($value);
			$data['chietkhau'] = (isset($data['chietkhau']) && $data['chietkhau'] != '') ? str_replace(",","",$data['chietkhau']) : 0;
			$data['max_value'] = (isset($data['max_value']) && $data['max_value'] != '') ? str_replace(",","",$data['max_value']) : 0;
			$data['min_value'] = (isset($data['min_value']) && $data['min_value'] != '') ? str_replace(",","",$data['min_value']) : 0;
			$data['m_value'] = (isset($data['m_value']) && $data['m_value'] != '') ? str_replace(",","",$data['m_value']) : 0;
			$data['num'] = (isset($data['num']) && $data['num'] != '') ? str_replace(",","",$data['num']) : 0;
		}
		$data['ngaybatdau'] = strtotime(str_replace("/","-",htmlspecialchars($data['ngaybatdau'])));
		$data['ngayketthuc'] = strtotime(str_replace("/","-",htmlspecialchars($data['ngayketthuc'])));
		//$func->dump($id);die('xx');
		if($id)
		{
			$d->where('id', $id);
			if($d->update('coupon',$data)) $func->transfer("Cập nhật dữ liệu thành công", "index.php?com=coupon&act=man&p=".$curPage);
			else $func->transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=coupon&act=man&p=".$curPage, false);
		}
		else
		{			
			$quanitycode = (isset($_POST['number'])) ? htmlspecialchars($_POST['number']) : 0;

			if($quanitycode)
			{
				for($i=0;$i<$quanitycode;$i++)
				{
					$data['ma'] = htmlspecialchars($_POST['ma'.$i]);
					$data['stt'] = $i+1;
					$data['tinhtrang'] = 0;		
					$d->insert('coupon',$data);								
				}

				$func->transfer("Lưu dữ liệu thành công", "index.php?com=coupon&act=man&p=".$curPage);
			}
			else
			{
				$func->transfer("Dữ liệu rỗng", "index.php?com=coupon&act=man&p=".$curPage, false);
			}
		}
	}

	/* Delete coupon */
	function delete_item()
	{
		global $d, $func, $curPage;
		
		$id = (isset($_GET['id'])) ? htmlspecialchars($_GET['id']) : 0;

		if($id)
		{
			$row = $d->rawQueryOne("select id from #_coupon where id = ? limit 0,1",array($id));

			if($row['id'])
			{
				$d->rawQuery("delete from #_coupon where id = ?",array($id));
				$func->transfer("Xóa dữ liệu thành công", "index.php?com=coupon&act=man&p=".$curPage);
			}
			else $func->transfer("Xóa dữ liệu bị lỗi", "index.php?com=coupon&act=man&p=".$curPage, false);
		}
		elseif(isset($_GET['listid']))
		{
			$listid = explode(",",$_GET['listid']);
			
			for($i=0;$i<count($listid);$i++)
			{
				$id = htmlspecialchars($listid[$i]);
				$row = $d->rawQueryOne("select id from #_coupon where id = ? limit 0,1",array($id));

				if($row['id']) $d->rawQuery("delete from #_coupon where id = ?",array($id));
			}
			
			$func->transfer("Xóa dữ liệu thành công", "index.php?com=coupon&act=man&p=".$curPage);
		}
		else $func->transfer("Không nhận được dữ liệu", "index.php?com=coupon&act=man&p=".$curPage, false);
	}
?>