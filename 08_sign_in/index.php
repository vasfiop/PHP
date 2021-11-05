<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="test.php" method="post">
        <p>还没有开心网账号？赶紧注册把！</p>
        <p>电子邮箱：<input type="email" name="email"></p>
        <p>创建密码：<input type="passworld" name="pass_world"></p>
        <p>姓名：<input type="text" name="name"></p>
        <p>性别：<input type="radio" name="sex" value="1">男
            <input type="radio" name="sex" value="0">女
        </p>
        <p>生日：<input type="date" name="date"></p>
        <p>我现在：<input type="radio" name="now" value="1"> 在工作
            <input type="radio" name="now" value="2"> 在上学
            <input type="radio" name="now" value="3"> 其他
        </p>
        <p>居住地：<input type="text" name="address"></p>
        <p><input type="checkbox" name="tongyi">同意<a href="#">开心网服务条款</a></p>
        <button type="submit">立即注册</button>
    </form>
</body>

</html>