<?php

namespace admin;

use function Sqli\sqli_get_list;
use function Sqli\sqli_update;

include_once("../Util/mysqli.php");

function GetAdminByEmailPass($email, $password)
{
    $sql = "SELECT * FROM admin where a_email = '$email' and a_password = md5($password)";

    return sqli_get_list($sql);
}
function GetAdminByEmail($email)
{
    $sql = "SELECT * FROM admin where a_email = '$email'";

    return sqli_get_list($sql);
}
function UpdateAdminTime($aid)
{
    $sql = "UPDATE admin set a_lastlogintime = now() where aid = $aid";

    return sqli_update($sql);
}
function GetAdminById($aid)
{
    $sql = "SELECT * from admin where aid = $aid";

    return sqli_get_list($sql);
}
function GetAdminByTel($a_telphone)
{
    $sql = "SELECT * FROM admin WHERE a_telphone = '$a_telphone'";

    return sqli_get_list($sql);
}
function Insert($a_name, $a_email, $a_telphone, $a_password)
{
    $sql = "INSERT INTO admin VALUES(null,'$a_name',md5($a_password), now() , '$a_email' , '$a_telphone' , now() , 1)";

    return sqli_update($sql);
}
function UpdatePassword($password, $a_email)
{
    $sql = "UPDATE admin set a_password = md5($password) where a_email = '$a_email'";

    return sqli_update($sql);
}
function UpdateNameTel($aid, $a_name, $a_telphone)
{
    $sql = "UPDATE admin set a_name = '$a_name' , a_telphone = '$a_telphone' where aid = $aid";

    return sqli_update($sql);
}
