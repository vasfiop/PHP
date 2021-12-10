<?php

use function mysql_connect\sqli_ctrl;
use function mysql_connect\sqli_init;

include_once("tpl/header.php");
include_once("inc_admin.php");
$con = sqli_init();
$cid = $_GET['cid'];
$rs = CommentDelete($cid);
$num = mysqli_affected_rows($con);
if($num!=1){
    redirect('commentList.php','删除失败！3秒后返回留言列表！');
}else{
    redirect('commentList.php','删除成功！3秒后返回留言列表！');
}
include_once("tpl/footer.php");
?>