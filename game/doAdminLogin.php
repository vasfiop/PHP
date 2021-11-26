<?php
include_once("include.php");

$name = $_POST['name'];
$password = $_POST['password'];
Sqli\sqli_init();
$success = admin\GetAdminByEmail($name, $password);
if (!($success->num_rows))
    $success = admin\GetAdminByTel($name, $password);
if (!($success->num_rows))
    header("refresh:0;url='index.php?success=$success->num_rows'");
else {
    // TODO welcome.php改写了
    $row = Sqli\sqli_get_map($success);
    $_SESSION['admin'] = $row;
    header("location:welcome.php");
}
