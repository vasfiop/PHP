<?php

namespace WeChatuser;

use function Sqli\sqli_get_list;
use function Sqli\sqli_update;

function GetUser($u_email, $u_password)
{
    $sql = "SELECT * from user where u_email = '$u_email' and u_password = md5($u_password)";

    return sqli_get_list($sql);
}

function GetUserByEmail($u_email)
{
    $sql = "SELECT * from user where u_email = '$u_email'";

    return sqli_get_list($sql);
}
function Insert($u_name, $u_email, $u_password, $filename, $sex, $u_telphone)
{
    $sql = "INSERT INTO user VALUES(null,'$u_name',md5($u_password), '$u_email' , $u_telphone , now() , 1,$sex,'$filename',0,0)";

    return sqli_update($sql);
}
function GetUserByUid($uid)
{
    $sql = "SELECT * from user where uid = $uid";

    return sqli_get_list($sql);
}
function UpdateCollection($uid, $u_collection)
{
    $sql = "UPDATE user set u_collection = $u_collection where uid = $uid";

    return  sqli_update($sql);
}
function UpdateHistory($uid, $u_history)
{
    $sql = "UPDATE user set u_history = $u_history where uid = $uid";

    return sqli_update($sql);
}
function UpdatePasswordByEmail($u_email,$u_password)
{
    $sql = "UPDATE user set u_password = md5($u_password) where  u_email = '$u_email'";

    return sqli_update($sql);
}