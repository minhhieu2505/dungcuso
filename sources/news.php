<?php  
	if(!defined('SOURCES')) die("Error");

	@$id = htmlspecialchars($_GET['id']);


	if($id!='')
	{
		/* Lấy bài viết detail */
		$rowDetail = $d->rawQueryOne("select id, namevi, slugvi, descvi, contentvi, photo, date_created from #_news where id = ? and type = ? and find_in_set('hienthi',status) limit 0,1",array($id,$type));
	}else
	{
		/* Lấy tất cả bài viết */
		$where = "";
		$where = "type = ? and find_in_set('hienthi',status)";
		$params = array($type);
		$sql = "select id, namevi, slugvi, photo, date_created, descvi from #_news where $where order by numb,id desc $limit";
		$news = $d->rawQuery($sql,$params);
	}
?>