<?php
include "inc/mysql.inc.php";
include "inc/myfunction.php";
//include "inc/head.php";
$folie=new mysql;
$crazy=new myfunction;
$folie->link("");
$user_id=$_GET["user_id"];
$type_id=$_GET["type_id"];
$blog_id=$_GET["blog_id"];
include "inc/head1.php";

//接收评论内容
$blog_comm_tag=$_POST["blog_comm_tag"];
if($blog_comm_tag==1){
	$blog_id=$_GET["blog_id"];
	$comm_name=$_POST["comm_name"];
	$cont=$_POST["cont"];
	$add_time=date("Y-m-d H:i:s");
	if($comm_name!="" and $cont!=""){
		$query="insert into blog_comm_info(`blog_id`,`comm_name`,`cont`,`add_time`) values('$blog_id','$comm_name','$cont','$add_time')";
		$rst=$folie->excu($query);
	}
}
?>
<table width="752" border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse">
  <tr>
    <td width="1" height="199" bgcolor="#CCCCCC"></td>
    <td width="488" align="center" valign="top"><table width="490" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
      <tr>
        <td height="660" align="center" valign="top">
		<!--显示日志内容 -->
		<?php
		$query="select * from blog_info where id='$blog_id' and user_id='$user_id' order by add_time desc";
		$rst=$folie->excu($query);
		if(mysql_num_rows($rst)>=1){
		while($info_blog=mysql_fetch_array($rst)){		
		?>
		<table width="98%" border="0" cellspacing="0" cellpadding="5">
          <tr>
            <td height="30" class="title1"><?php echo $info_blog["title"];?></td>
          </tr>
          <tr>
            <td class="cont"><?php echo $info_blog["cont"];?></td>
          </tr>
          <tr>
            <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="20%" align="center" class="title2">发表评论</td>
                <td width="30%" class="title2">分类：<?php echo $crazy->blog_type_idto_name($info_blog["type_id"]);?></td>
                <td width="50%" class="title2">时间：<?php echo $info_blog["add_time"];?></td>
              </tr>
            </table></td>
          </tr>
        </table>
          <hr />
		  <?php
		  }
		  }
		  ?>
		  <!--显示评论内容 -->
		  <?php
		  $query_pinglun="select * from blog_comm_info where blog_id='$blog_id' order by add_time desc";
		  $rst_pinglun=$folie->excu($query_pinglun);
		  if(mysql_num_rows($rst_pinglun)>=1){
		  ?>
		  <table width="95%" border="0" cellpadding="5" cellspacing="0" bgcolor="#CCCCCC">
		  <?php
		  while($info_pinglun=mysql_fetch_array($rst_pinglun)){
		  ?>
  <tr>
    <td height="25">评论人：<?php echo $info_pinglun["comm_name"];?></td>
  </tr>
  <tr>
    <td height="25"><?php echo $info_pinglun["cont"];?></td>
  </tr>
  <tr>
    <td height="25">评论时间：<?php echo $info_pinglun["add_time"];?></td>
  </tr>
  <tr>
    <td height="1" bgcolor="#99FFFF"></td>
  </tr>
  <?php
  }
  ?>
</table>
	<?php
	}
	?>

		  <!--发表评论 -->
		  <form action="blog_comm.php?user_id=<?php echo $user_id;?>&blog_id=<?php echo $blog_id;?>" method="post">
		  <table width="95%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="20%" height="25" align="right">昵称：</td>
              <td width="80%"><input type="text" name="comm_name" /></td>
            </tr>
            <tr>
              <td height="25" align="right">评论内容：</td>
              <td height="25"><textarea name="cont" cols="48" rows="10"></textarea></td>
            </tr>
            <tr>
              <td height="25" colspan="2" align="center"><input type="submit" name="Submit" value="发表评论" /></td>
            </tr>
          </table>
		  <input type="hidden" name="blog_comm_tag" value="1">
		  </form>
		  <!--End 评论内容 --></td>
      </tr>
    </table></td>
    <td width="1" bgcolor="#CCCCCC"></td>
    <td width="257" align="center" valign="top"><?php include "menu.php";?></td>
    <td width="1" bgcolor="#CCCCCC"></td>
  </tr>
  <tr>
    <td height="1" colspan="3" bgcolor="#CCCCCC"></td>
    <td width="258" colspan="2" bgcolor="#CCCCCC"></td>
  </tr>
</table>
<?php
include "inc/foot.php";
?>