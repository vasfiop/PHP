<?php
include_once("tpl/header.php");
include_once("../system/loginCheck.php");
?>
<h2>
    欢迎管理员
    <?php
    echo $_SESSION['admin_name'];
    ?>
    访问本系统!
</h2>
<h3>
    <a href="userList.php">注册用户管理</a><br>
    <a href="typeAdd.php">添加视频类型</a><br>
    <a href="typeList.php">添加视频类型列表</a><br>
    <a href="videoAdd.php">添加视频</a><br>
    <a href="videoList.php">视频列表</a><br>

    <a href="logout.php">管理员注销</a><br>
</h3>
<?php
include_once("tpl/footer.php");
?>