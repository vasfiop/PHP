<?php

use function Get_Rand\Get_Rand;

include_once("../Util/GetRandNumber.php");
include_once("../Util/file_upload_check.php");
file_upload_check\file_upload_check($_FILES["pic"]["error"]);
file_upload_check\file_upload_check($_FILES["file"]["error"]);

$rand_number = Get_Rand(111, 999);
$userName = $_POST["userName"];
$major = $_POST["major"];
$school = $_POST["school"];
$pic_name = $_FILES["pic"]["name"];
$file_name = $_FILES["file"]["name"];
$file_extend = explode(".", $pic_name);
move_uploaded_file($_FILES["pic"]["tmp_name"], "./photo/" . date('YMDHIS') . $rand_number . "." . $file_extend[count($file_extend) - 1]);
$file_extend = explode(".", $file_name);
move_uploaded_file($_FILES["file"]["tmp_name"], "./resume/" . date('YMDHIS') . $rand_number . "." .  $file_extend[count($file_extend) - 1]);

echo "<strong>" . $userName . "</strong>所学的专业是:<strong>" . $major . "</strong>,就读与:<strong>" . $school . "</strong>.";
echo "<br>";
echo "照片已经上传";
echo "<br>";
echo "简历已经上传";
