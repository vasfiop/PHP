<?php 
include ("session.php");
include("db_conn.php");
mysql_query("set names 'gbk'");
if (isset($_POST['Submit'])){
$xh=$_REQUEST["xh"];
$zy=$_REQUEST["zy"];
$bj=$_REQUEST["bj"];
$c=$_REQUEST["c"];

$query="insert into bjgl values ('','$xh','$zy','$bj','$c')";
$result=mysql_query($query);
if(mysql_query($result))
	{
		echo("<script language='javascript'>alert('ʧ�ܣ�����ϵ����Ա ��');window.location.href='xib.php';</script>");
		exit();
	}
	else
	{
	echo("<script language='javascript'>alert('���ӳɹ���');window.location.href='xib.php';</script>");
		
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
	font-family: "����";
	font-size: 9px;
	color: #555555;
	text-decoration: none;
	text-align: center;
}
.font051 {font-family: "����";
	font-size: 12px;
	color: #333333;
	text-decoration: none;
	line-height: 20px;
}
.font201 {font-family: "����";
	font-size: 12px;
	color: #FF0000;
	text-decoration: none;
}
.button {
	font-family: "����";
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
               <td width="41">����:</td>
               <td width="55"><span class="button"></span></td>
               <td width="318"><a href="#" onclick="sousuo()"id="navmenu">

 ����ʱ�䣺
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
                    	<td height="22" colspan="2" align="center" class="select_tr STYLE2" style="font-size:16px">ϵ������</td>
                  </tr>
                  <tr bgcolor="#EEEEEE">
				    <td align="center"><div align="left">ϵ��
				      <input name="xh" class="text" id="xh" style="width:150px" size="50" />
				      </div></td>
                    <td align="center"><label>
                      <div align="left">ר&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ҵ
                        <input type="text" name="zy" />
                      </div>
                      </label></td>
                  </tr>
                  <tr bgcolor="#EEEEEE">
                    <td align="center"><label></label>
                      <div align="left">�༶
                        <label>
                        <input type="text" name="bj" />
                        </label>
                      </div></td>
                    <td align="center"><div align="left">����ʱ��
                      <label>
                      <input type="text" name="c" />
                      </label>
                    </div></td>
                  </tr>
                  
				  
				  
				  <tr bgcolor="#FFFFFF">
				    <td colspan="2"><label></label>				      <div align="center">
				        <input name="Submit" type="submit" value="�ύ" />
				        <input name="Submit2" type="reset" value="����" />
			            </div></td>
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
