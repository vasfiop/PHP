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
    include_once("../system/loginCheck.php");
    include_once("../../Util/mysqli.php");
    include_once("SQL.php");
    Sqli\sqli_init();
    if (!isset($_POST['key']))
        $list = my_sql\GetVides();
    else {
        $key = $_POST['key'];
        $list = my_sql\SearchVideo($key);
    }
    $count = mysqli_num_rows($list);
    if ($count == 0) {
        echo "没查到记录";
        exit;
    }
    ?>
    <div align="center">
        <form action="" method="post">
            <input type="text" name="key" value="<?php echo isset($_POST['key']) ? $_POST['key'] : ""; ?>">
            <input type="submit" value="搜索">
        </form>
    </div>
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
        while ($row = mysqli_fetch_assoc($list)) {
            echo "<tr>";
            echo "<td>{$i}</td>";
            $i++;
            echo "<td>{$row['videoname']}</td>";
            echo "<td>{$row['typename']}</td>";
            echo "<td>{$row['uploaddate']}</td>";
            echo "<td><img src=\"../posters/{$row['pic']}\" width=60 height=60</td>";
            echo "<td><a href=\"videoEdit.php?vid={$row['vid']}\">修改</a>|" .
                "<a href=\"doVideoDelete.php?vid={$row['vid']}\">删除</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>