<?php
include "session.php";
include "../inc/mysql.inc.php";
include "../inc/myfunction.php";
include "../inc/head2.php";
$folie=new mysql;
$crazy=new myfunction;
$folie->link("");
//���ܱ���
$submit=$_POST["submit"];
//�û���¼��֤
if($submit=="�ύ"){
	$user_pw=$_POST["user_pw"];
	$user_pw1=$_POST["user_pw1"];
	$user_pw2=$_POST["user_pw2"];
	if($user_pw!="" and $user_pw1!="" and $user_pw2!="" and $user_pw1==$user_pw2){
		$query="select * from manage_info where manage_user='$_SESSION[super_name]'";
		$rst=$folie->excu($query);
		$user=mysql_fetch_array($rst);
		if ($user["manage_pw"]==$user_pw){
			$query2="update manage_info set manage_pw='$user_pw1' where manage_user='$_SESSION[super_name]'";
			$folie->excu($query2);
			$crazy->js_alert("��ϲ������ȫ���óɹ���","?");
		}else{
			$crazy->js_alert("������ľ����벻��ȷ�����������룡","?");
		}
	}else{
		$crazy->js_alert("��ȷ����������ȫ��Ϊ�գ��Һ���������һ�£�","?");
	}
}
?><table width="752" border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse">
  <tr>
    <td width="1" height="199" bgcolor="#CCCCCC"></td>
    <td colspan="2" align="center" valign="top"><h4>�� ȫ �� ��</h4>
<form id="form1" name="form1" method="post" action="?">

<table width="80%" border="1" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC" style="border-collapse:collapse">
  <tr>
    <td width="30%" height="25" align="right">ԭ���룺</td>
    <td width="70%"><input name="user_pw" type="password" id="user_pw" size="15" /></td>
  </tr>
  <tr>
    <td height="25" align="right">�����룺</td>
    <td><input type="password" name="user_pw1" size="15" /></td>
  </tr>
  <tr>
    <td height="25" align="right">�ظ����룺</td>
    <td><input type="password" name="user_pw2" size="15" /></td>
  </tr>
  <tr>
    <td height="25" colspan="2" align="center"><input type="submit" name="submit" value="�ύ" /></td>
  </tr>
</table>
</form></td>
    <td width="1" bgcolor="#CCCCCC"></td>
  </tr>
  <tr>
    <td height="1" colspan="3" bgcolor="#CCCCCC"></td>
  </tr>
</table>
<?php
include "../inc/foot.php";
?>