<?php
$ctrl = array("Success", "Locked", "Started", "AvailableForStart");
$count = array("Success" => 0, "Locked" => 0, "Started" => 0, "notfind" => 0, "AvailableForStart" => 0);
$file = fopen("character.json", "r") or exit("无法打开文件!");
$file_1 = fopen("quest.json", "r") or exit("无法打开文件!");
// 读取文件每一行，直到文件结尾
$str = "";
$str_1 = "";
$all_count = 0;
while (!feof($file))
    $str = $str . fgets($file);
while (!feof($file_1))
    $str_1 = $str_1 . fgets($file_1);
$array = json_decode($str, true);
$array_1 = json_decode($str_1, true);

for ($i = 0; $i < count($array['Quests']); $i++) {
    $row = $array['Quests'][$i]['status'];
    $all_count++;
    switch ($row) {
        case "Success":
            $count['Success']++;
            break;
        case "Locked":
            $count['Locked']++;
            break;
        case "Started":
            $count['Started']++;
            break;
        case "AvailableForStart":
            $count['AvailableForStart']++;
            break;
        default:
            echo "第" . $all_count . "个任务<br>";
            echo "qid是:" . $array['Quests'][$i]['qid'] . "<br>";
            echo "任务状态:" . $row . "<br>";
            $count['notfind']++;
            break;
    }
    if (!isset($array_1[$array['Quests'][$i]['qid']])) {
        echo "未找到此任务";
        echo "第" . $all_count . "个任务<br>";
        echo "qid是:" . $array['Quests'][$i]['qid'] . "<br>";
    }
}

echo $all_count;
echo "<br>";
var_dump($count);

fclose($file);
