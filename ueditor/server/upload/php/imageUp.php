<?php
    //�ϴ�����
    $config = array(
        "uploadPath"=>"http://acmore-file.stor.sinaapp.com/", 	  //����·��
        "fileType"=>array(".gif",".png",".jpg",".jpeg",".bmp"),   //�ļ������ʽ
        "fileSize"=>1000                                          //�ļ���С���ƣ���λKB
    );
    
    //�ļ��ϴ�״̬,���ɹ�ʱ����SUCCESS������ֵ��ֱ�ӷ��ض�Ӧ�ַ��ܲ���ʾ��ͼƬԤ����ͬʱ������ǰ��ҳ��ͨ���ص�������ȡ��Ӧ�ַ���
    $state = "SUCCESS";$fileName="";

    $title = htmlspecialchars($_POST['pictitle'], ENT_QUOTES);
    $path  = $config['uploadPath'];
    if(!file_exists($path)){
        mkdir("$path", 0777);
    }
    //��ʽ��֤
    $current_type = strtolower(strrchr($_FILES["picdata"]["name"], '.'));
    if(!in_array($current_type, $config['fileType'])){
        $state = "��֧�ֵ�ͼƬ���ͣ�";
    }
    //��С��֤
    $file_size = 1024 * $config['fileSize'];
    if( $_FILES["picdata"]["size"] > $file_size ){
        $state = "ͼƬ��С�������ƣ�";
    }
    //����ͼƬ
    if($state == "SUCCESS")
	{
        $tmp_file=$_FILES["picdata"]["name"];

		$s2 = new SaeStorage();
		$result = $s2->upload('image',$tmp_file, $_FILES['picdata']['tmp_name']);//���û�����SAE���ļ�ת�浽��ΪFile��storage	

        if(!$result)
		{
            $state = "ͼƬ����ʧ�ܣ�";
        }
    }
    //���������������json����
    $file= str_replace('../','',$result);  //Ϊ������⣬�滻����������../��./�����·����ʶ
    echo "{'url':'" . $file .  "','state':'" . $state . "'}";
?>





