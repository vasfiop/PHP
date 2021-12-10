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
    require_once('tpl/header.php');
    require_once("../system/loginCheck.php");
    ?>
    <h2>欢迎管理员
        【<?php echo $_SESSION["adminName"];  ?>】
        访问本系统</h2>
    <h2>
        <a href="userList.php">注册用户管理</a>
        <br><br>
        <a href="typeAdd.php">添加视频类型</a>
        <br><br>
        <a href="typeList.php">视频类型表</a>
        <br><br>
        <a href="videoAdd.php">添加视频</a>
        <br><br>
        <a href="videolist.php">视频列表</a>
        <br><br>
        <a href="logout.php">管理员注销</a>
    </h2>
    <?php
    require_once('tpl/footer.php');
    ?>
</body>

</html>