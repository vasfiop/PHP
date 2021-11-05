<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="check_password.php" method="post">
        <table border="1">
            <tbody>
                <tr>
                    <td>请输入验证码</td>
                    <td><input type="number" name="verification_code"></td>
                </tr>
                <tr>
                    <td>请输入密码</td>
                    <td><input type="password" name="password"></td>
                </tr>
                <tr>
                    <td>请再次输入密码</td>
                    <td><input type="password" name="dec_password"></td>
                </tr>
                <tr>
                    <td colspan="2"><button type="submit">修改密码</button></td>
                </tr>
            </tbody>
        </table>
    </form>

</body>

</html>