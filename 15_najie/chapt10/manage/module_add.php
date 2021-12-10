<?php
include "session.php";
$page_id=$_GET["page_id"];
$edit_tag=$_POST["edit_tag"];
$Submit=$_POST["Submit"];
//接收日志类型，并写入数据库
if($Submit=="提交"){
	$type_name=$_POST["type_name"];
	$show_order=$_POST["show_order"];
	if($crazy->int_estimation($show_order)){
	if($type_name!="" and $show_order!=""){
		$add_time=date("Y-m-d H:i:s");
		$query="insert into blog_type_info(`user_id`,`type_name`,`add_time`,`show_order`) values('$_SESSION[user_id]','$type_name','$add_time','$show_order')";
		$folie->excu($query);
		echo "<center><font color=#ff0000>分类添加成功！</font></center>";		
	}else {
		$crazy->js_alert("类型名、序号都不能为空！","user.php?target=module_add");
	}
	}else {
		$crazy->js_alert("请输入一整数！","user.php?target=module_add");
	}
}
//接收编辑信息，并写入数据库
$queren=$_POST["queren"];
if($queren=="确认"){
	$blog_id=$_POST["blog_id"];
	$edit_show_order=$_POST["edit_show_order"];
	$edit_type_name=$_POST["edit_type_name"];
	if($edit_show_order!="" and $edit_type_name!=""){
		$query="update blog_type_info set show_order='$edit_show_order',type_name='$edit_type_name' where id='$blog_id'";
		$folie->excu($query);
		echo "<font color=#ff0000>编辑成功！</font>";
	}
}
//删除日志类型
$del_id=$_GET["del_id"];
if($del_id!=""){
	$query="delete from blog_type_info where id='$del_id'";
	$folie->excu($query);
	echo "<font color=#ff0000>删除成功！</font>";
}
?>
<!--添加日志类型 -->
<h4>日 志 分 类</h4>
<form action="user.php?target=module_add" method="post">
<table width="80%" border="1" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC" style="border-collapse:collapse">
  <tr>
    <td height="30" colspan="2" align="center" bgcolor="#CCCCCC">&lt;&lt;日志分类添加&gt;&gt;</td>
  </tr>
  <tr>
    <td width="20%" height="30" align="right">日志类型：</td>
    <td width="80%"><input type="text" name="type_name"></td>
  </tr>
  <tr>
    <td height="30" align="right">序号：</td>
    <td><input type="text" name="show_order"></td>
  </tr>
  <tr>
    <td height="30" colspan="2" align="center"><input type="submit" name="Submit" value="提交">
      &nbsp;&nbsp; <input type="reset" name="Submit2" value="重置"></td>
  </tr>
</table>
</form>
<!--显示所有日志类型 -->
<?php
$query="select * from blog_type_info where user_id='$_SESSION[user_id]' order by show_order";
$rst=$folie->excu($query);
if(mysql_num_rows($rst)>=1){
$add="user.php?target=module_add&";
$pagesize=3;
$crazy->pagination($query,$page_id,$add,$pagesize);
$rst=$folie->excu($query);
?>
<table width="70%" border="1" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC" style="border-collapse:collapse">
  <tr>
    <td height="25" colspan="3" align="center" bgcolor="#CCCCCC">&lt;&lt;日志类型管理&gt;&gt;</td>
  </tr>
  <tr>
    <td width="10%" height="25" align="center">序号</td>
    <td width="60%" align="center">类型名称</td>
    <td width="30%" align="center">操作</td>
  </tr>
  <?php
  $i=1;
  while($info=mysql_fetch_array($rst)){
  ?>
  <form action="user.php?target=module_add&page_id=<?php echo $page_id;?>" method="post">
  <tr>
    <td width="10%" height="25" align="center">
	<?php
	if($edit_tag==$i){
	?>
	<input type="text" name="edit_show_order" value="<?php echo $info["show_order"];?>" size="5">
	<?php
	}else {
		echo $info["show_order"];
	}?></td>
    <td width="60%">
	<?php
	if($edit_tag==$i){
	?>
	<input type="text" name="edit_type_name" value="<?php echo $info["type_name"];?>">
	<?php
	}else {
		echo $info["type_name"];
	}?></td>
    <td align="center"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="50%" align="center">
		<?php
		if($edit_tag==$i){
		?>
		<input type="submit" name="queren" value="确认" class="input2">
		<?php
		}else {
		?>
		<input type="submit" value="编辑" class="input1">
		<?php }?></td>
        <td width="50%" align="center"><a href="user.php?target=module_add&page_id=<?php echo $page_id;?>&del_id=<?php echo $info["id"];?>">删除</a></td>
      </tr>
    </table></td>
  </tr>
  <input type="hidden" value="<?php echo $i;?>" name="edit_tag">
  <input type="hidden" name="blog_id" value="<?php echo $info["id"];?>">
  </form>
  <?php
  $i++;
  }
  ?>
</table>
<?php
}else {
	echo "暂无日志分类。";
}
?>
