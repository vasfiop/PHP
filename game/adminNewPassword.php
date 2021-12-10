<?php
include_once("./tql/head.php");
include_once("./include.php");
include_once("./system/CheckLogin.php");
include_once("./tql/header.php");

?>
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
        })
    });
</script>


<div class="container">
    <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="./resources/images/page/登陆.png" alt="" width="72" height="72">
        <h2>修改登陆密码</h2>
    </div>

    <?php
    if (isset($_GET['msg'])) {
    ?>
        <div class="alert alert-dismissable alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                ×
            </button>
            <?php
            echo $_GET['msg'];
            ?>
        </div>
    <?php
    }
    ?>

    <div class="alert alert-dismissable alert-danger" id="alert-msg" style="display: none;">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
            ×
        </button>
        两次密码不一致
    </div>

    <div class="row">
        <div class="col-md order-md-1">

            <form class="needs-validation" novalidate method="POST" action="doChangePassword.php" id="form">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="password1">请输入新的登陆的密码</label>
                        <input type="password" class="form-control" id="password1" placeholder="" required name="password1">
                        <div class="invalid-feedback">
                            请输入新的登录密码
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="password2">确认新的登录密码</label>
                        <input type="password" class="form-control" id="password2" placeholder="" required name="a_password2">
                        <div class="invalid-feedback">
                            请输入新的登陆密码
                        </div>
                    </div>
                </div>

                <button class="btn btn-primary btn-lg btn-block" type="submit">提交</button>
            </form>
        </div>
    </div>
</div>
<?php
include_once("./tql/footer.php");
?>