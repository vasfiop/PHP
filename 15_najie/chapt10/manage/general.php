<?php
$config_tag=$_GET["config_tag"];
$name="config".$_SESSION["user_id"];
if ($config_tag==1){
	//���ձ���
	$margin_top=$_POST["margin-top"];
	$margin_bottom=$_POST["margin-bottom"];
	$background_color=$_POST["background-color"];
	$title=$_POST["title"];
	$copy_right=$_POST["copy-right"];
	//�����ַ���
	$str_in="<?php\n";
	$str_in.="global \$confg;\n";
	$str_in.="//��ҳ���ֲ���\n";
	$str_in.="\$config['margin-top'] = \"".$margin_top."\";\n";
	$str_in.="\$config['margin-bottom'] = \"".$margin_bottom."\";\n";
	$str_in.="\$config['background-color'] = \"".$background_color."\";\n";
	$str_in.="\n";
	$str_in.="//ͷ��Ϣ�Ͱ�Ȩ����\n";
	$str_in.="\$config['title'] = \"".$title."\";\n";
	$str_in.="\$config['copy-right'] = \"".$copy_right."\";\n";
	$str_in.="\n?>";
	//д���ļ�
	if ($fp=fopen("../config/$name.inc", "w")){
	 	fwrite($fp,$str_in); 
		fclose($fp);
	} 	
	include "../config/$name.inc";
}
@include "../config/$name.inc";
?>
<br>
<h4>�� �� �� ��</h4>
<form id="form1" name="form1" method="post" action="user.php?target=general&config_tag=1">
<table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
  <tr>
    <td width="20%" height="20" align="right" valign="middle" bgcolor="#FFFFFF">�ϱ߾�:</td>
    <td width="80%" bgcolor="#FFFFFF"><input name="margin-top" type="text" value="<?php echo $config['margin-top']?>" size="4" />
    ����(��Ӣ�Ļ����İ��������,��������Ч)</td>
  </tr>
  <tr>
    <td height="20" align="right" valign="middle" bgcolor="#FFFFFF">�±߾�:</td>
    <td bgcolor="#FFFFFF"><input name="margin-bottom" type="text" value="<?php echo $config['margin-bottom']?>" size="4" />
����(��Ӣ�Ļ����İ��������,��������Ч)</td>
  </tr>
  <tr>
    <td height="20" align="right" valign="middle" bgcolor="#FFFFFF">��ҳ������ɫ:</td>
    <td bgcolor="#FFFFFF"><input name="background-color" type="text" value="<?php echo $config['background-color']?>" size="10" />
������#��ͷ��6λ16����������ɫֵ(��Ӣ�Ļ����İ��������)</td>
  </tr>
  <tr>
    <td height="20" align="right" valign="middle" bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <td height="20" align="right" valign="middle" bgcolor="#FFFFFF">��վͷ����:</td>
    <td bgcolor="#FFFFFF"><input name="title" type="text" value="<?php echo $config['title']?>" size="30" /></td>
  </tr>
  <tr>
    <td height="20" align="right" valign="middle" bgcolor="#FFFFFF">��Ȩ��Ϣ:</td>
    <td bgcolor="#FFFFFF"><input name="copy-right" type="text" id="copy-right" value="<?php echo $config['copy-right']?>" size="40" /></td>
  </tr>
  <tr>
    <td height="20" colspan="2" align="center" valign="middle" bgcolor="#FFFFFF"><input type="submit" name="Submit" value="�ύ" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" name="Submit2" value="����" /></td>
  </tr>
</table>
</form>