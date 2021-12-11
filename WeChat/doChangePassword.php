<?php
include_once("include.php");
Sqli\sqli_init();
$array;
if (!isset($_POST['u_eamil']))
    $array = array("success" => false, "msg" => "do not have email");
else if (!isset($_POST['u_password']))
    $array = array("success" => false, "msg" => "do not have password");
else {
    $u_email = $_POST['u_email'];
    $u_password = $_POST['u_password'];
    $success = WeChatuser\UpdatePasswordByEmail($u_email, $u_password);
    if ($success)
        $array = array("success" => true);
    else
        $array = array("success" => false, "msg" => "unknown error");
}
$json = json_encode($array);
echo $json;
