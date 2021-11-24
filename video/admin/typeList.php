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
    $list = my_sql\GetVideoType();
    ?>
    <table border="1" align="center">
        <tr>
            <th>序号</th>
            <th>类别名称</th>
            <th>操作</th>
            <?php
            $i = 1;
            while ($row = mysqli_fetch_assoc($list)) {
                echo "<tr>";
                echo "<td>$i</td>";
                echo "<td>{$row['typename']}</td>";
                echo "<td><a href=\"typeEdit.php?tid={$row['tid']}\">修改</a>" .
                    "|<a href=\"doTypeDelete.php?tid={$row['tid']}\" onclick=\"return confirm('你确定吗?')\">删除</a></td>";
                echo "</tr>";
            }
            ?>
        </tr>
    </table>
</body>

</html>