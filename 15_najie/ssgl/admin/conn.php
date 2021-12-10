<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>无标题文档</title>
</head>

<body>
<?php
$namehost="localhost";
$user="root";
$pwd="";
$db="liuyuanbian";
$link=@mysql_connect($namehost,$user,$pwd) or die("数据库连接失败");
mysql_select_db($db);
mysql_query("set names 'gbk'");
?>
</body>
</html>
