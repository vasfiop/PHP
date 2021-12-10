<title>无标题文档</title>
<style type="text/css">
<!--
.STYLE8 {font-family: "新宋体"; color: #333333; font-size: 14px; }
.STYLE9 {
	color: #FF0000;
	font-size: 14px;
}
.STYLE11 {
	font-size: 14px;
	font-family: "楷体_GB2312";
	color: #000000;
}
body {
	background-color: #FFFFFF;
}
.STYLE13 {color: #FF0000}
-->
</style><style type="text/css">
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
</style>
<link href="css.css" rel="stylesheet" type="text/css">
</head>

<body><table width="1000" height="150" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="left" valign="top"><img src="tp/top.jpg" width="1000" height="150" /></td>
  </tr>
</table>
<table width="1000" height="20" bgcolor="#CCCCCC" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF">
  <tr>
    <td width="90"><div align="center"><span class="STYLE8">首页</span></div></td>
    <td width="90"><div align="center"><span class="STYLE8">寝室查询</span></div></td>
    <td width="90"><div align="center"><span class="STYLE8">班级查询</span></div></td>
    <td width="90"><div align="center" class="STYLE8">文明寝室</div></td>
    <td width="90"><div align="center" class="STYLE8">寝室损坏</div></td>
    <td width="90"><div align="center" class="STYLE8">损坏登记</div></td>
    <td width="90"><div align="center" class="STYLE8">评分录入</div></td>
    <td width="90"><div align="center" class="STYLE8">个人资料</div></td>
    <td width="90"><div align="center" class="STYLE8">留言板</div></td>
    <td width="90"><div align="center" class="STYLE8">管理制度</div></td>
    <td width="90"><div align="center" class="STYLE8">注销系统</div></td>
  </tr>
</table><table width="1000" height="400" border="0" align="center" cellpadding="0" cellspacing="0" class="border2">
  <tr>
    <th scope="col" align="left" valign="top"><table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" class="font201">
      <tr>
        <th scope="col" width="142" height="35">&nbsp;</th>
        <th scope="col" width="855"><a href="lyb_add.php">发表留言</a></th>
      </tr>
	  <?php
		include("db_conn.php");
		$sql="select * from users";
		$result=mysql_query($sql);
		while($row=mysql_fetch_array($result)){
		?>
      <tr>
        <td height="20" align="right" class="bk">用户名：</td>
        <td class="bk1">&nbsp;<?php echo $row["name"];?></td>
      </tr>
      <tr>
        <td height="20" align="right" class="bk">留言标题：</td>
        <td class="bk1">&nbsp;<?php echo $row["bt"];?></td>
      </tr>
      <tr>
        <td height="20" align="right" class="bk">Email：</td>
        <td class="bk1">&nbsp;<?php echo $row["email"];?></td>
      </tr>
      <tr>
        <td align="right" valign="middle" class="bk2">留言内容：</td>
        <td class="bk3">&nbsp;<?php echo $row["nr"];?></td>
      </tr>
	  <tr>
	  <td height="15"></td>
	  <td height="15"></td>
	  <?php
	  }
	  ?>
    </table></th>
  </tr>
</table>
<?
	require("tp.php") 
	?>
</table>
</body>
</html>
