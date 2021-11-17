<?php

namespace my_sql;

use function Sqli\sqli_ctrl;

include_once("../../Util/mysqli.php");
function GetUsers()
{
    $sql = "select * from users";
    $list = sqli_ctrl($sql);

    return $list;
}

function GetUserById($id)
{
    $sql = "select * from users where uid = '$id'";
    $list = sqli_ctrl($sql);

    return $list;
}
