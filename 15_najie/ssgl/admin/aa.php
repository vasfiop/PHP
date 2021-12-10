<?php
$conn=mysql_connect("localhost","root","")or die('no');
mysql_select_db('bl_db');
  
  $sql="select * from admin where username='$_SESSION[username]'";
  $row=mysql_query($sql);
  $num=mysql_num_rows($row);
if($num!=0){
echo "1";
}
else
echo "0";
?>