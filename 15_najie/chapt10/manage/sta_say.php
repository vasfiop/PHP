<?php
//���ձ���
$sta_say=$_POST["sta_say"];
$name="sta_say".$_SESSION["user_id"];
if ($sta_say!=""){
	$sta_say=str_replace(" ","&nbsp;",$sta_say);
		//д���ļ�
		if ($fp=fopen("../config/$name.txt", "w")){
	 	fwrite($fp,$sta_say);
		fclose($fp);
		}
}
//�����ļ�
if (@$fp=file("../config/$name.txt")){
for ($i=0;$i<count($fp);$i++){
	$str_out.=$fp[$i];
	}
}
@include "../config/$name.inc";
?>
<br><h4>�� �� �� ��</h4>
<table width="98%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td height="1" bgcolor="#CCCCCC"></td>
  </tr>
  <tr>
    <td height="30" align="left" valign="middle">��������ı굥�����վ���Ļ�</td>
  </tr>
  <tr>
    <td height="1" bgcolor="#CCCCCC"></td>
  </tr><form id="form1" name="form1" method="post" action="user.php?target=sta_say">
  <tr>
    <td height="200" align="center" valign="middle">
      <textarea name="sta_say" cols="40" rows="12"><?php echo $str_out;?></textarea></td>
  </tr>
  <tr>
    <td height="30" align="center" valign="middle"><input type="submit" name="Submit" value="�ύ" />
&nbsp;&nbsp;&nbsp;&nbsp;
<input type="reset" name="Submit2" value="����" /></td>
  </tr></form>
  <tr>
    <td height="1" bgcolor="#CCCCCC"></td>
  </tr>
</table>
