<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<link href="css.css" rel="stylesheet" type="text/css" />
<title>添加留言</title>
<script language="javascript">
function hh()
{
	document.getElementById("act").value="add";
	document.getElementById("form1").submit();
}
</script>
</head>

<body>
<?php
include("conn.php");
$act=@$_POST["act"];
$name=@$_POST["name"];
$bt=@$_POST["bt"];
$email=@$_POST["email"];
$nr=@$_POST["nr"];
if($act=="add")
{
	$sql="insert into users values('$name','$bt','$email','$nr')";
	$result=mysql_query($sql);
	echo "<script language='javascript'>window.location.href='index.php'</script>";
}
?>
<table width="700" height="120" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <th scope="col" align="left" valign="top"><img src="images/header.jpg" width="700" height="120" /></th>
  </tr>
</table>
<table width="700" height="25" border="0" cellpadding="0" cellspacing="0" class="border1">
  <tr>
    <th scope="col" align="center" valign="middle" class="lj"><a href="index.php">查看留言</a>|<a href="add.php">发表留言</a>|<a href="admin.php">管理留言</a></th>
  </tr>
</table>
<table width="700" height="400" border="0" cellpadding="0" cellspacing="0" class="border2">
  <tr>
    <th scope="col" align="left" valign="top"><table width="650" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <th scope="col" height="20">&nbsp;</th>
      </tr>
      <tr>
        <td height="360" align="left" valign="top"><form id="form1" name="form1" method="post" action="add.php">
          <table width="650" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <th scope="col" width="100" height="35">&nbsp;</th>
              <th scope="col" width="550">添加留言</th>
            </tr>
            <tr>
              <td height="20" align="right" class="bk">用户名：</td>
              <td align="left" class="bk1"><label>
                <input type="text" name="name" />
              </label></td>
            </tr>
            <tr>
              <td height="20" align="right" class="bk">留言标题：</td>
              <td align="left" class="bk1"><label>
                <input type="text" name="bt" />
              </label></td>
            </tr>
            <tr>
              <td height="20" align="right" class="bk">Email：</td>
              <td align="left" class="bk1"><label>
                <input type="text" name="email" />
              </label></td>
            </tr>
            <tr>
              <td align="right" valign="middle" class="bk2">留言内容：</td>
              <td align="left" class="bk3"><label>
                <textarea name="nr" cols="60" rows="15"></textarea>
              </label></td>
            </tr>
            <tr>
              <td height="20" align="right">&nbsp;</td>
              <td align="left"><label>
                <input type="button" name="Submit" value="提交" onclick="hh()" />
                <input type="reset" name="Submit2" value="重写" />
				<input type="hidden" name="act" value="act" />
              </label></td>
            </tr>
          </table>
                </form>
        </td>
      </tr>
      <tr>
        <td height="20">&nbsp;</td>
      </tr>
    </table></th>
  </tr>
</table>
<table width="700" height="100" border="0" cellpadding="0" cellspacing="0" class="border">
  <tr>
    <th scope="col" align="center" valign="middle">&copy;板权所有：兴义民族师范学院08级计算机科学系现代教育（3）班 </th>
  </tr>
</table>
</body>
</html>