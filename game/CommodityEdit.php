<?php
include_once("./tql/head.php");
include_once("./include.php");
include_once("./system/CheckLogin.php");
$cid = $_GET['cid'];
Sqli\sqli_init();
$list = commodity\GetCommodityById($cid);
$row = Sqli\sqli_get_map($list);
$type_list = type\GetType();
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
    <form class="" novalidate action="doCommodityEdit.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo $row['cid']; ?>" name="cid">
        <div class="row">

            <div class="col-md-12">
                <h4 class="mb-3">添加商品</h4>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName">商品名称</label>
                        <input type="text" class="form-control" id="c_name" placeholder="" value="<?php echo $row['c_name']; ?>" required name="c_name">
                        <div class="invalid-feedback">
                            商品名称是必填项
                        </div>
                    </div>
                </div>

            </div>


            <div class="col-md-12 mb-3">
                <label for="textarea">商品简介</label>
                <div class="input-group">
                    <textarea class="form-control" aria-label="With textarea" id="textarea" name="c_area"><?php echo $row['c_area'] ?></textarea>
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="sel1">商品类型</label>
                    <select class="form-control" id="sel1" name="type">
                        <?php
                        while ($line = mysqli_fetch_assoc($type_list)) {
                        ?>
                            <option value="<?php echo $line['tid']; ?>" <?php echo $line['tid'] == $row['tid'] ? 'selected' : '' ?>><?php echo $line['t_name']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>

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

            <div class="col-md-6 mb-3">
                <!-- XXX 想将图片显示变成异步，用户每次上传完新的图片的时候，这个图片就会变成新的 -->
                <img alt="Bootstrap Image Preview" src="<?php echo COMMIMG . $row['c_pic']; ?>" class="img-thumbnail" />
            </div>

            <div class="col-md-12 mb-3">
                <button class="btn btn-primary btn-lg btn-block" type="submit">提交</button>
            </div>

        </div>
    </form>
</div>

<?php
include_once("./right.php");
