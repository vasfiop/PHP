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
</script>

<div class="container">
    <div class="py-5 text-center">
    </div>

    <div class="row">

        <div class="col-md order-md-1">
            <h4 class="mb-3">添加商品类型</h4>
            <form class="needs-validation" novalidate action="doTypeAdd.php" method="POST">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName">类型名称</label>
                        <input type="text" class="form-control" id="firstName" placeholder="" value="" required name="t_name">
                        <div class="invalid-feedback">
                            类型名称是必填的
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