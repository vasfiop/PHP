<?php session_start(); include("conn/conn.php");
if($_SESSION[admin_user]==true){
if($_GET[fahuo_id]==true){
$query="delete from tb_car_log where fahuo_id='$fahuo_id'";
$result=mysql_query($query);

$query="update tb_shopping set fahuo_ys='1' where fahuo_id='$fahuo_id' ";
$result=mysql_query($query);

  echo "<script>alert('������ִ������ɹ�!');window.location.href='indexs.php?lmbs=��ִ������ȷ��';</script>"; 
}

if($delete==true){
$query="delete from tb_shopping where id='$delete'";
$result=mysql_query($query);
  echo "<script>alert('������ɾ���ɹ�!');window.location.href='indexs.php?lmbs=��������ѯ';</script>"; 
}
}else{
echo "<script>alert('������ȷ��¼��'); window.location.href='index.php';</script>";
}

?>