<?php
include_once("include.php");
Sqli\sqli_init();
$array = array();
if (!isset($_POST['cid']))
    $array = array("success" => false, "msg" => "do not have cid");
else if (!isset($_POST['uid']))
    $array = array("success" => false, "msg" => "do not have uid");
else {
    $uid = $_POST['uid'];
    $cid = $_POST['cid'];
    $success = WeChatCart\Insert($uid, $cid);
    if ($success)
        $array = array("success" => true);
    else
        $array = array("success" => false);
}
$json = json_encode($array);
echo $json;