<?php
include "session.php";
include "../inc/mysql.inc.php";
include "../inc/myfunction.php";
include "head.php";
$folie=new mysql;
$crazy=new myfunction;
$folie->link("");
?>
<table width="752" border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse">
  <tr>
    <td width="1" height="199" bgcolor="#CCCCCC"></td>
    <td width="490" align="center" valign="top"><table width="490" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
      <tr>
        <td height="400" align="center" valign="top">
		<br /><?php
		$target=$_GET["target"];
		if($target==""){
			echo "===欢迎您登录多用户博客管理后台！===<br>===点击右侧连接，进行相关操作。===";
		}else{
			$target.=".php";
			include $target;
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
include "../inc/foot.php";
?>