<?php
include_once("./tql/head.php");
include_once("./include.php");
include_once("./system/CheckLogin.php");
$uid = $_GET['uid'];
Sqli\sqli_init();
$list = user\GetUserById($uid);
$row = Sqli\sqli_get_map($list);
$createtime = $row['u_createtime'];
$array = explode(" ", $createtime);
$year = $array[0];
$min = $array[1];
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
        <img class="d-block mx-auto mb-4" src="<?php echo USERIMG . $row['u_pic']; ?>" alt="" width="72" height="72">
        <h2><?php echo $row['u_name']; ?></h2>
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
            <form class="needs-validation" novalidate method="POST" action="doUserEdit.php" enctype="multipart/form-data">
                <div class="row">
                    <input type="hidden" value="<?php echo $uid; ?>" name="uid">
                    <input type="hidden" value="<?php echo $row['u_pic'] ?>" name="old_pic">
                    <div class="col-md-6 mb-3">
                        <label for="firstName">昵称</label>
                        <input type="text" class="form-control" id="firstName" placeholder="" value="<?php echo $row['u_name'] ?>" required name="u_name">
                        <div class="invalid-feedback">
                            昵称是必填项
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email">邮箱 <span class="text-muted"></span></label>
                    <input type="email" class="form-control" id="email" placeholder="登陆账号" required value="<?php echo $row['u_email'] ?>" name="u_email">
                    <div class="invalid-feedback">
                        邮箱是必填项
                    </div>
                </div>

                <div class="mb-3">
                    <label for="tel">手机 <span class="text-muted"></span></label>
                    <input type="tel" class="form-control" id="tel" placeholder="手机号" required value="<?php echo $row['u_telphone'] ?>" name="u_telphone">
                    <div class="invalid-feedback">
                        手机号是必填项
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="country">性别</label>
                            <select class="custom-select" id="country" required name="u_sex">
                                <option value="">选择...</option>
                                <option value="0" <?php echo $row['u_sex'] ? '' : 'selected' ?>>女性</option>
                                <option value="1" <?php echo $row['u_sex'] ? 'selected' : '' ?>>男性</option>
                            </select>
                            <div class="invalid-feedback">
                                请选择一个性别
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="date">创建日期</label>
                            <input type="date" class="form-control" id="date" value="<?php echo $year; ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="time">创建时间</label>
                            <input type="time" class="form-control" id="time" value="<?php echo $min; ?>" readonly>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupFileAddon01">上传</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="file">
                                <label class="custom-file-label" for="inputGroupFile01">选择文件</label>
                            </div>
                        </div>
                    </div>
                </div>

                <button class="btn btn-primary btn-lg btn-block" type="submit">提交</button>
            </form>
        </div>
    </div>

</div>

<?php
include_once("./right.php");
