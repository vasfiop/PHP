<?php
include_once("./include.php");

Sqli\sqli_init();

if (!isset($_GET['new_id'])) {
    header("location:index.php");
    exit;
} else {
    $new_id = $_GET['new_id'];
    $aid = $_GET['aid'];
    session_start();
    $new_email = $_SESSION['new_email'][$new_id];
    $success = admin\UpdateEmail($new_email, $aid);
    if ($success) {
        $list = admin\GetAdminById($new_id);
        $row = Sqli\sqli_get_map($list);
    } else {
        header("location:index.php?success=false&msg=遇到了未知错误");
        exit;
    }
}
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
        尊敬的<?php echo $row['a_name']; ?>,您已成功修改密码
        3秒返回登陆页面
    </div>
</body>

</html>
<?php
header("refresh:3;url='index.php'");
?>