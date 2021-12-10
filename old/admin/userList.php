<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body><?php
        require_once('tpl/header.php');
        ?>
    <?php
    include_once('inc_admin.php');

    use function mysql_connect\sqli_init;
    use function mysql_connect\sqli_ctrl;

    $con = sqli_init();
    $sql = "select * from users";
    if (isset($_GET['key'])) {
        $key = trim($_GET['key']);
        $sql = $sql . " where uname like '%$key%' ";
    }
    $rs = sqli_ctrl($sql) or die("添加数据失败" . mysqli_connect_error());
    $num = mysqli_num_rows($rs); //记录了结果集中的结果条数
    if ($num == 0) {
        echo "未找到符合条件的记录";
        exit;
    }
    ?>
    <form action="">
        请输入用户名：
        <input type="text" name="key">
        <input type="submit" name="搜索">
    </form>
    <table border="1" align="center">
        <caption>注册用户信息列表（共<?php echo $num; ?>名用户）</caption>
        <tr>
            <th>用户编号</th>
            <th>用户名</th>
            <th>性别</th>
            <th>电话</th>
            <th>头像</th>
            <th>电子邮件</th>
            <th>操作</th>
        </tr>
        <?php
        $i = 1;
        while ($row = mysqli_fetch_assoc($rs)) {
        ?>
            <tr>
                <th><?php echo $i++ ?></th>
                <th><?php echo $row["uname"]; ?></th>
                <th><?php echo $row["gender"] == 0 ? '男' : '女'; ?></th>
                <th><?php echo $row["tel"]; ?></th>
                <th>
                    <img src="../images/<?php echo $row["photo"] ?>" alt="" while="80" height="80">
                </th>
                <th><?php echo $row["email"]; ?></th>
                <th>
                    <a href="userEdit.php?uid=<?php echo $row["uid"]; ?>">修改</a>
                    |
                    <a href="doUserDelete.php?uid=<?php echo $row["uid"]; ?>" onclick="return confirm('真的要删除吗?')">删除</a>
                </th>
            </tr>
        <?php
        }
        ?>
    </table>
    <?php
    require_once('tpl/footer.php');
    ?>
</body>

</html>