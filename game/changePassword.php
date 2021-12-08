<?php
include_once("./include.php");
session_start();
$get_id = $_GET['new_id'];
if (!isset($_SESSION[$get_id])) {
    header("Location:index.php");
    exit();
}
$a_email = $_SESSION[$get_id];
unset($_SESSION[$get_id]);
?>
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
    <script type="text/javascript">
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
        <?php
        if (isset($_GET['success'])) {
        ?>

            alert('<?php echo $_GET['msg']; ?>');

        <?php
        }
        ?>

        $(function() {
            $('#form').submit(function() {
                'use strict';
                let password1 = $('#password1').val();
                let password2 = $('#password2').val();
                if (password1 === password2)
                    return true;
                else {
                    $('#alert-msg').show();
                    return false;
                }
            });
        })
    </script>
</head>

<body class="bg-light">

    <div class="container">
        <div class="py-5 text-center">
            <img class="d-block mx-auto mb-4" src="./resources/images/page/登陆.png" alt="" width="72" height="72">
            <h2>后台管理系统</h2>
            <p class="lead">
                更新密码
            </p>
        </div>

        <div class="alert alert-dismissable alert-danger" id="alert-msg" style="display: none;">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                ×
            </button>
            两次密码不一致
        </div>

        <form class="needs-validation" novalidate action="doChangePassword.php" method="POST" id="form">
            <input type="hidden" name="a_email" value="<?php echo $a_email; ?>">
            <div class="row">

                <div class="col-md-12 order-md-1">
                    <div class="mb-3">
                        <label for="password1">请输入新的密码 <span class="text-muted"></span></label>
                        <input type="password" class="form-control" id="password1" placeholder="你的新的登陆密码" name="password1" required>
                        <div class="invalid-feedback">
                            密码是必填项
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="password2">确认密码 <span class="text-muted"></span></label>
                        <input type="password" class="form-control" id="password2" placeholder="确认你的密码" name="password2" required>
                        <div class="invalid-feedback">
                            密码是必填项
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