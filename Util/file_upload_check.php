<?php

namespace file_upload_check;

function file_upload_check($file_error)
{
    if ($file_error) {
        switch ($file_error) {
            case 1:
                echo "ERROR::FILE::文件尺寸超过了配置文件的最大值";
                break;
            case 3:
                echo "ERROR::FILE::部分文件上传";
                break;
            case 4:
                echo "ERROR::FILE::没有文件上传";
                break;
            default:
                echo "ERROR::FILE::未知错误";
                break;
        }
    }
}
