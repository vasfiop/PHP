<?php
//需要执行的SQL语句(这里是修改数据功能)
$id=$_POST["id"];
$name=$_POST["name"];
$sex=$_POST["sex"];
$mobi=$_POST["mobi"];
$email=$_POST["email"];
$addr=$_POST["addr"];
$sql = "UPDATE `list` SET  
                `name`  = '$name',
                `sex`     = '$sex',
                `mobi`   = '$mobi',
                `email`   = '$email',
                `addr`    = '$addr'
                
                WHERE `list`.`id` ='$id'";

//调用conn.php文件，执行数据库操作                
require('conn.php'); 

//显示操作提示，注意$result也是conn.php里的哦
if($result)
{
        echo '恭喜，修改成功！<p>';
}
?>
[<a href="show.php">查看通讯录</a>]　[<a href="input.php">继续添加</a>]
