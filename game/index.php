<!doctype html>
<html lang="en">

<head>
    <title>后台管理系统</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="./resources/WebContent/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./resources/WebContent/css/all_style.css">
    <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
    <script src="./resources/WebContent/jquery/jquery-3.6.0.min.js"></script>
    <!-- 最新的 Bootstrap4 核心 JavaScript 文件 -->
    <script src="./resources/WebContent/bootstrap/js/bootstrap.bundle.min.js"></script>
</head>

<body class="text-center">

    <link href="./resources/WebContent/css/signin.css" rel="stylesheet">

    <form class="form-signin" method="POST" action="doAdminLogin.php">
        <!-- TODO 登陆图片 72*72的图片 -->
        <img class="mb-4" src="" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">请登录</h1>
        <?php
        if (isset($_GET['success'])) {
        ?>
            <div class="alert alert-dismissable alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    ×
                </button>
                账户或密码错误！
            </div>
        <?php
        }
        ?>
        <label for="inputEmail" class="sr-only">邮件地址/手机号码</label>
        <input type="text" id="inputEmail" class="form-control" placeholder="邮件地址/手机号码" required autofocus name="name">
        <label for="inputPassword" class="sr-only">密码</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="密码" required name="password">
        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">登陆</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2017-2021</p>
    </form>

</body>

</html>