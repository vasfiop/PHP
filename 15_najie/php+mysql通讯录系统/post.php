<?php
//���ñ�����
$name  = $_POST["name"];
$sex     = $_POST["sex"];
$mobi   = $_POST["mobi"];
$email   = $_POST["email"];
$addr    = $_POST["addr"];

//��Ҫִ�е�SQL���(�����ǲ������ݹ���)
$sql = "INSERT INTO `list`
                (`name` , `sex` , `mobi` , `email` , `addr` ) 
                VALUES
                ('$name', '$sex', '$mobi', '$email', '$addr')";

//����conn.php�ļ��������ݿ����
require('conn.php');

//��ʾ�����ɹ���Ϣ��ע�⣺$result������conn.php�ļ��У������ó���
if($result)
{
        echo '��ϲ�������ɹ���<p>';
}
?>
[<a href="show.php">�鿴ͨѶ¼</a>]��[<a href="input.php">�������</a>]
