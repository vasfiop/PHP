<?php
include_once("../../Util/file_upload_check.php");
include_once("../../Util/GetRandNumber.php");
include_once("../../Util/mysqli.php");

$adminName = $_POST["adminName"];
$password = $_POST["password"];

Sqli\sqli_init();
$sql = "select * from admins where adminname = '$adminName' and password = md5('$password')";
$list = Sqli\sqli_ctrl($sql);
$row = mysqli_fetch_assoc($list);
$count = mysqli_num_rows($list);
if ($count > 0) {
    session_start();
    $_SESSION["admin_name"] = $adminName;
    $_SESSION['admin_id'] = $row['adminid'];
    header("location:welcome.php");
} else {
    echo '登录失败<br>';
    header("location:index.php");
}
