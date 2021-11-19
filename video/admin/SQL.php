<?php

namespace my_sql;

use function Sqli\sqli_ctrl;
use function Sqli\sqli_get_list;
use function Sqli\sqli_update;

include_once("../../Util/mysqli.php");
function GetUsers() // 获得所有用户
{
    $sql = "select * from users";
    $list = sqli_ctrl($sql);

    return $list;
}

function GetUserById($id) // 通过id获得某个用户
{
    $sql = "select * from users where uid = '$id'";
    $list = sqli_ctrl($sql);

    return $list;
}

function GetVideoType() // 获取所有视频类型
{
    $sql = "select * from videotype";
    $list = sqli_get_list($sql);

    return $list;
}

function AddVideo($videoname, $videotype, $filename, $videointro, $address)
{
    $sql = "insert into videos values(null,'$videoname','$videotype','$videointro',now(),'$filename','$address')";

    $list = sqli_update($sql);

    return $list;
}
