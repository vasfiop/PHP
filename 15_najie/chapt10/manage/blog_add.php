<?php
include "session.php";
$submit=$_POST["submit"];
if($submit=="提交"){
	$type_name_id=$_POST["type_name_id"];
	$title=$_POST["title"];
	$cont=$_POST["content"];
	$cont=$crazy->str_to($cont);  //字符转换，使其支持空格和换行
	$add_time=date("Y-m-d H:i:s");
	if($type_name_id==""){
		$crazy->js_alert("请选择日志类型！","user.php?target=blog_add");
	}else if($title==""){
		$crazy->js_alert("标题为空！","user.php?target=blog_add");
	}else if($cont==""){
		$crazy->js_alert("日志内容为空！","user.php?target=blog_add");
	}else {
		$query="insert into blog_info(`user_id`,`type_id`,`title`,`cont`,`add_time`) values('$_SESSION[user_id]','$type_name_id','$title','$cont','$add_time')";
		$folie->excu($query);
		$crazy->js_alert("日志添加成功！","user.php?target=blog_add");
	}
}
?>
<br />
<h4>书 写 日 志</h4>
<form id="form1" name="form1" method="post" action="user.php?target=blog_add">
<table width="450" border="0" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
  <tr>
    <td width="20%" align="right" valign="middle" bgcolor="#FFFFFF">选择日志类型:</td>
    <td width="80%" height="26" align="left" valign="middle" bgcolor="#FFFFFF">
	<select name="type_name_id">
	 <option value="" selected="selected">请选择...</option>
	 <?php
	 $query="select * from blog_type_info where user_id='$_SESSION[user_id]' order by show_order";
	 $rst=$folie->excu("$query");
	 if(mysql_num_rows($rst)>=1){
	 while($info=mysql_fetch_array($rst)){
	 ?>
	 <option value="<?php echo $info["id"];?>"><?php echo $info["type_name"];?></option>
	 <?php
	 }
	 }
	 ?>
	  </select></td>
  </tr>
  <tr>
    <td height="30" align="right" valign="middle" bgcolor="#FFFFFF">日志标题:</td>
    <td align="left" valign="middle" bgcolor="#FFFFFF"><input name="title" type="text" size="40" maxlength="60" /></td>
  </tr>
  <tr>
    <td align="right" valign="middle" bgcolor="#FFFFFF">日志内容:</td>
    <td align="left" valign="middle" bgcolor="#FFFFFF">
	<textarea name="content" cols="45" rows="15"></textarea></td>
  </tr>
  <tr>
    <td height="30" colspan="2" align="center" valign="middle" bgcolor="#FFFFFF"><input type="submit" name="submit" value="提交" />&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" name="Submit2" value="重置" /></td>
  </tr>
</table>
</form>