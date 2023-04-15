<?php  
	if(!defined('SOURCES')) die("Error");

	@$id = htmlspecialchars($_GET['id']);


	if($id!='')
	{
		/* Lấy bài viết detail */
		$rowDetail = $d->rawQueryOne("select id, name, slug, description, content, photo, date_created from #_news where id = ? and type = ? and find_in_set('hienthi',status) limit 0,1",array($id,$type));
		$breadCumb = array($titleMain,$rowDetail['name']);
	}else
	{
		$breadCumb = array($titleMain);
		/* Lấy tất cả bài viết */
		$where = "";
		$where = "type = ? and find_in_set('hienthi',status)";
		$params = array($type);
		$sql = "select id, name, slug, photo, date_created, description from #_news where $where order by id desc $limit";
		$news = $d->rawQuery($sql,$params);
	}
?>