<?php

namespace commodity;

use function Sqli\sqli_get_list;
use function Sqli\sqli_update;

function GetCommodity()
{
    $sql = "SELECT * from commodity join type on commodity.tid = type.tid";
    
    return sqli_get_list($sql);
}
function GetCommodityBySearch($search)
{
    $sql = "SELECT * from commodity join type on commodity.tid = type.tid where c_name like '%$search%'";

    return sqli_get_list($sql);
}
function InsertInto($c_name,$c_area,$file,$type)
{
    $sql = "INSERT INTO commodity VALUES(null,'$c_name',$type,'$c_area','$file')";

    return sqli_update($sql);
}