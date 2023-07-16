<?php
	if(!defined('SOURCES')) die("Error");

	switch($act)
	{
		case "update":
			viewSetting();
			$template = "setting/man/man_add";
			break;
		case "save":
			saveSetting();
			break;
			
		default:
			$template = "404";
	}

	/* View setting */
	function viewSetting()
	{
		global $d, $item;

		$item = $d->rawQueryOne("select * from setting limit 0,1");
	}

	/* Save setting */
	function saveSetting()
	{
		global $d, $func, $flash, $config, $com;

		/* Check post */
		if(empty($_POST))
		{
			$func->transfer("Không nhận được dữ liệu", "index.php?source=setting&act=update", false);
		}

		/* Post dữ liệu */
		$message = '';
		$response = array();
		$id = (!empty($_POST['id'])) ? htmlspecialchars($_POST['id']) : 0;
		$row = $d->rawQueryOne("select id, options from setting where id = ? limit 0,1",array($id));
		$option = json_decode($row['options'],true);
		$data = (!empty($_POST['data'])) ? $_POST['data'] : null;
		if($data)
		{
			foreach($data as $column => $value)
			{
				if(is_array($value))
				{
					foreach($value as $k2 => $v2)
					{
						$option[$k2] = $v2;
					}

					$data[$column] = json_encode($option);
				}
			}
		}

		/* Save data */
		if(!empty($row))
		{
			$d->where('id',$id);
			if($d->update('setting',$data))
			{
				$func->transfer("Cập nhật dữ liệu thành công ", "index.php?source=setting&act=update");
			}
			else
			{
				$func->transfer("Cập nhật dữ liệu bị lỗi", "index.php?source=setting&act=update", false);
			}
		}
		else
		{
			if($d->insert('setting',$data))
			{

				$func->transfer("Thêm dữ liệu thành công", "index.php?source=setting&act=update");
			}
			else
			{
				$func->transfer("Thêm dữ liệu bị lỗi", "index.php?source=setting&act=update", false);
			}
		}
	}
?>