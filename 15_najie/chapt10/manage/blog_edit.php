<?php
include "session.php";
$type_id=$_GET["type_id"];
$blog_id=$_GET["blog_id"];
$submit_edit=$_POST["submit_edit"];
if($submit_edit=="提交"){
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
		$query="update blog_info set type_id='$type_name_id',title='$title',cont='$cont' where user_id='$_SESSION[user_id]' and id='$blog_id'";
		$folie->excu($query);
		$crazy->js_alert("日志编辑成功！","user.php?target=blog_edit&type_id=".$type_name_id."&blog_id=".$blog_id."");
	}
}

if($type_id!="" and $blog_id!=""){
	$query_edit="select * from blog_info where id='$blog_id' and user_id='$_SESSION[user_id]'";
	$rst_edit=$folie->excu($query_edit);
	$info_edit=mysql_fetch_array($rst_edit);
	$cont=$crazy->str_to2($info_edit["cont"]);  //字符转换，使其支持空格和换行
}
?>
<br />
<h4>编辑日志</h4>
<form id="form1" name="form1" method="post" action="user.php?target=blog_edit&type_id=<?php echo $type_id;?>&blog_id=<?php echo $blog_id;?>">
<table width="450" border="0" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
  <tr>
    <td width="20%" align="right" valign="middle" bgcolor="#FFFFFF">选择日志类型:</td>
    <td width="80%" height="26" align="left" valign="middle" bgcolor="#FFFFFF">
	<select name="type_name_id">
	<?php
	$type_id=$_GET["type_id"];
	echo $type_id;
	if($info_edit["type_id"]!=""){
	?>
	<option value="<?php echo $info_edit["type_id"];?>" selected="selected"><?php echo $crazy->type_idto_name($type_id);?></option>
	<?php
	}else {
	?>
	 <option value="" selected="selected">请选择...</option>
	 <?php
	 }
	 ?>
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
    <td align="left" valign="middle" bgcolor="#FFFFFF"><input name="title" type="text" value="<?php echo $info_edit["title"];?>" size="40" maxlength="60" /></td>
  </tr>
  <tr>
    <td align="right" valign="middle" bgcolor="#FFFFFF">日志内容:</td>
    <td align="left" valign="middle" bgcolor="#FFFFFF">
	<textarea name="content" cols="45" rows="15"><?php echo $cont;?></textarea></td>
  </tr>
  <tr>
    <td height="30" colspan="2" align="center" valign="middle" bgcolor="#FFFFFF"><input type="submit" name="submit_edit" value="提交" />&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" name="Submit2" value="重置" /></td>
  </tr>
</table>
</form>