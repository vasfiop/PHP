<?php
include("session.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<link href="css.css" rel="stylesheet" type="text/css" />
<title>管理留言</title>
</head>

<body>
<table width="700" height="25" border="0" cellpadding="0" cellspacing="0" class="border1">
  <tr>
    <th scope="col" align="center" valign="middle" class="lj"><div align="left"><a href="index.php">查看留言</a>|<a href="add.php">发表留言</a>|<a href="admin.php">回复留言</a></div></th>
  </tr>
</table>
<table width="700" height="400" border="0" cellpadding="0" cellspacing="0" class="border2">
  <tr>
    <th scope="col" align="left" valign="top"><table width="680" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <th scope="col" height="20"></th>
      </tr>
    </table>
	<table width="680" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="80" height="25" align="center" class="bk" scope="col">姓名</td>
        <td width="120" align="center" class="bk" scope="col">留言标题</td>
        <td width="120" align="center" class="bk" scope="col">Email</td>
        <td width="280" align="center" class="bk" scope="col">留言内容</td>
        <td width="40" align="center" class="bk" scope="col">编辑</td>
        <td width="40" align="center" class="bk1" scope="col">删除</td>
      </tr>
	  <?php
	  	include("db_conn.php");
		$sql="select * from users";
		$result=mysql_query($sql);
		while($row=mysql_fetch_array($result)){
	  ?>
      <tr>
        <td width="80" height="20" class="bk2" align="left">&nbsp;<?php echo $row["name"];?></td>
        <td class="bk2" align="left">&nbsp;<?php echo $row["bt"];?></td>
        <td class="bk2" align="left">&nbsp;<?php echo $row["email"];?></td>
        <td class="bk2" align="left">&nbsp;<?php echo $row["nr"];?></td>
        <td class="bk2" align="center"><a href="liub_edit.php?name=<?php echo $row["name"];?>"><img src="images/edit-sml.jpg" border="0"/></a></td>
        <td class="bk3" align="center"><a href="liub_del.php?name=<?php echo $row["name"];?>" onclick="return confirm('您真的要删除留言吗？');"><img src="images/del-sml.jpg" border="0" /></a></td>
      </tr>
	  <?php
	  }
	  ?>
    </table>
	</th>
  </tr>
</table>
</body>
</html>
