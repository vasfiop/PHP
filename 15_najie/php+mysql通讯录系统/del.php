<?php
//��Ҫִ�е�SQL���(������ɾ�����ݹ���)
$id=$_GET["id"];
$sql = "DELETE FROM `list` WHERE `id`='$id'";

//����conn.php�ļ���ִ�����ݿ����                
require('conn.php'); 

//��ʾ������ʾ��ע��$resultҲ��conn.php���Ŷ
if($result)
{
        echo '��ϲ��ɾ���ɹ���<p>';
}
?>
[<a href="show.php">�鿴ͨѶ¼</a>]��[<a href="input.php">�������</a>]

