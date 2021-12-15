<?php

include_once("include.php");

$name = $_POST['name'];
$password = $_POST['password'];
Sqli\sqli_init();
$success = admin\GetAdminByEmailPass($name, $password);
if (!($success->num_rows))
    header("refresh:0;url='index.php?success=$success->num_rows'");
else {
    session_start();
    $row = Sqli\sqli_get_map($success);
    $aid = $row['aid'];
    $_SESSION['admin_id'] = $aid;
    $_SESSION['admin'] = $row;
    header("location:welcome.php");
}
