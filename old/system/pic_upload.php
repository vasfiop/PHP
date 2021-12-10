<?php

namespace pic_upload;


$all_type = array(
    "pic" => array("jpg", "jpeg", "png", "gif", "Bmp", "flv"),
);
//$head_pic = "pic";
// $file = $_FILES[$head_pic];
// $upload = false;
function file_upload_check($file) // 检查上传文件
{
    $success = true;
    if ($file["error"]>0) {
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
//判断文件扩展名
function file_upload_extension($file, $extension_array) // 第一个是文件，第二个是对比类型 具体数据在最上面
{
    global $all_type;
    $extension_array = $all_type[$extension_array];
    $name = $file["name"];
    $arr = explode(".", $name);
    $suffix = $arr[count($arr) - 1];//文件扩展名
    if (!in_array($suffix, $extension_array)) {
        echo "<script>console.log('ERROR::FILE::这不是允许上传的文件类型');</script>";
        return false;
    }

    return true;
}
//文件的上传文件名
function Get_File_name($file)
{
    $arr = explode(".", $file["name"]);
    $suffix = $arr[count($arr) - 1];
    $randname =  date('Ymdhis') . rand(000, 999) . "." . $suffix;
    return $randname;
}
//文件上传
function Move_File($file, $randname)
{
    $upload =  move_uploaded_file($file["tmp_name"], "../images/".$randname);
    return $upload;
}
