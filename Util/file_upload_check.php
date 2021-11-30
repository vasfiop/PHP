<?php

namespace file_upload_check;

include_once("GetRandNumber.php");

use function Get_Rand\Get_Rand;

$all_type = array(
    "pic" => array("jpg", "jpeg", "png", "gif", "Bmp", "flv"),
);

function file_upload_check($file) // 检查上传文件
{
    $success = true;
    if ($file["error"]) {
        switch ($file["error"]) {
            case 1:
            case 2:
                echo "<script>console.log('ERROR::FILE::文件尺寸超过了配置文件的最大值');</script>";
                $success = false;
                break;
            case 3:
                echo "<script>console.log('ERROR::FILE::部分文件上传');</script>";
                $success = false;
                break;
            case 4:
                echo "<script>console.log('ERROR::FILE::没有文件上传');</script>";
                $success = false;
                break;
            case 6:
                echo "<script>console.log('ERROR::FILE::找不到临时文件夹');</script>";
                $success = false;
                break;
            case 7:
                echo "<script>console.log('ERROR::FILE::文件写入失败');</script>";
                $success = false;
                break;
            default:
                echo "<script>console.log('SUCCESS::FILE::文件上传');</script>";
                break;
        }
    }

    return $success;
}
function file_upload_extension($file, $extension_array) // 第一个是文件，第二个是对比类型 具体数据在最上面
{
    global $all_type;
    $extension_array = $all_type[$extension_array];
    $name = $file["name"];
    $arr = explode(".", $name);
    $suffix = $arr[count($arr) - 1];
    if (!in_array($suffix, $extension_array)) {
        echo "<script>console.log('ERROR::FILE::这不是允许上传的文件类型');</script>";
        return false;
    }

    return true;
}
function Get_File_name($file)
// 获得随机文件名
{
    $file_extend = explode(".", $file["name"]);
    $address =  date('Ymdhis') . Get_Rand(000, 999) . "." . $file_extend[count($file_extend) - 1];

    return $address;
}
function Move_File($file, $address)
{
    move_uploaded_file($file["tmp_name"], $address);
}
