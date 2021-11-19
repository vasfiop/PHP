<?php
include_once("../../Util/file_upload_check.php");
include_once("../../Util/GetRandNumber.php");
include_once("../../Util/mysqli.php");
include_once("SQL.php");
Sqli\sqli_init();
$uid = $_GET["id"];

// 处理头像
$count = my_sql\GetUserPic($uid);
$row = mysqli_fetch_assoc($count);
if (file_exists("../image/" . $row['photo']))
    $res = unlink("../image/" . $row['photo']);

$sql = "delete from users where uid = '$uid'";
$list = Sqli\sqli_ctrl($sql);

echo "删除成功！<br>";
echo '<a href="userList.php">返回</a>';
