<?php
include 'session.php';
include("db_conn.php");
$xh=$_GET["xh"];
mysql_query("set names 'GBK'");
if (isset($_POST['Submit'])){
$sql = "UPDATE `bl_db`.`chengji` SET `yy` = '".$_POST[yy]."',
`c` = '".$_POST[c]."',
 WHERE `chengji`.`xh` ='".$xh."'  LIMIT 1 ;


";
$result = mysql_query($sql);
if(mysql_query($result))
	{
		echo("<script language='javascript'>alert('失败，请联系管理员 ！');window.location.href='chengji_xinxi.php';</script>");
		exit();
	}
	else
	{
		echo("<script language='javascript'>alert('恭喜您， 修改成功！');window.location.href='chengji_xinxi.php';</script>");
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
include("db_conn.php");
$xh=$_GET["xh"];
$sql="select * from chengji where xh='$xh'";
$query=mysql_query($sql);
if($row = mysql_fetch_array($query)) {   
?>
<form action="" method="post" enctype="multipart/form-data" name="myform" >
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  
  <tr>
    <td height="30">      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="62" background="../images/top11.gif">
            
		   <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
		    <tr>
			  <td width="144" align="left"></td>	
		    </tr>
          </table>
		   <table width="428" border="0">
             <tr>
               <td width="41">身份:</td>
               <td width="55"><span class="button"></span></td>
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
                    	<td height="22" colspan="7" align="center" class="select_tr STYLE2" style="font-size:16px">寝室修改</td>
                  </tr>
                  <tr bgcolor="#EEEEEE">
				    <td width="12%" align="center" height="30">寝室号</td>
                    <td width="19%"><?php echo($row["xh"]);?></td>
                    <td width="7%">类别</td>
                    <td width="19%"><input name="yy" class="text" id="yy" value="<?php echo($row["yy"]);?>"style="width:150px" size="50" /></td>
					<td width="9%">几栋</td>
					<td width="19%"><input name="c" class="text" id="c" value="<?php echo($row["c"]);?>"style="width:150px" size="50" /></td>
					<td width="15%">&nbsp;</td>
                    </tr>
                  <tr bgcolor="#FFFFFF">
				    <td width="12%" height="20">&nbsp;</td>
				    <td >&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>                    
                    </tr>
                  <tr bgcolor="#FFFFFF">
                    <td height="20">&nbsp;</td>
                    <td >&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td></tr>
                  <tr bgcolor="#FFFFFF">
                    <td height="20" colspan="7">
                      <div align="center">
                        <input type="submit" name="Submit" value="提交" />
                        <input type="reset" name="Submit2" value="重置" />
                        </div></td>
                    </tr>
            </table>
				</td>
        </tr>
      </table>
 <?php
}
?>
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
