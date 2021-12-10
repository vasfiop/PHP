<?php
include "session.php";
$del_id=$_GET["del_id"];
$type_id=$_GET["type_id"];
//删除日志操作
if($del_id!=""){
	$query="delete from blog_info where id='$del_id' and user_id='$_SESSION[user_id]'";
	$folie->excu($query);
	echo "日志删除成功！";
}
?>
<h4>日 志 管 理<br>-<?php echo $crazy->type_idto_name($type_id);?></h4>
<?php
$query="select * from blog_info where type_id='$type_id' and user_id='$_SESSION[user_id]' order by id desc";
$rst=$folie->excu($query);
if(mysql_num_rows($rst)>=1){
$add="user.php?target=blog_manage&type_id=".$type_id."&";
$pagesize=2;
$crazy->pagination($query,$page_id,$add,$pagesize);
$rst=$folie->excu($query);
?>
<table width="450" border="1" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC" style="border-collapse:collapse">
  <tr>
    <td width="8%" height="25" align="center">序号</td>
    <td width="62%" align="center">标题</td>
    <td colspan="2" align="center">操作</td>
  </tr>
  <?php
  $i=1;
  while($info=mysql_fetch_array($rst)){
  ?>
  <tr>
    <td width="8%" height="25" align="center"><?php echo $i;?></td>
    <td width="62%"><?php echo $info["title"];?></td>
    <td width="15%" align="center"><a href="user.php?target=blog_edit&type_id=<?php echo $type_id;?>&blog_id=<?php echo $info["id"];?>">编辑</a></td>
    <td width="15%" align="center"><a href="user.php?target=blog_manage&type_id=<?php echo $type_id;?>&del_id=<?php echo $info["id"];?>">删除</a></td>
  </tr>
  <?php
  $i++;
  }
  ?>
</table>
<?php
}else {
	echo "该分类下暂无日志。";
}
?>