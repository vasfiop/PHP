<?php
include_once("../../Util/file_upload_check.php");
include_once("../../Util/GetRandNumber.php");
include_once("../../Util/mysqli.php");

$adminName = $_POST["adminName"];
$password = $_POST["password"];

Sqli\sqli_init();
$sql = "select * from admins where adminname = '$adminName' and password = md5('$password')";
$list = Sqli\sqli_ctrl($sql);
$count = mysqli_num_rows($list);
if ($count > 0)
    header("location:welcome.php");
else
    header("location:Login.php");
