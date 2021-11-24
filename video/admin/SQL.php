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

function AddVideo($videoname, $videotype, $filename, $videointro, $address) // 添加视频
{
    $sql = "insert into videos values(null,'$videoname','$videotype','$videointro',now(),'$filename','$address')";

    $list = sqli_update($sql);

    return $list;
}

function GetUserPic($uid) // 获取用户的头像
{
    $sql = "SELECT photo FROM users WHERE uid = '$uid'";

    $list = sqli_update($sql);

    return  $list;
}

function GetVides() // 获取所有视频
{
    $sql = "SELECT * FROM videos JOIN videotype ON videotype.tid = videos.tid";

    $list = sqli_get_list($sql);

    return $list;
}

function SearchVideo($key) // 搜索视频
{
    $sql = "SELECT * FROM videos JOIN videotype on videotype.tid = videos.tid where videoname LIKE '%{$key}%'";

    $list = sqli_get_list($sql);

    return $list;
}
function GetVideoById($vid) // 按照id搜索视频
{
    $sql = "SELECT * FROM videos WHERE vid = '$vid'";

    $list = sqli_get_list($sql);

    return $list;
}
function UpdateVideo($videoname, $videotype, $uploadadmin, $videointro, $address, $vid, $pic_name) // 更新视频
// 更新video
{
    if ($pic_name == null)
        $sql = "UPDATE videos set videoname = '$videoname',tid = $videotype , uploaddate=now() , uploadadmin = '$uploadadmin' , intro = '$videointro' , address = '$address' where vid = '$vid'";
    else
        $sql = "UPDATE videos set videoname = '$videoname',tid = $videotype , uploaddate=now() , uploadadmin = '$uploadadmin' , intro = '$videointro' , address = '$address',pic= '$pic_name' where vid = '$vid'";

    $row = sqli_update($sql);

    return $row;
}
function DeleteVideo($vid)
// 删除视频
{
    $sql = "DELETE from videos where vid = '$vid'";

    $row = sqli_update($sql);

    return $row;
}
function GetVideoTypeById($tid)
// 通过id找到视频类型
{
    $sql = "SELECT * from videotype WHERE tid = '$tid'";

    return sqli_get_list($sql);
}
function UpdateVideoType($tid, $typename)
// 更新视频类型列表
{
    $sql = "UPDATE videotype set typename='$typename' where tid = '$tid'";

    return sqli_update($sql);
}
function DeleteVideoType($tid)
// 删除视频
{
    $sql = "DELETE from videotype where tid = '$tid'";
    return sqli_update($sql);
}
function InsertVideoType($typename)
// 添加视频类型
{
    $sql = "INSERT into videotype value(null,'$typename')";
    return sqli_update($sql);
}
