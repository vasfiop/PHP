<?php
include_once("./tql/head.php");
include_once("./include.php");
include_once("./system/CheckLogin.php");
include_once("./tql/header.php");
?>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <a class="card-text" href="adminUpdate.php">
                        更改个人资料
                    </a>
                </div>
                <div class="card-body">
                    <a class="card-text" href="adminPassword.php">
                        更改密码
                    </a>
                </div>
                <div class="card-body">
                    <a class="card-text" href="adminChangeEmail.php">
                        更改绑定邮箱
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-9">
        </div>
    </div>
</div>
<?php
include_once("./tql/footer.php");
?>