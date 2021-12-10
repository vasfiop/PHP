<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php require_once('tpl/header.php'); ?>
    <table border="1" align="center">
        <tr>
            <th>序号</th>
            <th>类别名称</th>
            <th>操作</th>
        </tr>
        <?php
        include_once('inc_admin.php');

        use function mysql_connect\sqli_init;

        $con = sqli_init();
        $rs = TypeList() or die(mysqli_error($con));
        $num = mysqli_num_rows($rs);
        $i = 1;
        while ($row = mysqli_fetch_assoc($rs)) { ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $row["typename"]; ?></td>
                <td><a href="typeEdit.php?tid=<?php echo $row["tid"]; ?>">修改</a>
                    <a href="doTypeDelete.php?tid=<?php echo $row["tid"]; ?>" onclick="return confirm('你确定删除吗?')">删除</a>

                </td>
            </tr>
        <?php }
        ?>
    </table>
    <?php
require_once('tpl/footer.php');
?>
</body>

</html>