<?php
session_start();
if (!isset($_SESSION["adminName"])) {
    header("location:index.php?msg=您没有权限，请登录后访问");
    echo "没有session";
    var_dump($_SESSION);
} else {
    echo "有session";
    var_dump($_SESSION);
}
