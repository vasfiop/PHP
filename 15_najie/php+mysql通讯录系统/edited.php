<?php
//��Ҫִ�е�SQL���(�������޸����ݹ���)
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

//����conn.php�ļ���ִ�����ݿ����                
require('conn.php'); 

//��ʾ������ʾ��ע��$resultҲ��conn.php���Ŷ
if($result)
{
        echo '��ϲ���޸ĳɹ���<p>';
}
?>
[<a href="show.php">�鿴ͨѶ¼</a>]��[<a href="input.php">�������</a>]
