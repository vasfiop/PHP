<?php
$Link=mysqli_connect("localhost","root",'123')
or die("数据库连接失败");
mysqli_select_db($Link,"student")
or die("选择数据库失败");
//获取输入的信息
mysqli_query($Link,"delete from studentinfo where id = '{$values->id}'");
?>

