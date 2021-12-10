<?php
include "inc/mysql.inc.php";
include "inc/myfunction.php";
include "inc/head.php";
$folie=new mysql;
$crazy=new myfunction;
$folie->link("");
//接受变量
$register_tag=$_GET["register_tag"];
$up_register=$_POST["up_register"];
$up_login=$_POST["up_login"];

//验证用户登陆信息
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
			$crazy->js_alert("登陆成功！","manage/user.php");
		}else {
			$crazy->js_alert("用户名或密码错误！","index.php");
		}
	}else {
		$crazy->js_alert("用户名或密码错误！","index.php");
	}
}

//判断用户注册信息，并写入数据库
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
				$crazy->js_alert("注册成功！","index.php");
			}
		}else {
			$crazy->js_alert("两次输入的密码不一致，请重新输入！","index.php?register_tag=1");
		}
	}else {
		$crazy->js_alert("用户名已存在！","index.php?register_tag=1");
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
            <td height="30" align="left" valign="middle"><span style="font-size:15px; font-weight:bold">系统说明：</span></td>
          </tr>
          <tr>
            <td align="left" valign="top"><p>该多用户博客系统，仅用做随书范例，不存在任何商业目的！</p>
              <p>任何单位及个人不得用于任何商业活动！</p>
              <p>在您的使用过程中，如有问题，欢迎一起交流！</p></td>
          </tr>
          <tr>
            <td align="left" valign="top"><hr /></td>
          </tr>
        </table>
		<!--系统简介，用户登陆 -->
		<?php
		if($register_tag!=1){
		?>
		<form action="login1.php" method="post">
              <table width="90%" border="1" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC" style="border-collapse:collapse">
              <tr>
                <td height="25" colspan="2" align="center">&lt;&lt;用户登陆&gt;&gt;</td>
                </tr>
              <tr>
                <td width="29%" height="25" align="right">用户名：</td>
                <td width="71%"><input type="text" name="user_name" size="15" /></td>
              </tr>
              <tr>
                <td height="25" align="right">密码：</td>
                <td><input type="password" name="user_pw" size="15" /></td>
              </tr>
              <tr>
                <td height="25" colspan="2" align="center"><input type="submit" name="up" value="提交" />
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="login1.php?register_tag=1">注册</a></td>
                </tr>
            </table>
			<input type="hidden" name="up_login" value="1">
			</form>		
		<?php
		}else {
		?>
		<!--用户注册 -->
		<form action="login1.php?register_tag=1" method="post">
                <table width="80%" border="1" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC" style="border-collapse:collapse">
                  <tr>
                    <td height="25" colspan="2" align="center">&lt;&lt;用户注册&gt;&gt;</td>
                  </tr>
                  <tr>
                    <td width="30%" height="25" align="right">用户名：</td>
                    <td width="70%"><input type="text" name="user_name" size="15" /></td>
                  </tr>
                  <tr>
                    <td height="25" align="right">密码：</td>
                    <td><input type="password" name="user_pw1" size="15" /></td>
                  </tr>
                  <tr>
                    <td height="25" align="right">重复密码：</td>
                    <td><input type="password" name="user_pw2" size="15" /></td>
                  </tr>
                  <tr>
                    <td height="25" colspan="2" align="center"><input type="submit" name="up2" value="提交" /></td>
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