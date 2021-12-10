<?php
include 'session.php';
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
<?php 
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
        </tr></table></td></tr>
  <tr>
    <td><table id="subtree1" style="DISPLAY: " width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="6"><img src="../images/spacer.gif" width="1" height="1" /></td>
        </tr>
        <tr>
          <td height="33"><div align="center" class="left-font02">
            <div align="center">
              <p>使用说明</p>
              <p align="left">宿舍管理系统是现代教学管理中不可缺少的部分,它的内容对于学校的决策者和管理者来说至关重要,</p>
              <p align="left">宿舍管理系统能够为用户提供全面的信息和快捷的查询平台。传统的人工方式管理学籍方式不能有效、</p>
              <p align="left">快捷的提供各项查询服务.这种人工管理方式存在着许多缺点,如:效率低、</p>
              <p align="left">保密性差,另外时间一长,将产生大量的文件和数据,这对于查找、更新和维护都带来了不少的困难。</p>
              <p align="left">随着科学技术的不断提高,软件不断被人们开发， <br />
                强大的功能已为人们深刻认识,它已进入人类社会的各个领域并发挥着越来越重要的作用。 <br />
                作为计算机应用的一部分,使用计算机对学生学籍信息进行管理,具有着手工管理所无法比拟的优点.例如:检索迅速、</p>
              <p align="left">查找方便、可靠性高、存储量大、保密性好、寿命长、成本低等。这些优点能够极大地提高学生学籍管理的效率,</p>
              <p align="left">也是高校科学化、正规化管理的一种新型教学模式。 </p>
              <p align="left">本人通过几天的努力奋斗！终于完成了针对一般宿舍 管理系统的系统。由时间短很多地方没有的到完善， 敬请提出宝贵意见！</p>
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
