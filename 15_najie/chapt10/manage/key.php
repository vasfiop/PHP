<?php
//接受变量
$submit=$_POST["submit"];
//用户登录验证
if($submit=="提交"){
	$user_pw=$_POST["user_pw"];
	$user_pw1=$_POST["user_pw1"];
	$user_pw2=$_POST["user_pw2"];
	if($user_pw!="" and $user_pw1!="" and $user_pw2!="" and $user_pw1==$user_pw2){
		$query="select * from user_info where user_name='$_SESSION[user_name]'";
		$rst=$folie->excu($query);
		$user=mysql_fetch_array($rst);
		if ($user["user_pw"]==$user_pw){
			$query2="update user_info set user_pw='$user_pw1' where user_name='$_SESSION[user_name]'";
			$folie->excu($query2);
			$crazy->js_alert("恭喜您，安全设置成功！","user.php?target=key");
		}else{
			$crazy->js_alert("您输入的旧密码不正确，请重新输入！","user.php?target=key");
		}
	}else{
		$crazy->js_alert("请确认三次密码全不为空，且后两次密码一致！","user.php?target=key");
	}
}
?>
<h4>安 全 设 置</h4>
<form id="form1" name="form1" method="post" action="user.php?target=key">

<table width="80%" border="1" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC" style="border-collapse:collapse">
  <tr>
    <td width="30%" height="25" align="right">原密码：</td>
    <td width="70%"><input name="user_pw" type="password" id="user_pw" size="15" /></td>
  </tr>
  <tr>
    <td height="25" align="right">新密码：</td>
    <td><input type="password" name="user_pw1" size="15" /></td>
  </tr>
  <tr>
    <td height="25" align="right">重复密码：</td>
    <td><input type="password" name="user_pw2" size="15" /></td>
  </tr>
  <tr>
    <td height="25" colspan="2" align="center"><input type="submit" name="submit" value="提交" /></td>
  </tr>
</table>
</form>