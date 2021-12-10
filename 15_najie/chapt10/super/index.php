<?php
include "session.php";
include "../inc/mysql.inc.php";
include "../inc/myfunction.php";
include "../inc/head2.php";
$folie=new mysql;
$crazy=new myfunction;
$folie->link("");
$tag=$_GET["tag"];
$user_id=$_GET["user_id"];
if($tag==0){
	$query="update user_info set tag='$tag' where id='$user_id'";
	$rst=$folie->excu($query);
}else if($tag==1){
	$query="update user_info set tag='$tag' where id='$user_id'";
	$rst=$folie->excu($query);
}

//删除用户
$del_id=$_GET["del_id"];
if($del_id!=""){
	$query="delete from user_info where id='$del_id'";
	$name1 = "../config/config".$del_id.".inc";
	$name2 = "../config/sta_say".$del_id.".txt";
	$name3 = "../config/link".$del_id.".txt";
	@unlink($name1);
	@unlink($name2);
	@unlink($name3);
	$rst=$folie->excu($query);
}
?>
<table width="752" border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse">
  <tr>
    <td width="1" height="199" bgcolor="#CCCCCC"></td>
    <td colspan="2" align="center" valign="top"><table width="90%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
      <tr>
        <td align="center" valign="top">
		<!--显示所有用户 --><br>
		<?php
		$query="select * from user_info order by id desc";
		$rst=$folie->excu($query);
		if(mysql_num_rows($rst)>=1){
		$add="index.php?";
		$pagesize=10;
		$crazy->pagination($query,$page_id,$add,$pagesize);
		$rst=$folie->excu($query);
		?>
		<table width="98%" border="1" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC" style="border-collapse:collapse">
          <tr>
            <td width="8%" height="25" align="center">序号</td>
            <td width="14%" align="center">昵称</td>
            <td width="30%" align="center">注册时间</td>
            <td width="30%" align="center">最后登录时间</td>
            <td width="9%" align="center">状态</td>
            <td width="9%" align="center">操作</td>
          </tr>
		  <?php
		  $i=1;
		  while($info=mysql_fetch_array($rst)){
		  ?>
          <tr align="center" valign="middle">
            <td height="25"><?php echo $i;?></td>
            <td><?php echo $info["user_name"];?></td>
            <td><?php echo $info["r_time"];?></td>
            <td><?php echo $info["last_time"];?></td>
            <td><?php
			if($info["tag"]==1){
			?><a href="index.php?user_id=<?php echo $info["id"];?>&tag=0">显示</a><?php
			}else {?><a href="index.php?user_id=<?php echo $info["id"];?>&tag=1">隐藏</a><?php
			}
			?></td>
            <td><a href="index.php?del_id=<?php echo $info["id"];?>">删除</a></td>
          </tr>
		  <?php
		  $i++;
		  }
		  ?>
        </table>
		<?php
		}else {
			echo "暂无用户注册。";
		}
		?>
		<!--End -->		</td>
      </tr>
    </table></td>
    <td width="1" bgcolor="#CCCCCC"></td>
  </tr>
  <tr>
    <td height="1" colspan="3" bgcolor="#CCCCCC"></td>
  </tr>
</table>
<?php
include "../inc/foot.php";
?>