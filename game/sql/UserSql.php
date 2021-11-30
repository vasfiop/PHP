<?php

namespace user;

use function Sqli\sqli_get_list;

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
