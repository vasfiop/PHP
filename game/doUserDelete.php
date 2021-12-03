<?php
include_once("./include.php");
include_once("./system/CheckLogin.php");
$uid = $_GET['uid'];
Sqli\sqli_init();
$success = frozen\Delete($uid);
if ($success) {
    $success = user\Delete($uid);
    if ($success)
        header("location:userList.php");
    else
        header("location:userList.php?msg=删除用户失败！请联系作者！");
} else {
    header("location:userList.php?msg=删除用户失败！请联系作者！");
}
