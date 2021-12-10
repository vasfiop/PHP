<?php  
header("Content-Type:text/html;charset=GB2312");  
?>
<?php
include "inc/mysql.inc.php";
include "inc/myfunction.php";
$folie=new mysql;
$crazy=new myfunction;
$folie->link("");
include "inc/head.php";
//搜索用户提交的用户名是否存在，存在直接跳转到其博客主页，不存在探出提示信息
$search_tag = $_GET["search_tag"];
if($search_tag == "1"){
	$user_name = $_POST["user_name"];
	$query = "select * from user_info where user_name = '$user_name'";
	$rst = $folie->excu($query);
	if(mysql_num_rows($rst)>=1){
		$info2 = mysql_fetch_array($rst);
		//echo "<script>location.href='http://www.baidu.com';</script>";		
		echo "<script>window.open('myblog.php?user_id=$info2[id]');</script>";
	}else {
		echo "<script>alert('无此用户');</script>";
	}
}
?>
<table width="752" border="0" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse">
  <tr>
    <td width="1" height="199" bgcolor="#CCCCCC"></td>
    <td colspan="2" align="center" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="25" align="center"><table width="98%" border="0" cellspacing="0" cellpadding="0">
			<form action="index.php?search_tag=1" method="post">
              <tr>
                <td width="10%" align="right" valign="middle">用户名：</td>
                <td width="90%"><input type="text" name="user_name" />
                  &nbsp; <input type="submit" name="Submit" value="搜索" /></td>
              </tr>
			  </form>
            </table></td>
          </tr>
          <tr>
            <td align="center">
			<?php
			$query = "select * from user_info where tag = '1' order by r_time desc";
			$rst = $folie->excu($query);
			if(mysql_num_rows($rst) >= 1){
			?>
			<table width="94%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td height="26" align="left" valign="middle"><?php
				$crazy->pagination($query,$page_id,"?",10);
				$rst = $folie->excu($query);
				?></td>
              </tr>
            </table>
			
			<?php
			while($info = mysql_fetch_array($rst)){
			?>
			<table width="94%" border="1" cellpadding="0" cellspacing="0" bordercolor="#666666" style="border-collapse:collapse;">
              <tr>
                <td width="180" height="170" align="center"><?php
				$query_ph = "select * from pic_info where user_id = '$info[id]' and target = '2' and tag = '1'";
				$rst_ph = $folie->excu($query_ph);
				if(mysql_num_rows($rst_ph) == 1){
					$info_ph = mysql_fetch_array($rst_ph);
					echo "<a href=myblog.php?user_id=".$info["id"]." target='_blank'><img src=pic_sys/".$info_ph["addr"]." width='150' height='150' border='0'></a>";
				}else {
					echo "无";
				}
				?></td>
                <td width="519" align="center" valign="top"><table width="98%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="15%" height="30" align="right" valign="middle">博主昵称：</td>
                    <td width="85%" align="left" valign="middle"><a href=myblog.php?user_name=<?php echo $info["user_name"];?> target='_blank'><?php echo $info["user_name"];?></a></td>
                  </tr>
                  <tr>
                    <td height="30" align="right" valign="top">博主的话：</td>
                    <td valign="top"><?php
	//输出站长的话
	$name="sta_say".$info["id"];
	if (!@$fp=file("config/$name.txt")){
         echo "无！<br>";
        }else{
			for ($i=0;$i<count($fp);$i++){
			$sta_say.=$fp[$i];
			}
		echo $sta_say;
		}	
	?></td>
                  </tr>
                </table></td>
              </tr>
            </table>
			<br />
			<?php
			}
			}else {
				echo "无注册用户。";
			}
			?></td>
          </tr>
        </table></td>
    <td width="1" bgcolor="#CCCCCC"></td>
  </tr>
  <tr>
    <td height="1" colspan="3" bgcolor="#CCCCCC"></td>
  </tr>
</table>
<?php
include "inc/foot.php";
?>