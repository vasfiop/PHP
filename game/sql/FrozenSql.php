<?php

namespace frozen;

use function Sqli\sqli_get_list;

include_once("../Util/mysqli.php");

function GetFrozen()
{
    $sql = "SELECT * FROM frozen JOIN user on frozen.uid = user.uid JOIN admin on admin.aid = frozen.aid";

    return sqli_get_list($sql);
}

function GetFrozenBySearch($search)
{
    $sql = "SELECT * FROM frozen JOIN user on frozen.uid = user.uid JOIN admin on admin.aid = frozen.aid WHERE u_name like '%$search%'";

    return sqli_get_list($sql);
}
