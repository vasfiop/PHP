<?php

namespace user;

use function Sqli\sqli_get_list;
use function Sqli\sqli_update;

include_once("../Util/mysqli.php");

function GetUser()
{
    $sql = "SELECT * from user";

    return sqli_get_list($sql);
}
function GetUserBySearch($search)
{
    $sql = "SELECT * from user where u_name like '%$search%'";

    return sqli_get_list($sql);
}
function GetUserById($uid)
{
    $sql = "SELECT * from user where uid = $uid";

    return sqli_get_list($sql);
}
function Update($uid, $u_name, $u_tel, $u_sex, $u_pic, $u_email)
{
    if ($u_pic == null)
        $sql = "UPDATE user SET u_name = '$u_name', u_email = '$u_email',u_telphone = '$u_tel' ,u_sex = '$u_sex' WHERE uid = $uid";
    else
        $sql = "UPDATE user SET u_name = '$u_name', u_email = '$u_email',u_telphone = '$u_tel' ,u_sex = '$u_sex' , u_pic = '$u_pic' WHERE uid = $uid";

    return sqli_update($sql);
}
function GetUserByEmail($u_email)
{
    $sql = "SELECT * from user where u_email = '$u_email'";

    return sqli_get_list($sql);
}
function GetUserByTel($u_telphone)
{
    $sql = "SELECT * from user where u_telphone = '$u_telphone'";

    return sqli_get_list($sql);
}
