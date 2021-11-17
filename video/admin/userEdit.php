<?php
include_once("../../Util/mysqli.php");
include_once("SQL.php");
$uid = $_GET['id'];
Sqli\sqli_init();
$list = my_sql\GetUserById($uid);
$row = mysqli_fetch_assoc($list);
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
    <form action="doUserUpdate.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="uid" value="<?php echo $row['uid'] ?>">
        <table border="1">
            <tr>
                <td>用户名</td>
                <td><input name="userName" type="text" value="<?php echo $row['uname']; ?>"></td>
            </tr>
            <tr>
                <td>密码</td>
                <td><input name="password" type="password" value="<?php echo $row['password']; ?>"></td>
            </tr>
            <tr>
                <td>性别</td>
                <td>
                    <input type="radio" name="sex" value="0" <?php echo $row['gender'] == 1 ? "" : "checked"; ?>>男
                    <input type="radio" name="sex" value="1" <?php echo $row['gender'] == 1 ? "checked" : ""; ?>>女
                </td>
            </tr>
            <tr>
                <td>电话</td>
                <td><input type="tel" name="tel" value="<?php echo $row['tel'] ?>"></td>
            </tr>
            <tr>
                <td>头像</td>
                <td><input type="file" name="file">原头像<img src="../image/<?php echo $row['photo']; ?>"></td>
            </tr>
            <tr>
                <td>邮箱</td>
                <td><input type="email" name="email" value="<?php echo $row['email'] ?>"></td>
            </tr>
            <tr>
                <td><button type="submit">提交</button></td>
                <td><button onclick="location.reload();">重置</button></td>
            </tr>
        </table>
    </form>
</body>

</html>