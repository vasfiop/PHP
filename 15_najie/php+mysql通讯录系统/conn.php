<?php
//�������ݿ����
$db_host   = 'localhost';  //���ݿ��������ƣ�һ�㶼Ϊlocalhost
$db_user   = 'root';        //���ݿ��û��ʺţ����ݸ����������
$db_passw = '';   //���ݿ��û����룬���ݸ����������
$db_name  = 'gps2';         //���ݿ�������ƣ��ԸղŴ��������ݿ�Ϊ׼

//�������ݿ�
$conn = mysql_connect($db_host,$db_user,$db_passw) or die ('���ݿ�����ʧ�ܣ�');

//�����ַ�������utf8��gbk�ȣ��������ݿ���ַ�������
mysql_query("set character set 'gbk_bin'");

//ѡ�����ݿ�
mysql_select_db($db_name,$conn) or die('���ݿ�ѡ��ʧ�ܣ�');

//ִ��SQL���(��ѯ)
$result = mysql_query($sql) or die('���ݿ��ѯʧ�ܣ�');
?>
