<?php
include "inc/mysql.inc.php";
include "inc/myfunction.php";
$folie=new mysql;
$crazy=new myfunction;
$folie->link("");
$user_id=$_GET["user_id"];
$query="select * from user_info where id='$user_id'";
$rst=$folie->excu($query);
if (mysql_num_rows($rst)==0){
	echo "===��Ҫ���ʵ��û��Ĳ����Ѿ���ϵͳ����Աɾ��,������Ͳ�����!===";
	exit;
}
$info=mysql_fetch_array($rst);
if ($info["tag"]==0){
echo "===���û��Ĳ����Ѿ���ϵͳ����Ա����!===";
exit;
}
include "inc/head1.php";
?>
<table width="752" border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse">
  <tr>
    <td width="1" height="199" bgcolor="#CCCCCC"></td>
    <td width="488" align="center" valign="top"><table width="490" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
      <tr>
        <td height="660" align="center" valign="top"><br />
		<!--��ʾ��־���� --><div align="left"><?php
		$query="select * from blog_info where user_id='$user_id' order by add_time desc";
		$rst=$folie->excu($query);
		if(mysql_num_rows($rst)>=1){
		$add="myblog.php?user_id=$user_id&";
		$pagesize=6;
		$crazy->pagination($query,$page_id,$add,$pagesize);
		$rst=$folie->excu($query);
		while($info_blog=mysql_fetch_array($rst)){		
		?></div>
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
                <td width="20%" align="center" class="title2"><a href="blog_comm.php?user_id=<?php echo $user_id;?>&blog_id=<?php echo $info_blog["id"];?>">��������</a></td>
                <td width="30%" class="title2">���ࣺ<?php echo $crazy->blog_type_idto_name($info_blog["type_id"]);?></td>
                <td width="50%" class="title2">ʱ�䣺<?php echo $info_blog["add_time"];?>&nbsp;&nbsp; <a href="blog_comm.php?user_id=<?php echo $user_id;?>&blog_id=<?php echo $info_blog["id"];?>">�鿴ȫ��</a></td>
              </tr>
            </table></td>
          </tr>
        </table>
          <hr />
		  <?php
		  }
		  }
		  ?></td>
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
include "inc/myfoot.php";
?>