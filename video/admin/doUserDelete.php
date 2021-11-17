<?php
include_once("../../Util/file_upload_check.php");
include_once("../../Util/GetRandNumber.php");
include_once("../../Util/mysqli.php");
Sqli\sqli_init();
$uid = $_GET["id"];
$sql = "delete from users where uid = '$uid'";
$list = Sqli\sqli_ctrl($sql);
echo "删除成功！<br>";
echo '<a href="userList.php">返回</a>';
