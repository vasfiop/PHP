<?php 
include ("session.php");
include("db_conn.php");
mysql_query("set names 'gbk'");
if (isset($_POST['Submit'])){
$xh=$_REQUEST["xh"];
$yy=$_REQUEST["yy"];
$c=$_REQUEST["c"];

$query="insert into zd ('','$xh','$yy','$c')";
$result=mysql_query($query);
if(mysql_query($result))
	{
		echo("<script language='javascript'>alert('失败，请联系管理员 ！');window.location.href='zd.php';</script>");
		exit();
	}
	else
	{
	echo("<script language='javascript'>alert('添加成功！');window.location.href='zd_edit.php';</script>");
		
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
.STYLE3 {font-size: 14px}
.STYLE4 {font-size: 14; }
-->
</style></head>


<body>
<form action="" method="post" enctype="multipart/form-data" name="myform" >
  
  <tr>
    <td height="30">      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="62" background="">
            
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
                    	<td colspan="3" align="center" class="select_tr STYLE2" style="font-size:16px"><h1 class="STYLE3">寝室管理制度</h1></td>
                  </tr>
                  
                  <tr bgcolor="#FFFFFF">
				    <td colspan="3"><div align="center"></div>
				      <div align="center"></div>
				      <label></label>
                      <p class="STYLE4">1、同学之间团结友爱，谦让互助，使寝室成为温暖的集体。 <br />
                        2、每个住校生都必须认真履行值日生职责，遵守住宿纪律。 <br />
                        3、节约用水用电，随手关好水龙头，不准私自安装电器(电炉、充电器、电热器等)，不准点蜡烛，不准在寝室用<br />
                        　　
                        餐。 <br />
                        4、爱护公物，禁止在墙上乱画，不准在橱门上钉钉子和装搭钩。损坏公物要赔偿。 <br />
                        5、夜自修结束后须在熄灯前返回寝室，就寝准备时间内不准下棋、打扑克、打游戏机等。 <br />
                        6、同学之间互相关心和体谅，就寝后不在室内和公共场所喧哗打闹，以免影响同学休息。 <br />
                        7、注意安全，防盗防火，不许在寝室或走廊打球、蹬墙壁，严禁爬铁栅和阳台。不准乱串寝室，特别是男女同学寝<br />
                        　　
                        室。不准擅自带通校生和外人入内。自行车按指定地点停放上锁。 <br />
                        8、讲卫生、讲文明，必须使用统一卫生纸，并按规定丢入纸篓，厕所和水池内不准倒剩饭剩菜或其他废物，禁止向<br />
                        　　
                        窗外乱扔纸屑果皮等脏物。室内严禁存放易燃、易爆等危险品，严禁饲养动物。 <br />
                      9、服从生活指导老师和管理人员的管理。 </p></td>
                    </tr>
				  
				  
				  <tr bgcolor="#FFFFFF">
				    <td width="9%" height="20"><div align="center">发布时间</div></td>
                    <td colspan="2" ><label>2011</label></td>
				  </tr>
				  <tr bgcolor="#FFFFFF">
				    <td height="20" colspan="3"><div align="center"></div></td>
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

