<?php
include 'session.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD usernameTML 1.0 Transitional//EN" "http://www.w3.org/TR/usernametml1/DTD/usernametml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/usernametml">
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

<body><?php 
	include("db_conn.php");
    $query="select * from admin where username='$_SESSION[username]'";
	$result=mysql_query($query); 
    $row = mysql_fetch_array($result);

?> 

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  
  <tr>
    <td height="30">      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="62" background="../images/nav04.gif">
            
		   <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
		    <tr>
			  <table width="891" border="0" class="top-font01">
                  <tr>
                    <td width="45" height="39" class="button">身份:</td>
                    <td width="50" class="button"><?php echo($row["list"]);?></td>
                    <a onClick="window.close();""></a></td>
                    <td width="296" class="button"><a href="#" onClick="sousuo()"id="navmenu">

 <script language="javascript" type="text/javascript" src="time.js"></script>
</a></td>
                  </tr>
                </table>	
		    </tr>
          </table>
        
    </table></td></tr>
  <tr>
    <td><table id="subtree1" style="DISPLAY: " width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td>
<?php
        include("db_conn.php");
      
		$query="select * from admin where username='$_SESSION[username]'";
		$result=mysql_query($query);
		$my_row = mysql_fetch_array($result);
		         $_SESSION["pwd1"] =$my_row[2];
		?>
<link href="../css/style.css" rel="stylesheet" type="text/css" />

	<form name="form1" method="post" action="password_s.php" onSubmit="return ee()">
      <table width="" border="0" align="center" class="select_tr">
        <tr>
          <td width="134" align="right" class="button">   旧密码</td>
          <td width="144" class="ctxt"><input name="jpwd" type="password" id="jpwd" size="20"></td>
        </tr>
        <tr>
          <td width="134" align="right" class="button">  新密码</td>
          <td class="ctxt"><input name="xpwd" type="password" id="xpwd" size="20"></td>
        </tr>
        <tr>
          <td width="134" align="right" class="button">确定密码</td>
          <td class="ctxt"><input name="chpwd" type="password" id="chpwd" size="20"></td>
        </tr>
         <tr>
          <td width="134" class="button"></td>
          <td class="ctxt"><input type="submit" name="Submit" value="确定"><input type="reset" name="reset" value="重置"></td>
        </tr>
      </table>
      <p class="gfont">&nbsp;</p>
	</form>
</td>
  </tr>
  <script language="javascript">
  function ee(){
  if(document.form1.jpwd.value.length<1)
        {
          alert("您输入的旧密码不正确!");
          return false;
        }
         
         
         if(document.form1.xpwd.value.length<2)
       {
         alert("您输入的新密码少于2位!");
        return false;
        }
		if(document.form1.chpwd.value.length<2)
        {
          alert("您输入的确定密码少于2位!");
          return false;
        }
		
		
		if(document.form1.chpwd.value!=document.form1.xpwd.value)
       {
          alert("您输入的新密码不等于确定密码!");
          return false;
		 
       }
	   if(document.form1.jpwd.value==document.form1.xpwd.value)
       {
          alert("新密码和旧密码不能相同");
          return false;
       }
                }
  </script>
  <tr><td height="20" align="center" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
</tr>
      <table width="900" height="13" border="0" align="center" cellpadding="0" cellspacing="0" background="img/未标题-1.jpg">
  <tr>
    <td width="450" height="13" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td width="450" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
</table>
</body>
</html>

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
