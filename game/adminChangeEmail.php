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
    $(document).ready(function() {
        bsCustomFileInput.init()
    });
</script>


<div class="container">
    <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="./resources/images/page/登陆.png" alt="" width="72" height="72">
        <h2>您正在操作重要信息，我们需要验证您的身份</h2>
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

    <div class="row">
        <div class="col-md order-md-1">

            <form class="needs-validation" novalidate method="POST" action="doChackPassword.php">
                <input name="mode" value="0" type="hidden">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="password">请输入登陆的密码</label>
                        <input type="password" class="form-control" id="password" placeholder="" required name="a_password">
                        <div class="invalid-feedback">
                            请输入您的登陆密码
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