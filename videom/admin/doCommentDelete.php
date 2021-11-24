<?php
include_once("tpl/header.php");
include_once("../system/loginCheck.php");
include_once("../../Util/mysqli.php");
include_once("SQL.php");

Sqli\sqli_init();
$cid = $_GET['cid'];
$success = my_sql\DeleteComment($cid);
if ($success)
    redirect('commentList.php', '修改成功！3秒后返回类型列表!');
else
    redirect('commentList.php', '修改成功！3秒后返回类型列表!');

include_once("tpl/footer.php");
