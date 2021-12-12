<?php
include_once("include.php");
ob_start();
Sqli\sqli_init();
$array;
if (!isset($_POST['u_email']))
    $array = array("success" => false, "msg" => "do not have email");
else {
    $u_email = $_POST['u_email'];
    srand(time());
    $rand_num = rand(1000, 9999);
    $content = "[game模拟器] 尊敬的$u_email :我们收到了您 修改密码的申请 校验码:$rand_num\n如非本人操作，请无视该邮件.";
    Email\sendMail($u_email, "game模拟器", $content);
    $array = array("success" => true, "msg" => $rand_num);
}
$json = json_encode($array);
ob_clean();
echo $json;
