<?php
include "inc/mysql.inc.php";
include "inc/myfunction.php";
include "inc/head.php";
$folie=new mysql;
$crazy=new myfunction;
$folie->link("");
//���ܱ���
$register_tag=$_GET["register_tag"];
$up_register=$_POST["up_register"];
$up_login=$_POST["up_login"];

//��֤�û���½��Ϣ
if($up_login==1){
	$user_name=$_POST["user_name"];
	$query="select * from user_info where user_name='$user_name' and tag='1'";	
	$rst=$folie->excu($query);
	if(mysql_num_rows($rst)>=1){
		$info=mysql_fetch_array($rst);
		$user_pw=$_POST["user_pw"];
		if($user_pw==$info["user_pw"]){
			$_SESSION["user_name"]=$user_name;
			$_SESSION["user_id"]=$info["id"];
			$_SESSION["user_tag"]="1";
			$today=date("Y-m-d H:i:s");
			$query = "update user_info set `last_time`='$today' where `id`='$info[id]'";
			//$query="insert into user_info(`user_name`,`user_pw`,`last_time`) values('$user_name','$user_pw','$today')";
			$folie->excu($query);
			$crazy->js_alert("��½�ɹ���","manage/user.php");
		}else {
			$crazy->js_alert("�û������������","index.php");
		}
	}else {
		$crazy->js_alert("�û������������","index.php");
	}
}

//�ж��û�ע����Ϣ����д�����ݿ�
if($up_register==1){
	$user_name=$_POST["user_name"];
	if($user_name!=""){
	$query="select * from user_info where user_name='$user_name'";
	$rst=$folie->excu($query);
	if(mysql_num_rows($rst)<1){
		$user_pw1=$_POST["user_pw1"];
		$user_pw2=$_POST["user_pw2"];
		if($user_pw1==$user_pw2 and $user_pw1!=""){
			$r_time=date("Y-m-d H:i:s");
			$query="insert into user_info(`user_name`,`user_pw`,`r_time`) values('$user_name','$user_pw1','$r_time')";
			$rst=$folie->excu($query);
			if($rst){
				$crazy->js_alert("ע��ɹ���","index.php");
			}
		}else {
			$crazy->js_alert("������������벻һ�£����������룡","index.php?register_tag=1");
		}
	}else {
		$crazy->js_alert("�û����Ѵ��ڣ�","index.php?register_tag=1");
	}
	}
}
?>
<table width="752" border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse">
  <tr>
    <td width="1" bgcolor="#CCCCCC"></td>
    <td colspan="2" align="center" valign="top"><table width="490" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
      <tr>
        <td align="center" valign="top">
		<table width="90%" border="0" cellspacing="0" cellpadding="10">
          <tr>
            <td height="30" align="left" valign="middle"><span style="font-size:15px; font-weight:bold">ϵͳ˵����</span></td>
          </tr>
          <tr>
            <td align="left" valign="top"><p>�ö��û�����ϵͳ�����������鷶�����������κ���ҵĿ�ģ�</p>
              <p>�κε�λ�����˲��������κ���ҵ���</p>
              <p>������ʹ�ù����У��������⣬��ӭһ������</p></td>
          </tr>
          <tr>
            <td align="left" valign="top"><hr /></td>
          </tr>
        </table>
		<!--ϵͳ��飬�û���½ -->
		<?php
		if($register_tag!=1){
		?>
		<form action="login1.php" method="post">
              <table width="90%" border="1" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC" style="border-collapse:collapse">
              <tr>
                <td height="25" colspan="2" align="center">&lt;&lt;�û���½&gt;&gt;</td>
                </tr>
              <tr>
                <td width="29%" height="25" align="right">�û�����</td>
                <td width="71%"><input type="text" name="user_name" size="15" /></td>
              </tr>
              <tr>
                <td height="25" align="right">���룺</td>
                <td><input type="password" name="user_pw" size="15" /></td>
              </tr>
              <tr>
                <td height="25" colspan="2" align="center"><input type="submit" name="up" value="�ύ" />
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="login1.php?register_tag=1">ע��</a></td>
                </tr>
            </table>
			<input type="hidden" name="up_login" value="1">
			</form>		
		<?php
		}else {
		?>
		<!--�û�ע�� -->
		<form action="login1.php?register_tag=1" method="post">
                <table width="80%" border="1" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC" style="border-collapse:collapse">
                  <tr>
                    <td height="25" colspan="2" align="center">&lt;&lt;�û�ע��&gt;&gt;</td>
                  </tr>
                  <tr>
                    <td width="30%" height="25" align="right">�û�����</td>
                    <td width="70%"><input type="text" name="user_name" size="15" /></td>
                  </tr>
                  <tr>
                    <td height="25" align="right">���룺</td>
                    <td><input type="password" name="user_pw1" size="15" /></td>
                  </tr>
                  <tr>
                    <td height="25" align="right">�ظ����룺</td>
                    <td><input type="password" name="user_pw2" size="15" /></td>
                  </tr>
                  <tr>
                    <td height="25" colspan="2" align="center"><input type="submit" name="up2" value="�ύ" /></td>
                  </tr>
              </table>
			  <input type="hidden" name="up_register" value="1">
			  </form>		
		<?php
		}
		?><br></td>
      </tr>
    </table></td>
    <td width="1" bgcolor="#CCCCCC"></td>
  </tr>
  <tr>
    <td height="1" colspan="3" bgcolor="#CCCCCC"></td>
  </tr>
</table>
<?php
include "inc/foot.php";
?>