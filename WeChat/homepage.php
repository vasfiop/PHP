<?php
include_once("include.php");
Sqli\sqli_init();
$list = sort\GetSortByNum(4);
$array = array();
while ($row = Sqli\sqli_get_map($list)) {
    array_push($array,$row);
}
$json = json_encode($array);
echo $json;