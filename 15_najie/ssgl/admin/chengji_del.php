<?php
include ("session.php");
include("db_conn.php");
$xh=$_GET["xh"];

$sql="delete from chengji where xh=$xh";
mysql_query($sql);

if(mysql_query($sql))
{
	echo("<script language='javascript'>alert('恭喜您，删除成功！');window.location.href='chengji_xinxi.php';</script>");
	exit();
}
else
{
	echo("<script language='javascript'>alert('失败，请联系管理员！');window.location.href='chengji_xinxi.php';</script>");
	exit();	
}		
?>