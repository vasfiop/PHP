<?php
include "session.php";
?>
<table width="220" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="8"></td>
  </tr>
  <tr>
    <td>
	  <table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="25"><span style="font-weight:bold; font-size:14px;">管理菜单&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span><a href="../myblog.php?user_id=<?php echo $_SESSION["user_id"];?>" target="_blank">预览</a></td>
        </tr>
        <tr>
          <td class="line_height_m_menu">
		  <a href="user.php?target=general">常规设置</a><br />
		  <a href="user.php?target=link">友情连接管理</a><br />
		  <a href="user.php?target=pic_add">图片管理</a><br />
		  <a href="user.php?target=sta_say">博主的话</a><br />
          <a href="user.php?target=module_add">日志分类</a><br />
		  <a href="user.php?target=blog_add">日志添加</a><br />
		  <a href="#">日志管理<br /></a>
		  <?php
		  $query="select * from blog_type_info where user_id='$_SESSION[user_id]' order by show_order";
		  $rst=$folie->excu($query);
		  if(mysql_num_rows($rst)>=1){
		  ?>
		  <table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
		  <?php
		  while($info=mysql_fetch_array($rst)){
		  ?>
            <tr>
              <td><a href="user.php?target=blog_manage&type_id=<?php echo $info["id"];?>"><?php echo $info["type_name"];?></a></td>
            </tr>
			<?php
			}
			?>
          </table>
		  <?php
		  }
		  ?>
		  <a href="user.php?target=key">安全设置</a>
		  </td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
