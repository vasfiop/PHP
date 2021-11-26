<?php

namespace admin;

use function Sqli\sqli_get_list;
use function Sqli\sqli_update;

include_once("../Util/mysqli.php");

function GetAdminByTel($tel, $password)
{
    $sql = "SELECT * FROM admin WHERE a_telephone = '$tel' AND a_password = md5($password)";

    return sqli_get_list($sql);
}
function GetAdminByEmail($email, $password)
{
    $sql = "SELECT * FROM admin where a_email = '$email' and a_password = md5($password)";

    return sqli_get_list($sql);
}
