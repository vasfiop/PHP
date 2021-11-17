<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    session_start();
    if (!isset($_SESSION['admin_name']))
        header("loaction:index.php?msg=您没有权限，请登陆后访问!");
    ?>
    <h2>欢迎管理员<?php echo $_SESSION['admin_name']; ?>访问本系统!</h2>
    <h3>
        <a href="userList.php">注册用户管理</a>
        <a href="">管理员注销</a>
    </h3>
</body>

</html>