<?php
$ssid = $_POST['ssid'];
$array = explode($ssid, ',');
$ret_arr = array("success" => true);
for ($c = 0; $c < count($array); $c++) {
    $item = $array[$c];
    $list = WeChatCart\GetCartByScid($item);
    $row = Sqli\sqli_get_map($list);
    $success = WeChatorder\Insert($row['cid'], $row['uid'], $row['sc_num']);
    if (!$success) {
        $ret_arr = array("success" => false, "msg" => "未知错误");
        break;
    }
    $success = WeChatCart\Delete($item);
    if (!$success) {
        $ret_arr = array("success" => false, "msg" => "未知错误");
        break;
    }
}
$json = json_encode($ret_arr);
echo $json;
