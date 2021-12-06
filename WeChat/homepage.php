<?php
include_once("include.php");
Sqli\sqli_init();
$list = WeChatsort\GetSortByNum(null);
$array = array();
while ($row = Sqli\sqli_get_map($list)) {
    array_push($array,$row);
}
$json = json_encode($array);
echo $json;