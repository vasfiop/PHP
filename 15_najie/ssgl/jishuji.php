<?php
include("session.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title></title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.tabfont01 {	
	font-family: "宋体";
	font-size: 9px;
	color: #555555;
	text-decoration: none;
	text-align: center;
}
.font051 {font-family: "宋体";
	font-size: 12px;
	color: #333333;
	text-decoration: none;
	line-height: 20px;
}
.font201 {font-family: "宋体";
	font-size: 12px;
	color: #FF0000;
	text-decoration: none;
}
.button {
	font-family: "宋体";
	font-size: 14px;
	height: 37px;
}
html { overflow-x: auto; overflow-y: auto; border:0;} 
-->
</style>

<link href="css/css.css" rel="stylesheet" type="text/css" />
<script type="text/JavaScript">

</script>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.STYLE2 {color: #330000}
-->
</style></head>


<body><?php 
	include("db_conn.php");
    $query="select * from user where xh='$_SESSION[xh]'";
	$result=mysql_query($query); 
    $row = mysql_fetch_array($result);

?> 
<form action="add_s.php" method="post" enctype="multipart/form-data" name="myform" >
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  
  <tr>
    <td height="30">      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="62" background="images/nav04.gif">
            
		   <table width="891" border="0" class="top-font01">
                  <tr>
                    <td width="45" height="39" class="button">姓名:</td>
                    <td width="47" class="button"><?php echo($row["username"]);?></td>
                    <td width="45" class="button">系别:</td>
                    <td width="60" class="button"><?php echo($row["xb"]);?></td>
                    <td width="41" class="button">班级</td>
                    <td width="100" class="button"><?php echo($row["bj"]);?></td>
                    <td width="42" class="button">专业:</td>
                    <td width="177" class="button"><?php echo($row["zymc"]);?><a onclick="window.close();""></a></td>
                    <td width="296" class="button"><a href="#" onclick="sousuo()"id="navmenu">

 <script language="javascript" type="text/javascript" src="time.js"></script>
</a></td>
                  </tr>
                </table></td>
        </tr><?php 
	include("db_conn.php");
    $query="select * from chengji where xh='$_SESSION[xh]'";
	$result=mysql_query($query); 
    $row = mysql_fetch_array($result);

?> 
    </table></td></tr>
  <tr>
    <td><table id="subtree1" style="DISPLAY: " width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="6"><img src="images/spacer.gif" width="1" height="1" /></td>
        </tr>
        <tr>
          <td height="33"><div align="center" class="left-font02">
            <div align="center">
              <p>现在不是报名时间!</p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
            </div>
          </div></td>
        </tr>
      </table></td>
  </tr>
</table>
</form>
</body>
</html>
