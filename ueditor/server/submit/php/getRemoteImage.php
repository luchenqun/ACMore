<?php
/**
 * Created by JetBrains PhpStorm.
 * User: taoqili
 * Date: 11-12-28
 * Time: ����9:54
 * To change this template use File | Settings | File Templates.
 */
$uri = htmlspecialchars( $_POST[ 'content' ] );
//Ajax�ύ����ַ���������������&���ţ����������Ὣ��ת��&amp;���µ�ַ�������ԣ�����Ҫת����
$uri = str_replace( "&amp;" , "&" , $uri );
getRemoteImage( $uri );

/**
 * @param $uri
 */
function getRemoteImage( $uri ){
    //����ץȡʱ������
    set_time_limit( 0 );
    //Զ��ץȡͼƬ����
    $config = array(
        "savePath" => "../../upload/uploadimages/" , //����·��
        "fileType" => array( ".gif" , ".png" , ".jpg" , ".jpeg" , ".bmp" ) , //�ļ������ʽ
        "fileSize" => 3000 //�ļ���С���ƣ���λKB
    );
	//ue_separate_ue  ue���ڴ������ݷָ����
    $imgUrls = explode( "ue_separate_ue" , $uri );
    $tmpNames = array();
    foreach ( $imgUrls as $imgUrl ) {
        //��ʽ��֤
        $fileType = strtolower( strrchr( $imgUrl , '.' ) );
        if ( !in_array( $fileType , $config[ 'fileType' ] ) ) {
            array_push($tmpNames,"error" );
            continue;
        }
        //�������
        if ( !urlTest( $imgUrl ) ) {
            array_push($tmpNames, "error" );
            continue;
        };

        //���������������ȡԶ��ͼƬ
        ob_start();
        //��ȷ��php.ini�е�fopen wrappers�Ѿ�����
        readfile( $imgUrl );
        $img = ob_get_contents();
        ob_end_clean();

        //��С��֤
        $uriSize = strlen( $img ); //�õ�ͼƬ��С
        $allowSize = 1024 * $config[ 'fileSize' ];
        if ( $uriSize > $allowSize ) {
            array_push($tmpNames,"error" );
            continue;
        }
        //��������λ��
        $savePath = $config[ 'savePath' ];
        if ( !file_exists( $savePath ) ) {
            mkdir( "$savePath" , 0777 );
        }
        //д���ļ�
        $tmpName = $savePath . rand( 1 , 10000 ) . time() . strrchr( $imgUrl , '.' );
        try {
            $fp2 = @fopen( $tmpName , "a" );
            fwrite( $fp2 , $img );
            fclose( $fp2 );
            array_push($tmpNames,str_replace('../../','',$tmpName)); //ͬͼƬ�ϴ�һ����ȥ����������·�����ҵ�../
	        //array_push($tmpNames,$tmpName);
        } catch ( Exception $e ) {
            array_push($tmpNames, "error" );
        }
    }

    response( "{'url':'" . implode("ue_separate_ue", $tmpNames) . "','tip':'Զ��ͼƬץȡ�ɹ���','srcUrl':'" . $uri . "'}" );
}

/**
 * ��������
 * @param $state
 */
function response( $state ){
    echo $state;
    exit();
}

/**
 * �������
 * @param $uri
 * @return bool
 */
function urlTest( $uri ){
    $headerArr = get_headers( $uri );
    return stristr( $headerArr[ 0 ] , "200" ) && stristr( $headerArr[ 0 ] , "OK" );
}

?>
