<?php
namespace commodity;

use function Sqli\sqli_get_list;

function GetKill(){
    $sql = "SELECT * FROM commodity LIMIT 15";

    return sqli_get_list($sql);
}
?>