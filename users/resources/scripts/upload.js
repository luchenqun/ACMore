var xmlHttp;
function S_xmlhttprequest() 
{
	if(window.ActiveXObject)
	{
		xmlHttp = new ActiveXObject('Microsoft.XMLHTTP');
	} 
	else if(window.XMLHttpRequest) 
	{
		xmlHttp = new XMLHttpRequest();
	}
}

function loading() 
{
	S_xmlhttprequest();
	xmlHttp.open("GET","wait.php",true);
	xmlHttp.onreadystatechange = byphp;
	xmlHttp.send(null);
}

function byphp() 
{
  	if(xmlHttp.readyState == 1) 
	{
		 document.getElementById('load').innerHTML = "<img src=\"resources/images/uploading.gif\" /><span style=\"font-size:18px; color:#f00\">�ף��������ĵȺ�3~10���ӣ�ϵͳ����Ŭ��Ϊ���ϴ��ļ�Ŷ����</span><img src=\"resources/images/uploading.gif\" />";
	}

	if(xmlHttp.readyState == 4 )
	{
		if(xmlHttp.status == 200) 
		{
		  var byphp100 =  xmlHttp.responseText;
		  document.getElementById('load').innerHTML = byphp100;
		}
	}
}
