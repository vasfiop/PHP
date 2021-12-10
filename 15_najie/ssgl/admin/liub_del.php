
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>删除留言</title>
</head>

<body>
<?php
include("db_conn.php");
$name=$_GET["name"];
$sql="delete from users where name='$name'";
if(mysql_query($sql))
{
	echo("<script language='javascript'>window.location.href='liub_add.php';</script>");
	exit();
}
?>
</body>
</html>
