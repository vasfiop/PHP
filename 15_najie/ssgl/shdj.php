<?php 
include("db_conn.php");
mysql_query("set names 'gbk'");
if (isset($_POST['Submit'])){
$xh=$_REQUEST["xh"];
$xm=$_REQUEST["xm"];
$jd=$_REQUEST["jd"];
$lb=$_REQUEST["lb"];
$qsh=$_REQUEST["qsh"];
$jrj=$_REQUEST["jrj"];
$yy=$_REQUEST["yy"];
$c=$_REQUEST["c"];

$query="insert into shdj values ('','$xh','$xm','$jd','$lb','$qsh','$jrj','$yy','$c')";
$result=mysql_query($query);
if(mysql_query($result))
{
echo("<script language='javascript'>alert('失败，请联系管理员 ！');window.location.href='shdj.php';</script>");
exit();
}
else
{
echo("<script language='javascript'>alert('添加成功！');window.location.href='index.php';</script>");

exit(); 
} 
}


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

<link href="../css/css.css" rel="stylesheet" type="text/css" />
<script type="text/JavaScript">

</script>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.STYLE2 {color: #330000}
-->
</style></head>


<body>
<form action="" method="post" enctype="multipart/form-data" name="myform" >

<tr>
<td height="30"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td height="62" background="">

<table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td width="144" align="left"></td> 
</tr>
</table>
</td>
</tr>
</table></td></tr>
<tr>
<td><table id="subtree1" style="DISPLAY: " width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td><table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">

<tr>
<td height="40" class="font42">
<table width="1000" border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#464646" class="newfont03">
<tr class="CTitle" >
<td height="22" colspan="3" align="center" class="select_tr STYLE2" style="font-size:16px">寝室损坏登记</td>
</tr>
<tr bgcolor="#EEEEEE">
<td width="9%" align="center" height="14">学号</td>
<td colspan="2"><label>
  <input type="text" name="xh"  id="xh"/>
</label></td>
</tr>
<tr bgcolor="#EEEEEE">
  <td align="center" height="15">姓名</td>
  <td colspan="2"><input type="text" name="xm"  id="xm"/></td>
</tr>
<tr bgcolor="#EEEEEE">
  <td align="center" height="30">几栋</td>
  <td colspan="2"><input type="text" name="jd" id="jd" /></td>
</tr>
<tr bgcolor="#EEEEEE">
  <td align="center" height="30">寝室类别</td>
  <td colspan="2"><input type="text" name="lb" id="lb" /></td>
</tr>
<tr bgcolor="#EEEEEE">
  <td align="center" height="30">寝室号</td>
  <td colspan="2"><input type="text" name="qsh" id="qsh" /></td>
</tr>
<tr bgcolor="#EEEEEE">
  <td align="center" height="30">几人间</td>
  <td colspan="2"><input type="text" name="jrj" id="jrj" /></td>
</tr>
<tr bgcolor="#FFFFFF">
<td width="9%" height="20"><div align="center">登记内容</div></td>
<td colspan="2" rowspan="2" ><label>
<textarea name="yy" id="yy"cols="70" rows="10"></textarea>
</label></td>
</tr>
<tr bgcolor="#FFFFFF">
<td><div align="center"></div></td>
</tr>

<tr bgcolor="#FFFFFF">
<td height="20"><div align="center">登记时间</div></td>
<td colspan="2" ><label>
<input type="text" name="c" id="c"/>
</label></td>
</tr>
<tr bgcolor="#FFFFFF">
<td height="20" colspan="3"><div align="center">
<input name="Submit" type="submit" value="提交" />
<input name="Submit2" type="reset" value="重置" />
</div></td>
</tr>
</table></td>
</tr>
</table>
</td>
</tr>
</table>
</form>
</body>
</html>