// JavaScript Document
var xmlHttp

function showUser(str)
{ 
xmlHttp=GetXmlHttpObject()
           
if (xmlHttp==null)
 {
 alert ("Browser does not support HTTP Request")
 return
 }
var url="aa.php"
url=url+"?name="+str
url=url+"&sid="+Math.random()
xmlHttp.onreadystatechange=stateChanged 
xmlHttp.open("GET",url,true)
xmlHttp.send(null)
            
}

function stateChanged() 
{ 
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
 { 
 
            
 var aa;
 var names=xmlHttp.responseText;
 if(names==1)
 aa="<span class='STYLE1'>此账号已被注册</span>";
 else
 aa="<span class='STYLE2'>此账号可以注册</span>";
 document.getElementById("php").innerHTML=aa;
			
 } 
}

function GetXmlHttpObject()
{
var xmlHttp=null;
try
 {
 // Firefox, Opera 8.0+, Safari
 xmlHttp=new XMLHttpRequest();
 }
catch (e)
 {
 //Internet Explorer
 try
  {
  xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
  }
 catch (e)
  {
  xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
 }
return xmlHttp;
}