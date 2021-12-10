<?php 
include ("session.php");
include("db_conn.php");
mysql_query("set names 'GBK'");
if (isset($_POST['Submit'])){
$xh=$_REQUEST["xh"];
$yy=$_REQUEST["yy"];
$c=$_REQUEST["c"];
$wl=$_REQUEST["wl"];
$gs=$_REQUEST["gs"];
$jd=$_REQUEST["jd"];

$ly=$_REQUEST["ly"];



$query="insert into pfb values ('','$xh','$yy','$c','$wl','$gs','$jd','$ly')";
$result=mysql_query($query);
if(mysql_query($result))
	{
		echo("<script language='javascript'>alert('失败，请联系管理员 ！');window.location.href='user_xinxi.php';</script>");
		exit();
	}
	else
	{
	echo("<script language='javascript'>alert('评分录入成功！');window.location.href='pf_xinxi.php';</script>");
		
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

<body>
<form action="" method="post" enctype="multipart/form-data" name="myform" >
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  
  <tr>
    <td height="30">      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="62" background="../images/nav04.gif">
            
		   <table width="470" border="0" class="top-font01">
                  <tr>
                    <td width="40" height="39" class="button">身份:</td>
                    <td width="42" class="button"><?php echo($row["username"]);?></td>
                    <td width="76" class="button">当前时间:</td>
                    <td width="226" class="button"><a href="#" onclick="sousuo()"id="navmenu">

 <script language="javascript" type="text/javascript" src="time.js"></script>
</a></td>
                  </tr>
                </table></td>	
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
				<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
          	 
              <tr>
                <td height="40" class="font42">
				<table width="100%" border="0" cellpadding="4" cellspacing="1" bgcolor="#464646" class="newfont03">
				 <tr class="CTitle" >
                    	<td height="22" colspan="7" align="center" class="select_tr STYLE2" style="font-size:16px">评分录入</td>
                  </tr>
                  <tr bgcolor="#EEEEEE">
				    <td width="12%" align="center" height="30">寝室号</td>
                    <td width="15%"><input name="xh" class="text" id="xh" style="width:120px" size="19" /></td>
					<td width="11%">几栋</td>
                    <td width="18%"><input name="c" class="text" id="c" style="width:120px" size="19" /></td>
					<td width="10%">评分结果</td>
					<td width="34%" colspan="2"><input name="wl" class="text" id="wl" style="width:120px" size="19" /></td>
					</tr>
                  <tr bgcolor="#FFFFFF">
				    <td width="12%" height="20"><div align="center">评分时间</div></td>
                    <td ><input name="gs" class="text" id="gs" style="width:120px" size="19" /></td>
					<td>评分人</td>
                    <td><input name="jd" class="text" id="jd" style="width:120px" size="19" /></td>
                    <td>录入人</td>
                    <td colspan="2"><input name="ly" class="text" id="ly" style="width:120px" size="19" />                    </td>
                    </tr>
                  <tr bgcolor="#FFFFFF">
                    <td height="20"><div align="center">备注</div></td>
                    <td colspan="6" ><input name="yy" class="text" id="yy" style="width:120px" size="19" /></td>
                    </tr>
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
      </table></td>
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