<?php

namespace type;

use function Sqli\sqli_get_list;
use function Sqli\sqli_update;

include_once("../Util/mysqli.php");
function GetType()
{
    $sql = "SELECT * from type";

    return sqli_get_list($sql);
}
function GetTypeBySearch($search)
{
    $sqli = "SELECT * from type where t_name like '%$search%'";

    return sqli_get_list($sqli);
}
function AddType($t_name)
{
    $sql = "INSERT INTO type VALUES(null,'$t_name')";

    return sqli_update($sql);
}
function GetTypeById($tid)
{
    $sql = "SELECT * from type where tid = $tid";

    return sqli_get_list($sql);
}
function Update($tid, $t_name)
{
    $sql = "UPDATE type SET t_name = '$t_name' WHERE tid = $tid";

    return  sqli_update($sql);
}
function Delete($tid)
{
    $sql = "DELETE FROM type WHERE tid = $tid";

    return sqli_update($sql);
}
