<?php
include_once("../../Util/file_upload_check.php");
include_once("../../Util/GetRandNumber.php");
include_once("../../Util/mysqli.php");
Sqli\sqli_init();
$sql = "select * from users";
$list = Sqli\sqli_ctrl($sql);
$count = mysqli_num_rows($list);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <p>请输入用户名:
    <form action="" method="post">
        <input type="text" name="search">
        <button type="submit">搜索</button>
    </form>
    </p>

    <div align="center">
        <p>注册用户表共<?php echo $count; ?></p>
        <table border="1">
            <tr>
                <td>序号</td>
                <td>用户名</td>
                <td>性别</td>
                <td>电话</td>
                <td>头像</td>
                <td>电子邮件</td>
                <td>操作</td>
            </tr>
            <?php
            $i = 1;
            while ($row = mysqli_fetch_assoc($list)) {
                echo "<tr>";
                echo "<td>" . $i . "</td>";
                echo "<td>" . $row["uname"] . "</td>";
                $sex =  $row['gender'] == '1' ? '女' : '男';
                echo "<td>" . $sex . "</td>";
                echo "<td>" . $row['tel'] . "</td>";
                echo "<td><img src=\" " . $row['photo'] . "\"></td>";
                echo "<td>" . $row["email"] . "</td>";
                echo '<td><a href="">修改</a>|<a href="">删除</a></td>';
                echo "</tr>";
                $i++;
            }
            ?>
        </table>
    </div>
</body>

</html>