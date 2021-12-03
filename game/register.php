<!doctype html>
<html lang="en">

<head>
    <title>后台管理系统</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="./resources/WebContent/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./resources/WebContent/css/all_style.css">
    <script src="./resources/WebContent/jquery/jquery-3.6.0.min.js"></script>
    <script src="./resources/WebContent/bootstrap/js/bootstrap.bundle.min.js"></script>

    <link href="./resources/WebContent/css/form-validation.css" rel="stylesheet">
    <script>
        (function() {
            'use strict'
            window.addEventListener('load', function() {
                var forms = document.getElementsByClassName('needs-validation')
                Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
            }, false)
        })()
    </script>
</head>

<body class="bg-light">

    <div class="container">
        <div class="py-5 text-center">
            <img class="d-block mx-auto mb-4" src="./resources/images/page/登陆.png" alt="" width="72" height="72">
            <h2>后台管理系统</h2>
            <p class="lead">
                注册成为一个管理员
            </p>
        </div>

        <?php
        if (isset($_GET['msg'])) {
        ?>
            <div class="alert alert-dismissable alert-danger">
                <button type="button" class="close" data - dismiss="alert" aria - hidden="true">
                    ×
                </button>
                <?php
                echo $_GET['msg'];
                ?>
            </div>
        <?php
        }
        ?>

        <form class="needs-validation" novalidate action="doRegister.php" method="POST">
            <div class="row">

                <div class="col-md-12 order-md-1">

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="firstName">你的昵称</label>
                            <input type="text" class="form-control" id="firstName" placeholder="" value="" required name="a_name">
                            <div class="invalid-feedback">
                                昵称是必填项
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email">电子邮件 <span class="text-muted">(作为你的登陆账号)</span></label>
                        <input type="email" class="form-control" id="email" placeholder="你的登陆邮箱" name="a_email">
                        <div class="invalid-feedback">
                            请输入合法的电子邮件
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="tel">手机号码 </label>
                        <input type="tel" class="form-control" id="tel" placeholder="你的手机号码" required name="a_telphone">
                        <div class="invalid-feedback">
                            手机号码是必填项
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="password">设置密码 </label>
                        <input type="password" class="form-control" id="password" placeholder="你的登陆密码" required name="password">
                        <div class="invalid-feedback">
                            密码是必填项目
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="password1">确认密码 </label>
                        <input type="password" class="form-control" id="password1" placeholder="" required name="password_two">
                        <div class="invalid-feedback">
                            密码是必填项目
                        </div>
                    </div>

                    <hr class="mb-4">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">提交</button>
                </div>
            </div>
        </form>
    </div>

    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2021 Background Management System</p>
    </footer>
    </div>

</body>

</html>