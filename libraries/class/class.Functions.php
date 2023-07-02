<?php
	class Functions
	{
		private $d;
		private $hash;
		private $cache;

		function __construct($d)
		{
			$this->d = $d;
		}
		public function read_number($num){
				if($num=='' || $num==0){
					echo "Not Number!";
					return false;
				}
				else{
					$s = "";
					$num_str = number_format($num);
					$num_arr = explode(",",$num_str);
					$c = count($num_arr);
					if($c>=5){
						$s .= substr($num_str,0,$c-21)." Nghìn Tỷ ";
					}
					if($c>=4 && $num_arr[$c-4]!=0 )
						$s .= $num_arr[$c-4]."Tỷ";
					if($c>=3 && $num_arr[$c-3]!=0)
						$s .= $num_arr[$c-3]."Triệu";
					if($c>=2 && $num_arr[$c-2]!=0)
						$s .= $num_arr[$c-2]."K";
					if($c>=1 && $num_arr[$c-1]!=0)
						$s .= $num_arr[$c-1]." ";
					return $s;
				}
			}

		/* Markdown */
		public function markdown($path='', $params=array())
		{
			$content = '';

			if(!empty($path))
			{
				ob_start();
				include dirname(__DIR__)."/sample/".$path.".php";
				$content = ob_get_contents();
				ob_clean();
			}

			return $content;
		}

		/* Check URL */
		public function checkURL($index=false)
		{
			global $configBase;
			
			$url = '';
			$urls = array('index','index.html','trang-chu','trang-chu.html');

			if(array_key_exists('REDIRECT_URL', $_SERVER))
			{
				$url = explode("/", $_SERVER['REDIRECT_URL']);
			}
			else
			{
				$url = explode("/", $_SERVER['REQUEST_URI']);
			}

			if(is_array($url))
			{
				$url = $url[count($url)-1];
				if(strpos($url, "?"))
				{
					$url = explode("?", $url);
					$url = $url[0];
				}
			}

			if($index) array_push($urls,"index.php");
			else if(array_search('index.php', $urls)) $urls = array_diff($urls, ["index.php"]);
			if(in_array($url, $urls)) $this->redirect($configBase,301);
		}

		/* Kiểm tra dữ liệu nhập vào */
		public function cleanInput($input='', $type='')
		{
			$output = '';

			if($input != '')
			{
				/*
					// Loại bỏ HTML tags
					'@<[\/\!]*?[^<>]*?>@si',
				*/

				$search = array(
					'script' => '@<script[^>]*?>.*?</script>@si',
					'style' => '@<style[^>]*?>.*?</style>@siU',
					'blank' => '@<![\s\S]*?--[ \t\n\r]*>@',
					'iframe' => '/<iframe(.*?)<\/iframe>/is',
					'title' => '/<title(.*?)<\/title>/is',
					'pre' => '/<pre(.*?)<\/pre>/is',
					'frame' => '/<frame(.*?)<\/frame>/is',
					'frameset' => '/<frameset(.*?)<\/frameset>/is',
					'object' => '/<object(.*?)<\/object>/is',
					'embed' => '/<embed(.*?)<\/embed>/is',
					'applet' => '/<applet(.*?)<\/applet>/is',
					'meta' => '/<meta(.*?)<\/meta>/is',
					'doctype' => '/<!doctype(.*?)>/is',
					'link' => '/<link(.*?)>/is',
					'body' => '/<body(.*?)<\/body>/is',
					'html' => '/<html(.*?)<\/html>/is',
					'head' => '/<head(.*?)<\/head>/is',
					'onclick' => '/onclick="(.*?)"/is',
					'ondbclick' => '/ondbclick="(.*?)"/is',
					'onchange' => '/onchange="(.*?)"/is',
					'onmouseover' => '/onmouseover="(.*?)"/is',
					'onmouseout' => '/onmouseout="(.*?)"/is',
					'onmouseenter' => '/onmouseenter="(.*?)"/is',
					'onmouseleave' => '/onmouseleave="(.*?)"/is',
					'onmousemove' => '/onmousemove="(.*?)"/is',
					'onkeydown' => '/onkeydown="(.*?)"/is',
					'onload' => '/onload="(.*?)"/is',
					'onunload' => '/onunload="(.*?)"/is',
					'onkeyup' => '/onkeyup="(.*?)"/is',
					'onkeypress' => '/onkeypress="(.*?)"/is',
					'onblur' => '/onblur="(.*?)"/is',
					'oncopy' => '/oncopy="(.*?)"/is',
					'oncut' => '/oncut="(.*?)"/is',
					'onpaste' => '/onpaste="(.*?)"/is',
					'php-tag' => '/<(\?|\%)\=?(php)?/',
					'php-short-tag' => '/(\%|\?)>/'
				);

				if(!empty($type))
				{
					unset($search[$type]);
				}
				
				$output = preg_replace($search, '', $input);
			}

			return $output;
		}

		/* Kiểm tra dữ liệu nhập vào */
		public function sanitize($input='', $type='')
		{
			if(is_array($input))
			{
				foreach($input as $var=>$val)
				{
					$output[$var] = $this->sanitize($val, $type);
				}
			}
			else
			{
				$output  = $this->cleanInput($input, $type);
			}

			return $output;
		}

		/* Kiểm tra đăng nhập */
		// public function checkLoginAdmin()
		// {
		// 	global $loginAdmin;

		// 	$token = (!empty($_SESSION[$loginAdmin]['token'])) ? $_SESSION[$loginAdmin]['token'] : '';
		// 	$row = $this->d->rawQuery("select secret_key from #_user where secret_key = ? and find_in_set('hienthi',status)",array($token));

		// 	if(count($row) == 1 && $row[0]['secret_key'] != '')
		// 	{
		// 		return true;
		// 	}
		// 	else
		// 	{
		// 		if(!empty($_SESSION[TOKEN])) unset($_SESSION[TOKEN]);
		// 		unset($_SESSION[$loginAdmin]);
		// 		return false;
		// 	}
		// }

		/* Mã hóa mật khẩu admin */
		public function encryptPassword($str='')
		{
			return md5($str);
		}

		/* Kiểm tra phân quyền menu */
		public function checkPermission($com='', $act='', $type='', $array=null, $case='')
		{
			global $loginAdmin;
			
			$str = $com;
			
			if($act) $str .= '_'.$act;

			if($case == 'phrase-1')
			{
				if($type!='') $str .= '_'.$type;
				if(!in_array($str, $_SESSION[$loginAdmin]['permissions'])) return true;
				else return false;
			}
			else if($case == 'phrase-2')
			{
				$count = 0;

				if($array)
				{
					foreach($array as $key => $value)
					{
						if(!empty($value['dropdown']))
						{
							unset($array[$key]);
						}
					}

					foreach($array as $key => $value)
					{
						if(!in_array($str."_".$key, $_SESSION[$loginAdmin]['permissions'])) $count++;
					}

					if($count == count($array)) return true;
				}
				else return false;
			}

			return false;
		}

		/* Kiểm tra phân quyền */
		public function checkRole()
		{
			global $config, $loginAdmin;
			
			if((!empty($_SESSION[$loginAdmin]['role']) && $_SESSION[$loginAdmin]['role'] == 3) || !empty($config['website']['debug-developer'])) return false;
			else return true;
		}

		/* Lấy tình trạng nhận tin */
		public function getStatusNewsletter($confirm_status=0, $type='')
		{
			global $config;

			$loai = '';

			if(!empty($config['newsletter'][$type]['confirm_status']))
			{
				foreach($config['newsletter'][$type]['confirm_status'] as $key => $value)
				{
					if($key == $confirm_status)
					{
						$loai = $value;
						break;
					}
				}
			}

			if($loai == '') $loai="Đang chờ duyệt...";

			return $loai;
		}

		/* Database maintenance */
		public function databaseMaintenance($action='', $tables=array())
		{
			$result = array();
			$row = array();

			if(!empty($action) && !empty($tables))
			{
				foreach($tables as $k => $v)
				{
					foreach($v as $table)
					{
						$result = $this->d->rawQuery("$action TABLE $table");
						
						if(!empty($result))
						{
							$row[$k]['table'] = $result[0]['Table'];
							$row[$k]['action'] = $result[0]['Op'];
							$row[$k]['type'] = $result[0]['Msg_type'];
							$row[$k]['text'] = $result[0]['Msg_text'];
						}
					}
				}
			}

			return $row;
		}

		/* Format money */
		public function formatMoney($price=0, $unit='đ', $html=false)
		{
			$str = '';

			if($price)
			{
				$str .= number_format($price, 0, ',', '.');
				if($unit != '')
				{
					if($html)
					{
						$str .= '<span>'.$unit.'</span>';
					}
					else
					{
						$str .= $unit;
					}
				}
			}

			return $str;
		}

		/* Is phone */
		public function isPhone($number)
		{
			$number = trim($number);
			if(preg_match('/(03|05|07|08|09|01[2|6|8|9])+([0-9]{8})\b/', $number) && strlen($number) == 10)
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		/* Format phone */
		public function formatPhone($number, $dash=' ')
		{
			if(preg_match('/^(\d{4})(\d{3})(\d{3})$/', $number, $matches))
			{
				return $matches[1].$dash.$matches[2].$dash.$matches[3];
			}
		}

		/* Parse phone */
		public function parsePhone($number)
		{
			return (!empty($number)) ? preg_replace('/[^0-9]/', '', $number) : '';
		}

		/* Check letters and nums */
		public function isAlphaNum($str)
		{
			if(preg_match('/^[a-z0-9]+$/', $str))
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		/* Is email */
		public function isEmail($email)
		{
			if(filter_var($email, FILTER_VALIDATE_EMAIL))
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		/* Is match */
		public function isMatch($value1, $value2)
		{
			if($value1 == $value2)
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		/* Is decimal */
		public function isDecimal($number)
		{
			if(preg_match('/^\d{1,10}(\.\d{1,4})?$/', $number))
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		/* Is coordinates */
		public function isCoords($str)
		{
			if(preg_match('/^[-+]?([1-8]?\d(\.\d+)?|90(\.0+)?),\s*[-+]?(180(\.0+)?|((1[0-7]\d)|([1-9]?\d))(\.\d+)?)$/', $str))
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		/* Is url */
		public function isUrl($str)
		{
			if(preg_match('/^(https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|www\.[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9]+\.[^\s]{2,}|www\.[a-zA-Z0-9]+\.[^\s]{2,})/', $str))
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		/* Is url youtube */
		public function isYoutube($str)
		{
			if(preg_match('/https?:\/\/(?:[a-zA_Z]{2,3}.)?(?:youtube\.com\/watch\?)((?:[\w\d\-\_\=]+&amp;(?:amp;)?)*v(?:&lt;[A-Z]+&gt;)?=([0-9a-zA-Z\-\_]+))/i', $str))
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		/* Is fanpage */
		public function isFanpage($str)
		{
			if(preg_match('/^(https?:\/\/)?(?:www\.)?facebook\.com\/(?:(?:\w)*#!\/)?(?:pages\/)?(?:[\w\-]*\/)*([\w\-\.]*)/', $str))
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		/* Is date */
		public function isDate($str)
		{
			if(preg_match('/^([0-2][0-9]|(3)[0-1])(\/)(((0)[0-9])|((1)[0-2]))(\/)\d{4}$/', $str))
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		/* Is number */
		public function isNumber($numbs)
		{
			if(preg_match('/^[0-9]+$/', $numbs))
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		/* Check account */
		public function checkAccount($data='', $type='', $tbl='', $id=0)
		{
			$result = false;
			$row = array();

			if(!empty($data) && !empty($type) && !empty($tbl))
			{
				$where = (!empty($id)) ? ' and id != '.$id : '';
				$row = $this->d->rawQueryOne("select id from #_$tbl where $type = ? $where limit 0,1", array($data));

				if(!empty($row))
				{
					$result = true;
				}
			}

			return $result;
		}

		/* Check title */
		public function checkTitle($data=array())
		{
			global $config;

			$result = array();

			foreach($config['website']['lang'] as $k => $v)
			{
				if(isset($data['name'.$k]))
				{
					$title = trim($data['name'.$k]);

					if(empty($title))
					{
						$result[] = 'Tiêu đề ('.$v.') không được trống';
					}
				}
			}

			return $result;
		}

		/* Check slug */
		public function checkSlug($data=array())
		{
			$result = 'valid';

			if(isset($data['slug']))
			{
				$slug = trim($data['slug']);

				if(!empty($slug))
				{
					$table = array(
						"category",
						"product",
					);

					$where = (!empty($data['id']) && empty($data['copy'])) ? "id != ".$data['id']." and " : "";

					foreach($table as $v)
					{
						$check = $this->d->rawQueryOne("select id from $v where $where slug = ? limit 0,1", array($data['slug']));

						if(!empty($check['id']))
						{
							$result = 'exist';
							break;
						}
					}
				}
				else
				{
					$result = 'empty';
				}
			}

			return $result;
		}

		/* Check recaptcha */
		public function checkRecaptcha($response='')
		{
			global $config;

			$result = null;
			$active = $config['googleAPI']['recaptcha']['active'];

			if($active == true && $response != '')
		    {
		        $recaptcha = file_get_contents($config['googleAPI']['recaptcha']['urlapi'].'?secret='.$config['googleAPI']['recaptcha']['secretkey'].'&response='.$response);
				$recaptcha = json_decode($recaptcha);
				$result['score'] = $recaptcha->score;
				$result['action'] = $recaptcha->action;
		    }
		    else if(!$active)
		    {
		    	$result['test'] = true;
		    }

		    return $result;
		}

		/* Login */
		public function checkLoginMember()
		{
			global $configBase, $loginMember;

			if(!empty($_SESSION[$loginMember]) || !empty($_COOKIE['login_member_id']))
			{
				$flag = true;
				$iduser = (!empty($_COOKIE['login_member_id'])) ? $_COOKIE['login_member_id'] : $_SESSION[$loginMember]['id'];

				if($iduser)
				{
					$row = $this->d->rawQueryOne("select login_session, id, username, phone, address, email, fullname from #_member where id = ? and find_in_set('hienthi',status)",array($iduser));

					if(!empty($row['id']))
				    {
				    	$login_session = (!empty($_COOKIE['login_member_session'])) ? $_COOKIE['login_member_session'] : $_SESSION[$loginMember]['login_session'];

				    	if($login_session == $row['login_session'])
				    	{
				    		$_SESSION[$loginMember]['active'] = true;
					        $_SESSION[$loginMember]['id'] = $row['id'];
					        $_SESSION[$loginMember]['username'] = $row['username'];
					        $_SESSION[$loginMember]['phone'] = $row['phone'];
					        $_SESSION[$loginMember]['address'] = $row['address'];
					        $_SESSION[$loginMember]['email'] = $row['email'];
					        $_SESSION[$loginMember]['fullname'] = $row['fullname'];
				    	}
				    	else $flag = false;
				    }
				    else $flag = false;

				    if(!$flag)
				    {
						unset($_SESSION[$loginMember]);
						setcookie('login_member_id',"",-1,'/');
						setcookie('login_member_session',"",-1,'/');

						$this->transfer("Tài khoản của bạn đã hết hạn đăng nhập hoặc đã đăng nhập trên thiết bị khác", $configBase, false);
				    }
				}
			}
		}

		/* Lấy youtube */
		public function getYoutube($url='') 
		{
			if($url != '')
			{
			    $parts = parse_url($url);
			    if(isset($parts['query'])) 
			    {
			        parse_str($parts['query'], $qs);
			        if(isset($qs['v'])) return $qs['v'];
			        else if($qs['vi']) return $qs['vi'];
			    }

			    if(isset($parts['path']))
			    {
			        $path = explode('/', trim($parts['path'], '/'));
			        return $path[count($path) - 1];
			    }
			}

		    return false;
		}

		
		/* Get list gallery */
		public function listsGallery($file='')
		{
			$result = array();

			if(!empty($file) && !empty($_POST['fileuploader-list-'.$file]))
			{
				$fileLists = '';
				$fileLists = str_replace('"','',$_POST['fileuploader-list-'.$file]);
				$fileLists = str_replace('[','',$fileLists);
				$fileLists = str_replace(']','',$fileLists);
				$fileLists = str_replace('{','',$fileLists);
				$fileLists = str_replace('}','',$fileLists);
				$fileLists = str_replace('0:/','',$fileLists);
				$fileLists = str_replace('file:','',$fileLists);
				$result = explode(',',$fileLists);
			}

			return $result;
		}

		/* Template gallery */
		public function galleryFiler($numb=1, $id=0, $photo='', $name='', $folder='', $col='')
		{
			/* Params */
			$params = array();
			$params['numb'] = $numb;
			$params['id'] = $id;
			$params['photo'] = $photo;
			$params['name'] = $name;
			$params['folder'] = $folder;
			$params['col'] = $col;

			/* Get markdown */
			$str = $this->markdown('gallery/admin', $params);
			
			return $str;
		}

		/* Delete gallery */
		public function deleteGallery()
		{
			$row = $this->d->rawQuery("select id, com, photo from #_gallery where hash != '' and date_created < ".(time()-3*3600));
			$array = array("product" => "upload/product", "news" => "upload/news");

			if($row)
			{
				foreach($row as $item)
				{
					@unlink($array[$item['com']].$item['photo']);
					$this->d->rawQuery("delete from #_gallery where id = ".$item['id']);
				}
			}
		}
		
		/* Generate hash */
		public function generateHash()
		{
			if(!$this->hash)
			{
				$this->hash = $this->stringRandom(10);
			}
			return $this->hash;
		}

		/* Lấy date */
		public function makeDate($time=0, $dot='.', $lang='vi', $f=false)
		{
			$str = ($lang == 'vi') ? date("d{$dot}m{$dot}Y",$time) : date("m{$dot}d{$dot}Y",$time);

			if($f == true)
			{
				$thu['vi'] = array('Chủ nhật','Thứ hai','Thứ ba','Thứ tư','Thứ năm','Thứ sáu','Thứ bảy');
				$thu['en'] = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
				$str = $thu[$lang][date('w',$time)].', '.$str;
			}

			return $str;
		}

		/* Alert */
		public function alert($notify='')
		{
			echo '<script language="javascript">alert("'.$notify.'")</script>';
		}

		/* Delete file */
		public function deleteFile($file='')
		{
			return @unlink($file);
		}

		/* Transfer */
		public function transfer($msg='', $page='', $numb=true)
		{
			global $configBase;

			$basehref = $configBase;
			$showtext = $msg;
			$page_transfer = $page;
			$numb = $numb;
			
			include("./templates/layout/transfer.php");
			exit();
		}

		/* Redirect */
		public function redirect($url='', $response=null)
		{
			header("location:$url", true, $response);
			exit();
		}

		/* Dump */
		public function dump($value='', $exit=false)
		{
			echo "<pre>";	
			print_r($value);
			echo "</pre>";
			if($exit) exit();
		}

		/* Pagination */
		public function pagination($totalq=0, $perPage=10, $page=1, $url='?')
		{
			$urlpos = strpos($url, "?");
			$url = ($urlpos) ? $url."&" : $url."?";
			$total = $totalq;
			$adjacents = "2";
			$page = ($page == 0 ? 1 : $page);
			$lastpage = ceil($total/$perPage);
			$lpm1 = $lastpage - 1;
			$pagination = "";

			if($lastpage > 1)
			{
				$pagination .= "<ul class='pagination flex-wrap justify-content-center mb-0'>";
				if($lastpage < 7 + ($adjacents * 2))
				{
					for($counter = 1; $counter <= $lastpage; $counter++)
					{
						if($counter == $page) $pagination.= "<li class='page-item active'><a class='page-link'>{$counter}</a></li>";
						else $pagination.= "<li class='page-item'><a class='page-link' href='{$url}p={$counter}'>{$counter}</a></li>";
					}
				}
				elseif($lastpage > 5 + ($adjacents * 2))
				{
					if($page < 1 + ($adjacents * 2))
					{
						for($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
						{
							if($counter == $page) $pagination.= "<li class='page-item active'><a class='page-link'>{$counter}</a></li>";
							else $pagination.= "<li class='page-item'><a class='page-link' href='{$url}p={$counter}'>{$counter}</a></li>";
						}

						$pagination.= "<li class='page-item'><a class='page-link' href='{$url}p=1'>...</a></li>";
						$pagination.= "<li class='page-item'><a class='page-link' href='{$url}p={$lpm1}'>{$lpm1}</a></li>";
						$pagination.= "<li class='page-item'><a class='page-link' href='{$url}p={$lastpage}'>{$lastpage}</a></li>";
					}
					elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
					{
						$pagination.= "<li class='page-item'><a class='page-link' href='{$url}p=1'>1</a></li>";
						$pagination.= "<li class='page-item'><a class='page-link' href='{$url}p=2'>2</a></li>";
						$pagination.= "<li class='page-item'><a class='page-link' href='{$url}p=1'>...</a></li>";

						for($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
						{
							if($counter == $page) $pagination.= "<li class='page-item active'><a class='page-link'>{$counter}</a></li>";
							else $pagination.= "<li class='page-item'><a class='page-link' href='{$url}p={$counter}'>{$counter}</a></li>";
						}

						$pagination.= "<li class='page-item'><a class='page-link' href='{$url}p=1'>...</a></li>";
						$pagination.= "<li class='page-item'><a class='page-link' href='{$url}p={$lpm1}'>{$lpm1}</a></li>";
						$pagination.= "<li class='page-item'><a class='page-link' href='{$url}p={$lastpage}'>{$lastpage}</a></li>";
					}
					else
					{
						$pagination.= "<li class='page-item'><a class='page-link' href='{$url}p=1'>1</a></li>";
						$pagination.= "<li class='page-item'><a class='page-link' href='{$url}p=2'>2</a></li>";
						$pagination.= "<li class='page-item'><a class='page-link' href='{$url}p=1'>...</a></li>";

						for($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
						{
							if($counter == $page) $pagination.= "<li class='page-item active'><a class='page-link'>{$counter}</a></li>";
							else $pagination.= "<li class='page-item'><a class='page-link' href='{$url}p={$counter}'>{$counter}</a></li>";
						}
					}
				}

				$pagination.= "</ul>";
			}

			return $pagination;
		}

		/* UTF8 convert */
		public function utf8Convert($str='')
		{
			if($str != '')
			{
				$utf8 = array(
					'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
					'd'=>'đ|Đ',
					'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
					'i'=>'í|ì|ỉ|ĩ|ị|Í|Ì|Ỉ|Ĩ|Ị',
					'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
					'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
					'y'=>'ý|ỳ|ỷ|ỹ|ỵ|Ý|Ỳ|Ỷ|Ỹ|Ỵ',
					''=>'`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\“|\”|\:|\;|_',
				);

				foreach($utf8 as $ascii => $uni)
				{
					$str = preg_replace("/($uni)/i",$ascii,$str);
				}
			}

			return $str;
		}

		/* Change title */
		public function changeTitle($text='')
		{
			if($text != '')
			{
				$text = strtolower($this->utf8Convert($text));
				$text = preg_replace("/[^a-z0-9-\s]/", "",$text);
				$text = preg_replace('/([\s]+)/', '-', $text);
				$text = str_replace(array('%20', ' '), '-', $text);
				$text = preg_replace("/\-\-\-\-\-/","-",$text);
				$text = preg_replace("/\-\-\-\-/","-",$text);
				$text = preg_replace("/\-\-\-/","-",$text);
				$text = preg_replace("/\-\-/","-",$text);
				$text = '@'.$text.'@';
				$text = preg_replace('/\@\-|\-\@|\@/', '', $text);	
			}

			return $text;
		}

		/* Lấy IP */
		public function getRealIPAddress()
		{
			if(!empty($_SERVER['HTTP_CLIENT_IP']))
			{
				$ip = $_SERVER['HTTP_CLIENT_IP'];
			}
			elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
			{
				$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
			}
			else
			{
				$ip = $_SERVER['REMOTE_ADDR'];
			}
			return $ip;
		}

		/* Lấy getPageURL */
		public function getPageURL()
		{
			$pageURL = 'http';
			if(array_key_exists('HTTPS', $_SERVER) && $_SERVER["HTTPS"] == "on") $pageURL .= "s";
			$pageURL .= "://";
			$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
			return $pageURL;
		}

		/* Lấy getCurrentPageURL */
		public function getCurrentPageURL() 
		{
			$pageURL = 'http';
			if(array_key_exists('HTTPS', $_SERVER) && $_SERVER["HTTPS"] == "on") $pageURL .= "s";
			$pageURL .= "://";
			$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
			$urlpos = strpos($pageURL, "?p");
			$pageURL = ($urlpos) ? explode("?p=", $pageURL) : explode("&p=", $pageURL);
			return $pageURL[0];
		}

		/* Lấy getCurrentPageURL Cano */
		public function getCurrentPageURL_CANO()
		{
			$pageURL = 'http';
			if(array_key_exists('HTTPS', $_SERVER) && $_SERVER["HTTPS"] == "on") $pageURL .= "s";
			$pageURL .= "://";
			$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
			$pageURL = str_replace("amp/", "", $pageURL);
			$urlpos = strpos($pageURL, "?p");
			$pageURL = ($urlpos) ? explode("?p=", $pageURL) : explode("&p=", $pageURL);
			$pageURL = explode("?", $pageURL[0]);
			$pageURL = explode("#", $pageURL[0]);
			$pageURL = explode("index", $pageURL[0]);
			return $pageURL[0];
		}

		/* Has file */
		public function hasFile($file)
		{
			if(isset($_FILES[$file]))
			{
				if($_FILES[$file]['error'] == 4)
				{
					return false;
				}
				else if($_FILES[$file]['error'] == 0)
				{
					return true;
				}
			}
			else
			{
				return false;
			}
		}

		/* Size file */
		public function sizeFile($file)
		{
			if($this->hasFile($file))
			{
				if($_FILES[$file]['error'] == 0)
				{
					return $_FILES[$file]['size'];
				}
			}
			else
			{
				return 0;
			}
		}

		/* Check file */
		public function checkFile($file)
		{
			global $config;

			$result = true;

			if($this->hasFile($file))
			{
				if($this->sizeFile($file) > $config['website']['video']['max-size'])
				{
					$result = false;
				}
			}

			return $result;
		}

		/* Check extension file */
		public function checkExtFile($file)
		{
			global $config;

			$result = true;

			if($this->hasFile($file))
			{
				$ext = $this->infoPath($_FILES[$file]["name"], 'extension');

				if(!in_array($ext, $config['website']['video']['extension']))
				{
					$result = false;
				}
			}

			return $result;
		}

		/* Info path */
		public function infoPath($filename='', $type='')
		{
			$result = '';

			if(!empty($filename) && !empty($type))
			{
				if($type == 'extension')
				{
					$result = pathinfo($filename, PATHINFO_EXTENSION);
				}
				else if($type == 'filename')
				{
					$result = pathinfo($filename, PATHINFO_FILENAME);
				}
			}

			return $result;
		}

		/* Format bytes */
		public function formatBytes($size, $precision=2)
		{
			$result = array();
			$base = log($size, 1024);
			$suffixes = array('', 'Kb', 'Mb', 'Gb', 'Tb');
			$result['numb'] = round(pow(1024, $base - floor($base)), $precision);
			$result['ext'] = $suffixes[floor($base)];

			return $result;
		}

		/* Copy image */
		public function copyImg($photo='', $constant='')
		{
			$str = '';

			if($photo != '' && $constant != '')
			{
				$rand = rand(1000,9999);
				$name = pathinfo($photo, PATHINFO_FILENAME);
				$ext = pathinfo($photo, PATHINFO_EXTENSION);
				$photo_new = $name.'-'.$rand.'.'.$ext;
				$oldpath = '../../upload/'.$constant.'/'.$photo;
				$newpath = '../../upload/'.$constant.'/'.$photo_new;

				if(file_exists($oldpath))
				{
					if(copy($oldpath,$newpath))
					{
						$str = $photo_new;
					}
				}
			}

			return $str;
		}

		/* Get Img size */
		public function getImgSize($photo='', $patch='')
		{
			$array = array();
			if($photo != '')
			{
				$x = (file_exists($patch)) ? getimagesize($patch) : null;
				$array = (!empty($x)) ? array("p"=>$photo,"w"=>$x[0],"h"=>$x[1],"m"=>$x['mime']) : null;
			}
			return $array;
		}

		/* Upload name */
		public function uploadName($name='')
		{
			$result = '';

			if($name != '')
			{
				$rand = rand(1000,9999);
				$ten_anh = pathinfo($name, PATHINFO_FILENAME);
				$result = $this->changeTitle($ten_anh)."-".$rand;
			}

			return $result;
		}

		/* Resize images */
		public function smartResizeImage($file='', $string=null, $width=0, $height=0, $proportional=false, $output='file', $delete_original=true, $use_linux_commands=false, $quality=100, $grayscale=false)
		{
		    if($height <= 0 && $width <= 0) return false;
		    if($file === null && $string === null) return false;
		    $info = $file !== null ? getimagesize($file) : getimagesizefromstring($string);
		    $image = '';
		    $final_width = 0;
		    $final_height = 0;
		    list($width_old, $height_old) = $info;
		    $cropHeight = $cropWidth = 0;
		    if($proportional)
		    {
		        if($width == 0) $factor = $height / $height_old;
		        elseif($height == 0) $factor = $width / $width_old;
		        else $factor = min($width / $width_old, $height / $height_old);
		        $final_width = round($width_old * $factor);
		        $final_height = round($height_old * $factor);
		    }
		    else
		    {
		        $final_width = ($width <= 0) ? $width_old : $width;
		        $final_height = ($height <= 0) ? $height_old : $height;
		        $widthX = $width_old / $width;
		        $heightX = $height_old / $height;
		        $x = min($widthX, $heightX);
		        $cropWidth = ($width_old - $width * $x) / 2;
		        $cropHeight = ($height_old - $height * $x) / 2;
		    }
		    switch($info[2])
		    {
		        case IMAGETYPE_JPEG:
		            $file !== null ? $image = imagecreatefromjpeg($file) : $image = imagecreatefromstring($string);
		        break;
		        case IMAGETYPE_GIF:
		            $file !== null ? $image = imagecreatefromgif($file) : $image = imagecreatefromstring($string);
		        break;
		        case IMAGETYPE_PNG:
		            $file !== null ? $image = imagecreatefrompng($file) : $image = imagecreatefromstring($string);
		        break;
		        default:
		            return false;
		    }
		    if($grayscale)
		    {
		        imagefilter($image, IMG_FILTER_GRAYSCALE);
		    }
		    $image_resized = imagecreatetruecolor($final_width, $final_height);
		    if(($info[2] == IMAGETYPE_GIF) || ($info[2] == IMAGETYPE_PNG))
		    {
		        $transparency = imagecolortransparent($image);
		        $palletsize = imagecolorstotal($image);
		        if($transparency >= 0 && $transparency < $palletsize)
		        {
		            $transparent_color = imagecolorsforindex($image, $transparency);
		            $transparency = imagecolorallocate($image_resized, $transparent_color['red'], $transparent_color['green'], $transparent_color['blue']);
		            imagefill($image_resized, 0, 0, $transparency);
		            imagecolortransparent($image_resized, $transparency);
		        }
		        elseif($info[2] == IMAGETYPE_PNG)
		        {
		            imagealphablending($image_resized, false);
		            $color = imagecolorallocatealpha($image_resized, 0, 0, 0, 127);
		            imagefill($image_resized, 0, 0, $color);
		            imagesavealpha($image_resized, true);
		        }
		    }
		    imagecopyresampled($image_resized, $image, 0, 0, $cropWidth, $cropHeight, $final_width, $final_height, $width_old - 2 * $cropWidth, $height_old - 2 * $cropHeight);
		    if($delete_original)
		    {
		        if($use_linux_commands) exec('rm ' . $file);
		        else @unlink($file);
		    }
		    switch(strtolower($output))
		    {
		        case 'browser':
		            $mime = image_type_to_mime_type($info[2]);
		            header("Content-type: $mime");
		            $output = NULL;
		        break;
		        case 'file':
		            $output = $file;
		        break;
		        case 'return':
		            return $image_resized;
		        break;
		        default:
		        break;
		    }
		    switch($info[2])
		    {
		        case IMAGETYPE_GIF:
		            imagegif($image_resized, $output);
		        break;
		        case IMAGETYPE_JPEG:
		            imagejpeg($image_resized, $output, $quality);
		        break;
		        case IMAGETYPE_PNG:
		            $quality = 9 - (int)((0.9 * $quality) / 10.0);
		            imagepng($image_resized, $output, $quality);
		        break;
		        default:
		            return false;
		    }
		    return true;
		}

		/* Correct images orientation */
		public function correctImageOrientation($filename)
		{
			ini_set('memory_limit', '1024M');
			if(function_exists('exif_read_data'))
			{
				$exif = @exif_read_data($filename);
				if($exif && isset($exif['Orientation']))
				{
					$orientation = $exif['Orientation'];
					if($orientation != 1)
					{
						$img = imagecreatefromjpeg($filename);
						$deg = 0;

						switch($orientation)
						{
							case 3:
							$image = imagerotate($img, 180, 0);
							break;

							case 6:
							$image = imagerotate($img, -90, 0);
							break;

							case 8:
							$image = imagerotate($img, 90, 0);
							break;
						}

						imagejpeg($image, $filename, 90);
					}

				} 
			}
		}

		/* Upload images */
		public function uploadImage($file='', $extension='', $folder='', $newname='')
		{
			global $config;

			if(isset($_FILES[$file]) && !$_FILES[$file]['error'])
			{
				$postMaxSize = ini_get('post_max_size');
				$MaxSize = explode('M', $postMaxSize);
				$MaxSize = $MaxSize[0];
				if($_FILES[$file]['size'] > $MaxSize*1048576)
				{
					$this->alert('Dung lượng file không được vượt quá '.$postMaxSize);
					return false;
				}

				$ext = explode('.', $_FILES[$file]['name']);
				$ext = strtolower($ext[count($ext)-1]);
				$name = basename($_FILES[$file]['name'], '.'.$ext);

				if(strpos($extension, $ext)===false)
				{
					$this->alert('Chỉ hỗ trợ upload file dạng '.$extension);
					return false;
				}

				if($newname=='' && file_exists($folder.$_FILES[$file]['name']))
					for($i=0; $i<100; $i++)
					{
						if(!file_exists($folder.$name.$i.'.'.$ext))
						{
							$_FILES[$file]['name'] = $name.$i.'.'.$ext;
							break;
						}
					}
				else
				{
					$_FILES[$file]['name'] = $newname.'.'.$ext;
				}

				if(!copy($_FILES[$file]["tmp_name"], $folder.$_FILES[$file]['name']))	
				{
					if(!move_uploaded_file($_FILES[$file]["tmp_name"], $folder.$_FILES[$file]['name']))	
					{
						return false;
					}
				}

				/* Fix correct Image Orientation */
				$this->correctImageOrientation($folder.$_FILES[$file]['name']);

				/* Resize image if width origin > config max width */
				$array = getimagesize($folder.$_FILES[$file]['name']);
				list($image_w, $image_h) = $array;
				$maxWidth = $config['website']['upload']['max-width'];
				$maxHeight = $config['website']['upload']['max-height'];
				if($image_w > $maxWidth) $this->smartResizeImage($folder.$_FILES[$file]['name'],null,$maxWidth,$maxHeight,true);

				return $_FILES[$file]['name'];
			}
			return false;
		}

		/* Delete folder */
		public function removeDir($dirname='')
		{
			if(is_dir($dirname)) $dir_handle = opendir($dirname);
			if(!isset($dir_handle) || $dir_handle == false) return false;
			while($file = readdir($dir_handle))
			{
				if($file != "." && $file != "..")
				{
					if(!is_dir($dirname."/".$file)) unlink($dirname."/".$file);
					else $this->removeDir($dirname.'/'.$file);
				}
			}
			closedir($dir_handle);
			rmdir($dirname);
			return true;
		}

		/* String random */
		public function stringRandom($sokytu=10)
		{
			$str = '';

			if($sokytu > 0)
			{
				$chuoi = 'ABCDEFGHIJKLMNOPQRSTUVWXYZWabcdefghijklmnopqrstuvwxyzw0123456789';
				for($i=0; $i<$sokytu; $i++)
				{
					$vitri = mt_rand( 0 ,strlen($chuoi) );
					$str= $str . substr($chuoi,$vitri,1 );
				}
			}

			return $str;
		}

		/* Digital random */
		public function digitalRandom($min=1, $max=10, $num=10)
		{
			$result = '';

			if($num > 0)
			{
				for($i=0; $i<$num; $i++)
				{
					$result .= rand($min,$max);
				}
			}

			return $result;	
		}


		/* Join column */
		public function joinCols($array=null, $column=null)
		{
			$str = '';
			$arrayTemp = array();

			if($array && $column)
			{
				foreach($array as $k => $v)
				{
					if(!empty($v[$column]))
					{
						$arrayTemp[] = $v[$column];
					}
				}

				if(!empty($arrayTemp))
				{
					$arrayTemp = array_unique($arrayTemp);
					$str = implode(",", $arrayTemp);
				}
			}

			return $str;
		}
		
		public function daxem($pid){
			if($pid<1) return;
			if(is_array($_SESSION['daxem'])){
				if($this->daxem_exists($pid)) return;
				$max=count($_SESSION['daxem']);
				$_SESSION['daxem'][$max]['productid']=$pid;
			}
			else{
				$_SESSION['daxem']=array();
				$_SESSION['daxem'][0]['productid']=$pid;
			}
		}
		public function daxem_exists($pid){
			$pid=intval($pid);
			$max=count($_SESSION['daxem']);
			$flag=0;
			for($i=0;$i<$max;$i++){
				if($pid==$_SESSION['daxem'][$i]['productid']){
					$flag=1;
					break;
				}
			}
			return $flag;
		} 
	}
?>