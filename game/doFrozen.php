<?php
include_once("./include.php");
include_once("./system/CheckLogin.php");
$aid = $_SESSION['admin_id'];
$uid = $_GET['uid'];
Sqli\sqli_init();
$list = user\GetUserById($uid);
$row = Sqli\sqli_get_map($list);
$u_mode = $row['u_mode'];
if ($u_mode == '1')
    $u_mode = '0';
else
    $u_mode = '1';
$success = user\Frozen($uid, $u_mode);
if ($success) {
    $success = frozen\Insert($uid, $aid);
    if ($success)
        header("location:userList.php");
    else
        header("location:userList.php?msg=更新失败！请联系作者！");
} else
    header("location:userList.php?msg=更新失败！请联系作者！");