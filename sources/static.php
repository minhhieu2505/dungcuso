<?php  
	if(!defined('SOURCES')) die("Error");
	
	/* Lấy bài viết tĩnh */
	$breadCumb = array($titleMain);
	$static = $d->rawQueryOne("select id, type, namevi, contentvi, photo, date_created, date_updated, options from #_static where type = ? limit 0,1",array($type));
?>