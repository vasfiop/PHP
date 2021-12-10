<?php
include("db_conn.php");
$xh=$_GET["xh"];
include 'session.php';
include("db_conn.php");
$xh=$_GET["xh"];
mysql_query("set names 'gbk'");
if (isset($_POST['Submit'])){
$sql = "UPDATE `user` SET `username` = '".$_POST['username']."',
`bj` = '".$_POST['bj']."',
`jg` = '".$_POST['jg']."',
`sfzh` = '".$_POST['sfzh']."',
`csly` = '".$_POST['csly']."',
`zymc` = '".$_POST['zymc']."',
`addss` = '".$_POST['addss']."',
`tel` = '".$_POST['tel']."',
`sex` = '".$_POST['sex']."',
`list` = '".$_POST['list']."',
`mz` = '".$_POST['mz']."',
`xb` = '".$_POST['xb']."',
`lb` = '".$_POST['lb']."' WHERE `user`.`xh` ='".$xh."' LIMIT 1 ;";


$result = mysql_query($sql);
if(mysql_query($result))
	{
		echo("<script language='javascript'>alert('失败，请联系管理员 ！');window.location.href='user_xinxi.php';</script>");
		exit();
	}
	else
	{
		echo("<script language='javascript'>alert('恭喜您， 修改成功！');window.location.href='user_xinxi.php';</script>");
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

<?php 
	include("db_conn.php");
    $query="select * from admin where username='$_SESSION[username]'";
	$result=mysql_query($query); 
    $row = mysql_fetch_array($result);

?>
<body><?php

$sql="select * from user where xh='$xh'";
$query=mysql_query($sql);
if($row = mysql_fetch_array($query)) {   
?>
<form action="" method="post" enctype="multipart/form-data" name="myform" >
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  
  <tr>
    <td height="30">      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="62" background="../images/nav04.gif">
            
		   <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
		    <tr>
			  <td width="144" align="left"></td>	
		    </tr>
          </table>
		   <table width="428" border="0">
             <tr>
               <td width="41">身份:</td>
               <td width="55"><span class="button"><?php echo($row["list"]);?></span></td>
               <td width="318"><a href="#" onclick="sousuo()"id="navmenu">

 现在时间：
     <script language="javascript" type="text/javascript" src="time.js"></script>
</a></td>
             </tr>
           </table></td>
        </tr>
    </table></td></tr>
  <tr>
    <td><table id="subtree1" style="DISPLAY: " width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
          	 
              <tr>
                <td height="40" class="font42">
				<table width="100%" border="0" cellpadding="4" cellspacing="1" bgcolor="#464646" class="newfont03">
				 <tr class="CTitle" >
                    	<td height="22" colspan="7" align="center" class="select_tr STYLE2" style="font-size:16px">信息修改</td>
                  </tr>
                  <tr bgcolor="#EEEEEE">
				    <td width="9%" align="center" height="30">学号</td>
                    <td width="17%"><?php echo($row["xh"]);?></td>
                    <td width="13%">身份证号</td>
                    <td width="17%"><input name="sfzh" class="text" id="sfzh" value="<?php echo($row["sfzh"]);?>"style="width:150px" size="19" /></td>
					<td>类别</td>
					<td><input name="lb" type="text" class="text" id="lb" value="<?php echo($row["lb"]);?>" style="width:150px" size="50" /></td>
					<td width="16%"><div align="center">照片</div></td>
					</tr>
                  <tr bgcolor="#FFFFFF">
				    <td width="9%" height="20"><div align="center">姓名</div></td>
                    <td ><input name="username" class="text" id="username" value="<?php echo($row["username"]);?>"style="width:150px" size="50" /></td>
					<td>出生年月</td>
                    <td><input name="csly" class="text" id="csly" value="<?php echo($row["csly"]);?>"style="width:150px" size="50" /></td>
                    <td>身份</td>
					
					
					
					
                    <td><input name="list" type="text" class="text" id="list"value="<?php echo($row["list"]);?>" style="width:150px" size="50" /></td>
                    <td rowspan="2">                  </tr>
				  <tr bgcolor="#FFFFFF">
				    <td height="20"><div align="center">性别</div></td>
                    <td ><input name="sex" type="text" class="text" id="sex"value="<?php echo($row["sex"]);?>" style="width:150px" size="50" />                      </td>
					<td>专业名称</td>
                    <td><input name="zymc" type="text" class="text" id="zymc"value="<?php echo($row["zymc"]);?>" style="width:150px" size="50" /></td>
                    <td width="8%">民族</td>
                    <td width="20%"><input name="mz" type="text" class="text" id="mz"value="<?php echo($row["mz"]);?>" style="width:150px" size="50" /></td>
				  </tr>
				  <tr bgcolor="#FFFFFF">
				    <td height="20"><div align="center">班级</div></td>
                    <td ><input name="bj" type="text" class="text" id="bj" value="<?php echo($row["bj"]);?>"style="width:150px" size="50" /></td>
					<td>家庭地址</td>
                    <td><input name="addss" type="text" class="text" id="addss" value="<?php echo($row["addss"]);?>" style="width:150px" size="100" /></td>
                    <td>系别</td>
                    <td><input name="xb" type="text" class="text" id="xb"value="<?php echo($row["xb"]);?>" style="width:150px" size="50" /></td>
                    <td>&nbsp;</td>
				  </tr>
				  <tr bgcolor="#FFFFFF">
				    <td height="20"><div align="center">籍贯</div></td>
                    <td ><input name="jg" type="text" class="text" id="jg" value="<?php echo($row["jg"]);?>" style="width:150px" size="50" /></td>
					<td>联系号码</td>
                    <td><input name="tel" type="text" class="text" id="tel"value="<?php echo($row["tel"]);?>" style="width:150px" size="50" /></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
				  <tr bgcolor="#FFFFFF">
				    <td height="20" colspan="7"><div align="center">
				      <input name="Submit" type="submit" value="提交" />
				      <input name="Submit2" type="reset" value="重置" />
				    </div></td>
                    </tr>
<?php
}
?>     </table></td>
        </tr>
      </table>
      <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="6"><img src="../images/spacer.gif" width="1" height="1" /></td>
        </tr>
        <tr>
          <td height="33">&nbsp;</td>
        </tr>
      </table></td>
  </tr>
</table>
</form>
</body>
</html>
