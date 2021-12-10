<?php
include("db_conn.php");
$id=$_GET["id"];

$sql="delete from gg where id=$id";
mysql_query($sql);

if(mysql_query($sql))
{
	echo("<script language='javascript'>alert('恭喜您，删除成功！');window.location.href='gonggao.php';</script>");
	exit();
}
else
{
	echo("<script language='javascript'>alert('失败，请联系管理员！');window.location.href='gonggao.php';</script>");
	exit();	
}		
?>