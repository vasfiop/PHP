<?php  
header("Content-Type:text/html;charset=GB2312");  
?>
<?php
include "inc/mysql.inc.php";
include "inc/myfunction.php";
include "inc/head.php";
$folie=new mysql;
$crazy=new myfunction;
$folie->link("");
//���ձ���
$submit=$_POST["submit"];
//�û���¼��֤
if($submit=="�ύ"){
	$user_name=$_POST["user_name"];
	$query="select * from manage_info where manage_user=binary('$user_name')";	
	$rst=$folie->excu($query);
	if(mysql_num_rows($rst)>=1){
		$info=mysql_fetch_array($rst);
		$user_pw=$_POST["user_pw"];
		if($user_pw==$info["manage_pw"]){
			$_SESSION["super_name"]=$user_name;
			$_SESSION["super_tag"]="1";
			$crazy->js_alert("��½�ɹ���","super/index.php");
		}else {
			$crazy->js_alert("�û������������","login.php");
		}
	}else {
		$crazy->js_alert("�û������������","login.php");
	}
}
?>
<p>&nbsp;</p>
<form action="login.php" method="post">
<table width="40%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC" style="border-collapse:collapse">
  <tr>
    <td height="25" colspan="2" align="center">����Ա��½</td>
  </tr>
  <tr>
    <td width="32%" height="25" align="right">�û�����</td>
    <td width="68%"><input type="text" name="user_name" size="20"></td>
  </tr>
  <tr>
    <td height="25" align="right">���</td>
    <td><input type="password" name="user_pw" size="20"></td>
  </tr>
  <tr>
    <td height="25" colspan="2" align="center"><input type="submit" name="submit" value="�ύ">&nbsp;&nbsp;&nbsp;
      <input type="reset" name="submit2"  value="����" /></td>
  </tr>
</table>
</form>
<?php
include "inc/foot.php";
?>

<label></label>
