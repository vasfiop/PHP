<?php
include_once("include.php");
sqli\sqli_init();
$scid = $_POST['scid'];
$sc_num = $_POST['sc_num'];

$success = WeChatCart\UpdateNumById($scid, $sc_num);
$array = array();
if ($success) {
    $array = array("success"=>true);
}
else
    $array = array("success"=>false,"msg"=>"未知错误！");
$json = json_encode($array);
echo $json;