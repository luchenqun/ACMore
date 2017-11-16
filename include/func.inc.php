<?php

	class SaeUpload
	{
		private $type="exe|rmvb";//�������ϴ����ļ�����
		private $domain;
		private $form_name;
		
		public function __construct($domain, $form_name)
		{
			$this->domain=$domain;
			$this->form_name = $form_name;
		}
		
		public function upload()
		{
			$result=array();//���ص�����
			
			$original_name = basename($_FILES[$this->form_name]["name"]);//ԭʼ�ļ���
			$extension = pathinfo($original_name, PATHINFO_EXTENSION);//��չ��
			$data=explode("|",trim(strtolower($this->type)));//��������ϴ�����תΪ����

			if( 0 == $_FILES[$this->form_name]['error'] && (!in_array($extension,$data)))
			{
				$s=new SaeStorage();
				
				$temp_name = str_replace(".".$extension, "", $original_name);
				$filename = $temp_name . rand(1, 10000) . "." .$extension;			
				$form_data =file_get_contents($_FILES[$this->form_name]['tmp_name']);
				
				$flag = $s->write($this->domain, $filename, $form_data);//д���ļ�
				if(FALSE == $flag)//���û�д���SaeStorage
				{
					$result["state"]=0;					
				}
				else
				{
					$url=mb_convert_encoding($s->getUrl($this->domain, $filename), "GB2312", "UTF8");//��ȡ��ַ
					$property=$s->getAttr($this->domain, $filename);//��ȡ�ļ�����
					
					$result['url']=$url;//�ļ��ĵ�ַ
					$result['size']=$property['length'];//�ļ��Ĵ�С
					$result['sql_filename'] = $temp_name;//�嵽���ݿ����������
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
	
	//���ļ���С
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
	///////////////////////////////////////////У������ע��������֤����///////////////////////////////////////////////////
	//���ѧ�ŵĺϷ���
	function check_stu_id($string,$min_num,$max_num) 
	{
		$string = trim($string);
		
		//���Ȳ���С��12���ߴ���12λ
		if (strlen($string) < $min_num || strlen($string) > $max_num) {
			alert_back("����ѧ��λ������");
		}
		
		//ѧ��ֻ��Ϊ����
		$char_pattern = '/\D/';
		if (preg_match($char_pattern,$string)) 
		{
			alert_back('�˺�ֻ��Ϊ��������ɵ�ѧ��');
		}
		
		//ƥ��ѧ��ǰ���������20��ͷ
		$char_pattern = '/^20/';
		if (!preg_match($char_pattern,$string)) 
		{
			alert_back('���ѧ���Ǵ���ģ�');
		}
		
		return $string;
	}	
	
	//��������ĺϷ���	
	function check_name($string, $min_num, $max_num)
	{
		$string = trim($string);
		$string = iconv('GB2312', 'UTF-8', $string);//���ֵ�ƥ��ֻ��UTF-8����
		if(mb_strlen($string, 'UTF-8') < $min_num || mb_strlen($string, 'UTF-8') > $max_num)
		{
			alert_back('��������С��' . $min_num . '���ߴ���' . $max_num . 'λ�ĺ���');
		}
		//����ֻ���ɺ������
		$char_panttern = '/[^\x{4e00}-\x{9fa5}]/u';
		if(preg_match($char_panttern, $string))
		{
			alert_back('����ֻ���ɺ������');
		}
		return iconv('UTF-8','GB2312', $string);
	}
	
	//���רҵ��д�ĺϷ���	
	function check_major($string)
	{
		$string = trim($string);
		$string = iconv('GB2312', 'UTF-8', $string);
		
		if(0 == mb_strlen($string, 'UTF-8'))
		{
			alert_back('����д���רҵ');
		}
		//רҵֻ���ɺ������
		$char_panttern = '/[^\x{4e00}-\x{9fa5}]/u';
		if(preg_match($char_panttern, $string))
		{
			alert_back('רҵ���ú�������');
		}
		return iconv('UTF-8','GB2312', $string);
	}
	
	//����ֻ�����ĺϷ���
	function check_tel($string)
	{
		$string = trim($string);
		if(0 == strlen($string))
		{
			alert_back('����д����ֻ�����');		
		}
		$char_panttern = '/^1+[3-8]+\d{9}/';
		if(!preg_match($char_panttern, $string))
		{
			alert_back('��������ȷ��11λ�ֻ�����');
		}
		return $string;
	}
	
	//�������ĺϷ���
	function check_pwd($first_pwd, $end_pwd, $min_num, $max_num)
	{
		if(strlen($first_pwd) < $min_num || strlen($first_pwd) > $max_num)
		{
			alert_back('���벻��С��' . $min_num . "λ����" . $max_num . 'λ');
		}
		
		if(strcmp($first_pwd, $end_pwd) != 0)
		{
			alert_back('������������벻һ��');
		}
		
		return $first_pwd;
	}
	
	//����Ƿ�ѡ����ѧԺѧԺ
	function check_college($string)
	{
		if(0 == strlen($string))
		{
			alert_back('��ѡ�������ڵ�ѧԺ');
		}
		return $string;
	}
	
//////////////////////////////////////////У��������ĺϷ��Լ��///////////////////////////

	//����������
	function check_team_name($string)
	{
		$string = trim($string);
		if(0 == mb_strlen($string, 'UTF-8'))
		{
			alert_back('�����������Ϊ��');
		}
		return $string;
	}
	//������֤���Ƿ�һ��
	function check_code($inputcode, $vcode)
	{
		$inputcode = trim($inputcode);
		if(strcasecmp($inputcode, $vcode) != 0)
		{
			alert_back('��֤�����');
		}
	}
//////////////////////////////////////////////�û���Ϣ�Ϸ��Լ���/////////////////////////////////////////

	function check_identity_card($string)
	{
		$string = trim($string);
		$char_panttern = '/\d{17}[\d|X|x]|\d{15}/';
		if(!preg_match($char_panttern, $string))
		{
			alert_back('��������ȷ���֤����');
		}
		return $string;
	}
	function check_class($string)
	{
		$string = trim($string);
		if(0 == mb_strlen($string, 'UTF-8'))
		{
			alert_back('����д�༶');
		}
		return $string;
	}	
	function check_qq($string)
	{
		$string = trim($string);
		$char_panttern = '/\d{5,10}/';
		if(!preg_match($char_panttern, $string))
		{
			alert_back('��������ȷ��QQ����');
		}
		return $string;
	}	
	function check_email($string)
	{
		$string = trim($string);
		$char_panttern = "/^[_.0-9a-z-]+@([0-9a-z][0-9a-z-]+.)+[a-z]{2,3}$/";
		if(!preg_match($char_panttern, $string))
		{
			alert_back('��������ȷ������');
		}
		return $string;
	}	
	function check_join_year($string)
	{
		$string = trim($string);
		if(0 == mb_strlen($string, 'UTF-8'))
		{
			alert_back('��ѡ����μӵļ�ѵ���');
		}
		return $string;
	}
	function check_oj_type($string)
	{
		$string = trim($string);
		if(0 == mb_strlen($string, 'UTF-8'))
		{
			alert_back('��ѡ�������ĸ�OJ������');
		}
		return $string;
	}	
	function check_oj_account($string)
	{
		$string = trim($string);
		if(0 == strlen($string))
		{
			alert_back('���������OJ�����˺�');
		}
		return $string;
	}		
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
?>