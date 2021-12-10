<?php
include ("session.php");
include("db_conn.php");
mysql_query("set names 'gbk'");
if (isset($_POST['Submit'])){
$title = $_REQUEST["title"];
	$content = $_POST["content"];

$query="insert into chengji values ('','$noti_title','$noti_content','$noti_time','$noti_operator')";
$result=mysql_query($query);
if(mysql_query($result))
	{
		echo("<script language='javascript'>alert('失败，请联系管理员 ！');window.location.href='user_xinxi.php';</script>");
		exit();
	}
	else
	{
	echo("<script language='javascript'>alert('添加成功！');window.location.href='chengji_xinxi.php';</script>");
		
		exit();	
	}	
}


?>

<script language="JavaScript">

function check_form()
{
	with(document.news)
	{
		if(Trim(title.value)=="")
		{
			window.alert("标题不能为空");
			return false;
		}
		if(Trim(content.value)=="")
		{
			window.alert("内容不能为空");
			return false;
		}
	}
}

</script>
<script language="JavaScript">
clear_form("news");
</script>
