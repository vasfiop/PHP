<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="doAdminLogin.php" method="post">
        <table border="1">
            <tr>
                <td>用户名</td>
                <td><input type="text" name="adminName"></td>
            </tr>
            <tr>
                <td>密码</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td><button type="submit">登陆</button></td>
                <td><button>重置</button></td>
            </tr>
        </table>
    </form>
</body>

</html>