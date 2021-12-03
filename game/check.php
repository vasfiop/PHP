<?php
include_once("./include.php");
session_start();
$count = $_GET['count'];
$new_id = $_GET['new_id'];
$new_admin = $_SESSION['new_admin'];
$this_admin = $new_admin[number_format($count)][$new_id];
Sqli\sqli_init();
$success = admin\Insert($this_admin[0], $this_admin[1], $this_admin[2], $this_admin[3]);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>后台管理系统</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="./resources/WebContent/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./resources/WebContent/css/all_style.css">
    <script src="./resources/WebContent/jquery/jquery-3.6.0.min.js"></script>
    <script src="./resources/WebContent/bootstrap/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="alert alert-success alert-dismissable">

        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
            ×
        </button>
        <h4>
            验证成功！
        </h4>
        尊敬的<?php echo $this_admin[0] ?>,您已成功注册账户
        3秒返回登陆页面
    </div>
</body>

</html>
<?php
header("refresh:3;url='index.php'");
?>