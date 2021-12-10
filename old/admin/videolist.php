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
    $key = "";
    ?>
    <div align="center">
        <form action="">
            请输入视频名：
            <input type="text" name="key">
            <input type="submit" value="搜索">
        </form>
    </div>
    <?php
    include_once('inc_admin.php');

    use function mysql_connect\sqli_init;

    $con = sqli_init();
    $rs = VideoList($key) or die('查询失败' . mysqli_error($con));
    $num = mysqli_num_rows($rs);
    if ($num == 0) {
        echo "没有查询到记录";
        exit;
    }
    ?>
    <table border="1" align="center">
        <tr>
            <th>序号</th>
            <th>视频名称</th>
            <th>类别</th>
            <th>添加时间</th>
            <th>海报</th>
            <th>操作</th>
        </tr>
        <?php
        $i = 1;
        while ($row = mysqli_fetch_assoc($rs)) {
        ?>
            <tr>
                <td><?php echo $i++ ?></td>
                <td><?php echo $row["videoname"]; ?></td>
                <td><?php echo $row["typename"]; ?></td>
                <td><?php echo $row["uploaddate"]; ?></td>
                <td><img src="../images/<?php echo $row["pic"]; ?>" width="60" height="60"></td>
                <td><a href="videoEdit.php?vid=<?php echo $row["vid"]; ?>">修改</a>
                    <a href="doVideoDelete.php?vid=<?php echo $row["vid"]; ?>">删除</a>
                </td>
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