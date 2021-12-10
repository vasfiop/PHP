<?php
//设置表单变量
$name  = $_POST["name"];
$sex     = $_POST["sex"];
$mobi   = $_POST["mobi"];
$email   = $_POST["email"];
$addr    = $_POST["addr"];

//需要执行的SQL语句(这里是插入数据功能)
$sql = "INSERT INTO `list`
                (`name` , `sex` , `mobi` , `email` , `addr` ) 
                VALUES
                ('$name', '$sex', '$mobi', '$email', '$addr')";

//调用conn.php文件进行数据库操作
require('conn.php');

//提示操作成功信息，注意：$result存在于conn.php文件中，被调用出来
if($result)
{
        echo '恭喜，操作成功！<p>';
}
?>
[<a href="show.php">查看通讯录</a>]　[<a href="input.php">继续添加</a>]
