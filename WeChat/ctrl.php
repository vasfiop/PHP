<?php
$ctrl = array("Success", "Locked", "Started", "AvailableForStart");
$count = array("Success" => 0, "Locked" => 0, "Started" => 0, "notfind" => 0, "AvailableForStart" => 0);
$file = fopen("test.json", "r") or exit("无法打开文件!");
// 读取文件每一行，直到文件结尾
$str = "";
$str_1 = "";
$all_count = 0;
while (!feof($file))
    $str = $str . fgets($file);
$array = json_decode($str, true);

fclose($file);