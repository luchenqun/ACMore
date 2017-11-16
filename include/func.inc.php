<?php

	class SaeUpload
	{
		private $type="exe|rmvb";//不允许上传的文件类型
		private $domain;
		private $form_name;
		
		public function __construct($domain, $form_name)
		{
			$this->domain=$domain;
			$this->form_name = $form_name;
		}
		
		public function upload()
		{
			$result=array();//返回的数据
			
			$original_name = basename($_FILES[$this->form_name]["name"]);//原始文件名
			$extension = pathinfo($original_name, PATHINFO_EXTENSION);//拓展名
			$data=explode("|",trim(strtolower($this->type)));//不允许的上传类型转为数组

			if( 0 == $_FILES[$this->form_name]['error'] && (!in_array($extension,$data)))
			{
				$s=new SaeStorage();
				
				$temp_name = str_replace(".".$extension, "", $original_name);
				$filename = $temp_name . rand(1, 10000) . "." .$extension;			
				$form_data =file_get_contents($_FILES[$this->form_name]['tmp_name']);
				
				$flag = $s->write($this->domain, $filename, $form_data);//写入文件
				if(FALSE == $flag)//如果没有传到SaeStorage
				{
					$result["state"]=0;					
				}
				else
				{
					$url=mb_convert_encoding($s->getUrl($this->domain, $filename), "GB2312", "UTF8");//获取地址
					$property=$s->getAttr($this->domain, $filename);//获取文件属性
					
					$result['url']=$url;//文件的地址
					$result['size']=$property['length'];//文件的大小
					$result['sql_filename'] = $temp_name;//插到数据库里面的名字
					$result['filename_storage'] = $filename;
					$result['state']=1;
				}
			}
			else
			{
				$result['state']=0;
			}
			
			return $result;
		}
	}

	function alter($msg, $url)
	{
		if(trim($msg) != '')
		{
			echo ("<script type='text/javascript'> alert('$msg');location.href='$url';</script>");
		}
		else
		{
			echo ("<script type='text/javascript'>location.href='$url';</script>");
		}
	}
	
	function location($msg,$url) 
	{
		if (!empty($msg)) 
		{
			echo "<script type='text/javascript'>alert('$msg');location.href='$url';</script>";
			exit();
		} 
		else 
		{
			header('Location:'.$url);
			exit();
		}
	}
	
	function alert_back($msg) 
	{
		echo "<script type='text/javascript'>alert('$msg');history.back();</script>";
		exit();
	}	
	
	//求文件大小
	function HumanReadableFilesize($size) 
	{
		$mod = 1024;
		$units = explode(' ','B KB MB GB TB PB');
		for ($i = 0; $size > $mod; $i++) 
		{
			$size /= $mod;
		}
		return round($size, 2) . ' ' . $units[$i];
	}
	function human_readable_filesize($size) 
	{
		$mod = 1024;
		$units = explode(' ','B KB MB GB TB PB');
		for ($i = 0; $size > $mod; $i++) 
		{
			$size /= $mod;
		}
		return round($size, 2) . ' ' . $units[$i];
	}	
	///////////////////////////////////////////校赛个人注册数据验证函数///////////////////////////////////////////////////
	//检查学号的合法性
	function check_stu_id($string,$min_num,$max_num) 
	{
		$string = trim($string);
		
		//长度不能小于12或者大于12位
		if (strlen($string) < $min_num || strlen($string) > $max_num) {
			alert_back("您的学号位数不对");
		}
		
		//学号只能为数字
		$char_pattern = '/\D/';
		if (preg_match($char_pattern,$string)) 
		{
			alert_back('账号只能为由数字组成的学号');
		}
		
		//匹配学号前面必须是以20开头
		$char_pattern = '/^20/';
		if (!preg_match($char_pattern,$string)) 
		{
			alert_back('你的学号是错误的！');
		}
		
		return $string;
	}	
	
	//检查姓名的合法性	
	function check_name($string, $min_num, $max_num)
	{
		$string = trim($string);
		$string = iconv('GB2312', 'UTF-8', $string);//汉字的匹配只认UTF-8编码
		if(mb_strlen($string, 'UTF-8') < $min_num || mb_strlen($string, 'UTF-8') > $max_num)
		{
			alert_back('姓名不得小于' . $min_num . '或者大于' . $max_num . '位的汉字');
		}
		//姓名只能由汉字组成
		$char_panttern = '/[^\x{4e00}-\x{9fa5}]/u';
		if(preg_match($char_panttern, $string))
		{
			alert_back('姓名只能由汉字组成');
		}
		return iconv('UTF-8','GB2312', $string);
	}
	
	//检查专业填写的合法性	
	function check_major($string)
	{
		$string = trim($string);
		$string = iconv('GB2312', 'UTF-8', $string);
		
		if(0 == mb_strlen($string, 'UTF-8'))
		{
			alert_back('请填写你的专业');
		}
		//专业只能由汉字组成
		$char_panttern = '/[^\x{4e00}-\x{9fa5}]/u';
		if(preg_match($char_panttern, $string))
		{
			alert_back('专业请用汉语描述');
		}
		return iconv('UTF-8','GB2312', $string);
	}
	
	//检查手机号码的合法性
	function check_tel($string)
	{
		$string = trim($string);
		if(0 == strlen($string))
		{
			alert_back('请填写你的手机号码');		
		}
		$char_panttern = '/^1+[3-8]+\d{9}/';
		if(!preg_match($char_panttern, $string))
		{
			alert_back('请输入正确的11位手机号码');
		}
		return $string;
	}
	
	//检查密码的合法性
	function check_pwd($first_pwd, $end_pwd, $min_num, $max_num)
	{
		if(strlen($first_pwd) < $min_num || strlen($first_pwd) > $max_num)
		{
			alert_back('密码不得小于' . $min_num . "位大于" . $max_num . '位');
		}
		
		if(strcmp($first_pwd, $end_pwd) != 0)
		{
			alert_back('两次输入的密码不一致');
		}
		
		return $first_pwd;
	}
	
	//检查是否选择了学院学院
	function check_college($string)
	{
		if(0 == strlen($string))
		{
			alert_back('请选择您所在的学院');
		}
		return $string;
	}
	
//////////////////////////////////////////校赛组队名的合法性检测///////////////////////////

	//检查比赛队名
	function check_team_name($string)
	{
		$string = trim($string);
		if(0 == mb_strlen($string, 'UTF-8'))
		{
			alert_back('组队名不允许为空');
		}
		return $string;
	}
	//检验验证码是否一致
	function check_code($inputcode, $vcode)
	{
		$inputcode = trim($inputcode);
		if(strcasecmp($inputcode, $vcode) != 0)
		{
			alert_back('验证码错误！');
		}
	}
//////////////////////////////////////////////用户信息合法性检验/////////////////////////////////////////

	function check_identity_card($string)
	{
		$string = trim($string);
		$char_panttern = '/\d{17}[\d|X|x]|\d{15}/';
		if(!preg_match($char_panttern, $string))
		{
			alert_back('请输入正确身份证号码');
		}
		return $string;
	}
	function check_class($string)
	{
		$string = trim($string);
		if(0 == mb_strlen($string, 'UTF-8'))
		{
			alert_back('请填写班级');
		}
		return $string;
	}	
	function check_qq($string)
	{
		$string = trim($string);
		$char_panttern = '/\d{5,10}/';
		if(!preg_match($char_panttern, $string))
		{
			alert_back('请输入正确的QQ号码');
		}
		return $string;
	}	
	function check_email($string)
	{
		$string = trim($string);
		$char_panttern = "/^[_.0-9a-z-]+@([0-9a-z][0-9a-z-]+.)+[a-z]{2,3}$/";
		if(!preg_match($char_panttern, $string))
		{
			alert_back('请输入正确的邮箱');
		}
		return $string;
	}	
	function check_join_year($string)
	{
		$string = trim($string);
		if(0 == mb_strlen($string, 'UTF-8'))
		{
			alert_back('请选择你参加的集训年份');
		}
		return $string;
	}
	function check_oj_type($string)
	{
		$string = trim($string);
		if(0 == mb_strlen($string, 'UTF-8'))
		{
			alert_back('请选择你在哪个OJ上做题');
		}
		return $string;
	}	
	function check_oj_account($string)
	{
		$string = trim($string);
		if(0 == strlen($string))
		{
			alert_back('请输入你的OJ做题账号');
		}
		return $string;
	}		
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
?>