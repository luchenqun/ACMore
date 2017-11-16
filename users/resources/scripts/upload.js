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
		 document.getElementById('load').innerHTML = "<img src=\"resources/images/uploading.gif\" /><span style=\"font-size:18px; color:#f00\">亲，请您耐心等候3~10分钟，系统正在努力为你上传文件哦……</span><img src=\"resources/images/uploading.gif\" />";
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
