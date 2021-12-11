<?php
include_once("include.php");
$array = array();
Sqli\sqli_init();
$list = WeChatsort\GetSort();
while ($row = Sqli\sqli_get_map($list)) {
    $item = $row;
    $smallsort = WechatSmallsort\GetSmallsortBySid($row['sid']);
    $item['smallsort'] = array();
    while ($smallsort_row = Sqli\sqli_get_map($smallsort)) {
        $ss_item = $smallsort_row;
        $ss_item['commodity'] = array();
        $comm_list = WeChatcommodity\GetCommBySmallsort($smallsort_row['ssid']);
        while ($comm_row = Sqli\sqli_get_map($comm_list)) {
            $comm_row['c_pic'] = $img_src . $comm_row['c_pic'];
            array_push($ss_item['commodity'], $comm_row);
        }
        array_push($item['smallsort'], $ss_item);
    }
    array_push($array, $item);
}
$json = json_encode($array);
echo $json;
