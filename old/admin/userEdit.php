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
     include_once('inc_admin.php');
     use function mysql_connect\sqli_init;
     sqli_init();
     $uid = $_GET["uid"];
     $rs = UserList($uid);
     $row = mysqli_fetch_assoc($rs);
    ?>
    <form action="doUserUpdate.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="uid" value="<?php echo $row["uid"];?>">
        <table border="1">
            <tr>
                <td>用户名</td>
                <td><input type="text" name="username" value="<?php echo $row["uname"];?>"></td>
            </tr>
            <tr>
                <td>密码</td>
                <td>
                    <input type="password" name="password"
                    value="<?php echo $row["password"]?>">
                </td>
            </tr>
            <tr>
                <td>性别</td>
                <td>
                    <input type="radio" name="gender" value="0"
                    <?php if($row["gender"]==0) echo "checked";?>>男
                    <input type="radio" name="gender" value="1"
                    <?php if($row["gender"]==1) echo "checked";?>>女
                </td>
            </tr>
            <tr>
                <td>电话</td>
                <td><input type="text" name="tel"
                value="<?php echo $row["tel"];?>"></td>
            </tr>
            <tr>
                <td>头像</td>
                <td><input type="file" name="pic">原头像 
                <img src="../images/<?php echo $row["photo"]?>"
                width="100" height="100"></td>
            </tr>
            <tr>
                <td>邮箱</td>
                <td><input type="email" name="email"  value="<?php echo $row["email"];?>"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" value="修改">
                    <input type="reset" value="重置">
                </td>
            </tr>
        </table>
    </form>
    <?php
    require_once('tpl/footer.php');
    ?>
</body>
</html>