<?php
include_once("./include.php");


Sqli\sqli_init();

if (!isset($_POST['a_email'])) {
    include_once("./system/CheckLogin.php");
    $aid = $_SESSION['admin_id'];
    $list = admin\GetAdminById($aid);
    $row = Sqli\sqli_get_map($list);
    $a_email = $row['a_email'];
} else
    $a_email = $_POST['a_email'];
$password1 = $_POST['password1'];


$success = admin\UpdatePassword($password1, $a_email);
if ($success)
    $list = admin\GetAdminByEmail($a_email);
else {
    header("location:index.php?success=false&msg=遇到了未知错误");
    exit;
}
$row = Sqli\sqli_get_map($list);
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