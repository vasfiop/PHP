<?php
include "session.php";
   $add_tag=$_POST["add_tag"];
   if ($add_tag==1){
	  $target=$_POST["target"];
	  	if (!empty($_FILES['file_name']['name'])){
		//�������ڵ�ʱ�����һ�������
       $rand1=rand(0,9);
       $rand2=rand(0,9);
       $rand3=rand(0,9);
       $filename=date("Ymdhms").$rand1.$rand2.$rand3;        
       $oldfilename=$_FILES['file_name']['name']; 
       $filetype=substr($oldfilename,strrpos($oldfilename,"."),strlen($oldfilename)-strrpos($oldfilename,"."));
       if(($filetype!='.jpg')&&($filetype!='.JPG')&&($filetype!='.GIF')&&($filetype!='.gif')&&($filetype!='.swf')&&($filetype!='.SWF')){
          echo "<script>alert('�ļ����ͻ��ַ����');</script>";
          echo "<script>location.href='?up_id=".$up_id."&menu_id=".$menu_id."';</script>";
          exit;
          }
       if ($_FILES['file_name']['size']>2000000) {
           echo "<script>alert('�ļ�̫�󣬲����ϴ�');</script>";
          echo "<script>location.href='?up_id=".$up_id."&menu_id=".$menu_id."';</script>";
          exit;
           }
       $filename=$filename.$filetype;    
       $savedir="../pic_sys/".$filename;
       if(move_uploaded_file($_FILES['file_name']['tmp_name'],$savedir)){
            $file_name=basename($savedir);       //ȡ�ñ����ļ����ļ���������·����
           // echo "<br>�ļ��ϴ��ɹ�������Ϊ��".$savedir;
           }else{
             echo "<script language=javascript>";
             echo "alert('�����޷�������д�������!\n���η���ʧ�ܣ�');";
             echo "<script>location.href='?up_id=".$up_id."&menu_id=".$menu_id."';</script>";
             echo "</script>";
             exit;
         } 
	  	$query="insert into pic_info(`addr`,`tag`,`target`,`user_id`) values('$filename','1','$target','$_SESSION[user_id]')";
		if ($folie->excu($query)){		
		$crazy->js_alert("��ϲ�������ͼƬ�ɹ����������","#");
		
		}
	  }
	 }
//ɾ��ͼƬ����
$del_id=$_GET["del_id"];
if($del_id!=""){
	$query="select * from pic_info where id='$del_id' and user_id='$_SESSION[user_id]'";
	$rst=$folie->excu($query);
	$info=mysql_fetch_array($rst);
	$pic_addr="../pic_sys/".$info["addr"];
	unlink($pic_addr);
	$query="delete from pic_info where id='$del_id' and user_id='$_SESSION[user_id]'";
	$rst=$folie->excu($query);
	echo "ɾ���ɹ���";
}
//��/��ͼƬ
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
<h4>ͼ Ƭ �� ��</h4>
<form enctype="multipart/form-data" action="user.php?target=pic_add" method="post" name="form1" id="form1">
<div align="center">
  <center>
  <table width="450" border="0" cellpadding="0" cellspacing="1" bordercolorlight="#cccccc" bordercolordark="#cccccc" bgcolor="#CCCCCC" id="AutoNumber1" style="border-collapse: collapse">
    <tr>
      <td height="31" colspan="2" align="center" valign="middle" bgcolor="#CCCCCC">&lt;&lt;ͼƬ���&gt;&gt;</td>
    </tr>
    <tr>
      <td width="20%" bgcolor="#FFFFFF" height="26" align="right">ͼƬ��ַ��ַ:</td>
      <td width="80%" height="12" bgcolor="#FFFFFF"><input type="file" name="file_name" size="36" /></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" height="26" align="right">��ʾλ��:</td>
      <td height="26" bgcolor="#FFFFFF"><select name="target">
        <option value="1">����banner</option>
        <option value="2">��������</option>
      </select>      </td>
    </tr>
    <tr>
      <td width="123" bgcolor="#FFFFFF" height="27" align="right">�����:</td>
      <td width="439" height="27" bgcolor="#FFFFFF">&nbsp;<?php echo $_SESSION["user_name"]?></td>
    </tr>
    <tr>
      <td bgcolor="#CCCCCC" height="31" align="right" colspan="2">
      <p align="center">
        <input type="submit" value="�ύ" name="B1">&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="reset" value="����" name="B2"></td>
    </tr>
  </table>
  </center>
</div>
<input type="hidden" name="add_tag" value="1">
</form>
<!--��ʾͼƬ -->
<?php
$query="select * from pic_info where user_id='$_SESSION[user_id]'";
$rst=$folie->excu($query);
if(mysql_num_rows($rst)>=1){
?>
<table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC" style="border-collapse:collapse">
  <tr>
    <td width="5%" height="25" align="center">���</td>
    <td width="79%" align="center">ͼƬ</td>
    <td colspan="2" align="center">����</td>
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
	<a href="user.php?target=pic_add&pic_id=<?php echo $info["id"];?>&show_tag=1">��ʾ</a>
	<?php
	}else {
	?>
	<a href="user.php?target=pic_add&pic_id=<?php echo $info["id"];?>&show_tag=0">����</a>
	<?php
	}
	?></td>
    <td width="8%" align="center"><a href="user.php?target=pic_add&del_id=<?php echo $info["id"];?>">ɾ��</a></td>
  </tr>
  <?php
  $i++;
  }
  ?>
</table>
<?php
}
?>