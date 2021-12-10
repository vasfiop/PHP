<?php
$name="config".$user_id;
@include "config/$name.inc";
include "inc/font.inc";
?>
<title>:::<?php echo $config["title"];?>-多用户博客系统:::</title>
<link href="inc/css.css" rel="stylesheet" type="text/css">
</head>
<table width="750" border="1" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC" style="border-collapse:collapse">
  <tr>
    <td height="100"><img src="pic_sys/<?php
	$query="select * from pic_info where user_id='$user_id' and tag='1' and target='1'";
	$rst=$folie->excu($query);
	$info=mysql_fetch_array($rst);
	echo $info["addr"];?>" width="750" height="100"></td>
  </tr>
  <tr>
    <td height="30" class="title"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="88%" class="title"><?php echo $config['title'];?>&nbsp;&nbsp;<a href="myblog.php?user_id=<?php echo $user_id;?>">首页</a></td>
        <td width="12%" class="title"><a href="login1.php" target="_blank">&lt;&lt;管理登陆</a></td>
      </tr>
    </table></td>
  </tr>
</table>
