<?php
include_once('include.php');
Sqli\sqli_init();
$array = array();
if (!isset($_POST['sid'])) {
    $array = array("success" => false, "msg" => "没有sid");
} else {
    $sid = $_POST['sid'];
    $list = brand\GetBrandBySid($sid);
    while ($row = Sqli\sqli_get_map($list)) {
        $row['b_pic'] = $brand_src . $row['b_pic'];
        array_push($array, $row);
    }
}
$json = json_encode($array);
echo $json;