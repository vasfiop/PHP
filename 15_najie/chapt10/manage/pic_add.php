<?php
include "session.php";
   $add_tag=$_POST["add_tag"];
   if ($add_tag==1){
	  $target=$_POST["target"];
	  	if (!empty($_FILES['file_name']['name'])){
		//根据现在的时间产生一个随机数
       $rand1=rand(0,9);
       $rand2=rand(0,9);
       $rand3=rand(0,9);
       $filename=date("Ymdhms").$rand1.$rand2.$rand3;        
       $oldfilename=$_FILES['file_name']['name']; 
       $filetype=substr($oldfilename,strrpos($oldfilename,"."),strlen($oldfilename)-strrpos($oldfilename,"."));
       if(($filetype!='.jpg')&&($filetype!='.JPG')&&($filetype!='.GIF')&&($filetype!='.gif')&&($filetype!='.swf')&&($filetype!='.SWF')){
          echo "<script>alert('文件类型或地址错误');</script>";
          echo "<script>location.href='?up_id=".$up_id."&menu_id=".$menu_id."';</script>";
          exit;
          }
       if ($_FILES['file_name']['size']>2000000) {
           echo "<script>alert('文件太大，不能上传');</script>";
          echo "<script>location.href='?up_id=".$up_id."&menu_id=".$menu_id."';</script>";
          exit;
           }
       $filename=$filename.$filetype;    
       $savedir="../pic_sys/".$filename;
       if(move_uploaded_file($_FILES['file_name']['tmp_name'],$savedir)){
            $file_name=basename($savedir);       //取得保存文件的文件名（不含路径）
           // echo "<br>文件上传成功！保存为：".$savedir;
           }else{
             echo "<script language=javascript>";
             echo "alert('错误，无法将附件写入服务器!\n本次发布失败！');";
             echo "<script>location.href='?up_id=".$up_id."&menu_id=".$menu_id."';</script>";
             echo "</script>";
             exit;
         } 
	  	$query="insert into pic_info(`addr`,`tag`,`target`,`user_id`) values('$filename','1','$target','$_SESSION[user_id]')";
		if ($folie->excu($query)){		
		$crazy->js_alert("恭喜您，添加图片成功！请继续。","#");
		
		}
	  }
	 }
//删除图片操作
$del_id=$_GET["del_id"];
if($del_id!=""){
	$query="select * from pic_info where id='$del_id' and user_id='$_SESSION[user_id]'";
	$rst=$folie->excu($query);
	$info=mysql_fetch_array($rst);
	$pic_addr="../pic_sys/".$info["addr"];
	unlink($pic_addr);
	$query="delete from pic_info where id='$del_id' and user_id='$_SESSION[user_id]'";
	$rst=$folie->excu($query);
	echo "删除成功！";
}
//显/隐图片
$show_tag=$_GET["show_tag"];
$pic_id=$_GET["pic_id"];
if($show_tag==1 and $pic_id!=""){
	$query="update pic_info set tag='0' where id='$pic_id'";
	$rst=$folie->excu($query);
}else if($show_tag==0 and $pic_id!=""){
	$query="update pic_info set tag='1' where id='$pic_id'";
	$rst=$folie->excu($query);
}
?>
<h4>图 片 管 理</h4>
<form enctype="multipart/form-data" action="user.php?target=pic_add" method="post" name="form1" id="form1">
<div align="center">
  <center>
  <table width="450" border="0" cellpadding="0" cellspacing="1" bordercolorlight="#cccccc" bordercolordark="#cccccc" bgcolor="#CCCCCC" id="AutoNumber1" style="border-collapse: collapse">
    <tr>
      <td height="31" colspan="2" align="center" valign="middle" bgcolor="#CCCCCC">&lt;&lt;图片添加&gt;&gt;</td>
    </tr>
    <tr>
      <td width="20%" bgcolor="#FFFFFF" height="26" align="right">图片地址地址:</td>
      <td width="80%" height="12" bgcolor="#FFFFFF"><input type="file" name="file_name" size="36" /></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" height="26" align="right">显示位置:</td>
      <td height="26" bgcolor="#FFFFFF"><select name="target">
        <option value="1">顶部banner</option>
        <option value="2">博主形象</option>
      </select>      </td>
    </tr>
    <tr>
      <td width="123" bgcolor="#FFFFFF" height="27" align="right">添加人:</td>
      <td width="439" height="27" bgcolor="#FFFFFF">&nbsp;<?php echo $_SESSION["user_name"]?></td>
    </tr>
    <tr>
      <td bgcolor="#CCCCCC" height="31" align="right" colspan="2">
      <p align="center">
        <input type="submit" value="提交" name="B1">&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="reset" value="重置" name="B2"></td>
    </tr>
  </table>
  </center>
</div>
<input type="hidden" name="add_tag" value="1">
</form>
<!--显示图片 -->
<?php
$query="select * from pic_info where user_id='$_SESSION[user_id]'";
$rst=$folie->excu($query);
if(mysql_num_rows($rst)>=1){
?>
<table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC" style="border-collapse:collapse">
  <tr>
    <td width="5%" height="25" align="center">序号</td>
    <td width="79%" align="center">图片</td>
    <td colspan="2" align="center">操作</td>
  </tr>
  <?php
  $i=1;
  while($info=mysql_fetch_array($rst)){
  ?>
  <tr>
    <td width="5%" height="60" align="center"><?php echo $i;?></td>
    <td width="79%" align="center" valign="middle"><a href="../pic_sys/<?php echo $info["addr"];?>" target="_blank"><img src="../pic_sys/<?php echo $info["addr"];?>" height="50" border="0"></a></td>
    <td width="8%" align="center">
	<?php
	if($info["tag"]==1){
	?>
	<a href="user.php?target=pic_add&pic_id=<?php echo $info["id"];?>&show_tag=1">显示</a>
	<?php
	}else {
	?>
	<a href="user.php?target=pic_add&pic_id=<?php echo $info["id"];?>&show_tag=0">隐藏</a>
	<?php
	}
	?></td>
    <td width="8%" align="center"><a href="user.php?target=pic_add&del_id=<?php echo $info["id"];?>">删除</a></td>
  </tr>
  <?php
  $i++;
  }
  ?>
</table>
<?php
}
?>