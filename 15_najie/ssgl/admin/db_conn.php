<?php
$lnk = mysql_connect('localhost', 'root', '') or die ('Not connected : ' . mysql_error());
mysql_select_db('bl_db', $lnk) or die ('Can\'t use bl_db : ' . 
mysql_error());
mysql_query("set names 'gbk'");
?>