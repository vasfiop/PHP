<?php
include_once("./include.php");

$a_email = $_POST['a_email'];

Sqli\sqli_init();
$list = admin\GetAdminByEmail($a_email);
if ($list->num_rows != 0) {
    header("location:adminNewEmail.php?msg=该邮箱已被注册!");
    exit();
}

session_start();
if (!isset($_SESSION['new_email']))
    $new_email = array();
else
    $new_email = $_SESSION['new_email'];

ob_start();
$num = count($new_email);
$new_id = date('dhis') . rand();
$new_email[$new_id] = $a_email;
$_SESSION['new_email'] = $new_email;
$aid = $_SESSION['admin_id'];
$url = "http://460d80b632.zicp.vip/game/checkNewEmail.php?new_id=$new_id&aid=$aid";
$content = "[后台管理系统] 尊敬的$a_name :我们收到了您 更改绑定的申请 确认无误后请点击下连接确认操作：$url \n如非本人操作，请无视该邮件.";
Email\sendMail($a_email, "后台管理系统验证", $content);
ob_clean();

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
            提交成功！
        </h4>
        请去注册邮箱验证网址
    </div>
</body>

</html>