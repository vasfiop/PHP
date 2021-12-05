<?php
include_once("./tql/head.php");
include_once("./include.php");
include_once("./system/CheckLogin.php");
include_once("./tql/header.php");
$aid = $_SESSION['admin_id'];
Sqli\sqli_init();
$list = admin\GetAdminById($aid);
$row = Sqli\sqli_get_map($list);
$create_time = $row['a_createtime'];
$lastlogintime = $row['a_lastlogintime'];
$array = explode(" ", $create_time);
$create_year = $array[0];
$create_min = $array[0];
$array = explode(" ", $lastlogintime);
$last_year = $array[0];
$last_min = $array[1];

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
    <?php
    if (isset($_GET['success'])) {
    ?>
        alert("操作失败！请联系作者！");
    <?php
    }
    ?>
    $(document).ready(function() {
        bsCustomFileInput.init()
    });
</script>


<div class="container">
    <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="./resources/images/page/登陆.png" alt="" width="72" height="72">
        <h2><?php echo $row['a_name']; ?></h2>
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
            <!-- TODO admin更新个人资料 -->
            <form class="needs-validation" novalidate method="POST" action="">
                <div class="row">
                    <input type="hidden" value="<?php echo $aid; ?>" name="aid">
                    <div class="col-md-6 mb-3">
                        <label for="firstName">昵称</label>
                        <input type="text" class="form-control" id="firstName" placeholder="" value="<?php echo $row['a_name'] ?>" required name="a_name">
                        <div class="invalid-feedback">
                            昵称是必填项
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email">邮箱 <span class="text-muted"></span></label>
                    <input type="email" class="form-control" id="email" placeholder="登陆账号" required value="<?php echo $row['a_email'] ?>" readonly name="a_email">
                    <div class="invalid-feedback">
                        邮箱是必填项
                    </div>
                </div>

                <div class="mb-3">
                    <label for="tel">手机 <span class="text-muted"></span></label>
                    <input type="tel" class="form-control" id="tel" placeholder="手机号" required value="<?php echo $row['a_telphone'] ?>" name="a_telphone">
                    <div class="invalid-feedback">
                        手机号是必填项
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="date">创建日期</label>
                            <input type="date" class="form-control" id="date" value="<?php echo $create_year; ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="time">创建时间</label>
                            <input type="time" class="form-control" id="time" value="<?php echo $create_min; ?>" readonly>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="date">最近日期</label>
                            <input type="date" class="form-control" id="date" value="<?php echo $last_year; ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="time">最近时间</label>
                            <input type="time" class="form-control" id="time" value="<?php echo $last_min; ?>" readonly>
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