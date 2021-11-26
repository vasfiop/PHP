<?php

namespace my_sql;

use mysqli_result;

use function my_sql\GetVideoType as My_sqlGetVideoType;
use function Sqli\sqli_ctrl;
use function Sqli\sqli_get_list;
use function Sqli\sqli_update;

include_once(__DIR__ . "/../../Util/mysqli.php");
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
    $sql = "SELECT * from videotype";
    $list = sqli_get_list($sql);

    return $list;
}

function AddVideo($videoname, $videotype, $filename, $admin_id, $videointro, $address) // 添加视频
{
    $sql = "insert into videos values(null,'$videoname','$videotype','$filename','$videointro',now(),$admin_id,0,0,'$address')";

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

    return sqli_get_list($sql);
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
function GetCommentByOrder()
// 查找所有留言
{
    $sql = "SELECT * from comments a,videos b,users c where a.vid = b.vid and a.uid=c.uid";
    return sqli_get_list($sql);
}
function GetComment()
// 查找所有留言无排序
{
    $sql = "SELECT * from comments";
    return sqli_get_list($sql);
}
function DeleteComment($cid)
{
    $sql = "DELETE from comments where cid = '$cid'";
    return sqli_update($sql);
}
function UpdateAdminPass($adminname, $password)
{
    $sql = "UPDATE admins set password = md5($password) where adminname='$adminname'";

    return sqli_update($sql);
}
function GetUserBySearch($key)
// 通过搜索用户名
{
    $sql = "SELECT * FROM users where uname LIKE '%{$key}%'";

    return sqli_get_list($sql);
}
function DeleteUser($uid)
// 删除用户
{
    $sql = "DELETE from users where uid = '$uid'";
    return sqli_update($sql);
}
function GetVideoByTypeIdForNumber($tid)
{
    $sql = "SELECT * FROM videos WHERE tid = $tid limit 6";
    return sqli_get_list($sql);
}
function GetVideoByRanking()
// 搜索视频排行
{
    $sql = "SELECT * from videos order by hittimes desc limit 6";
    return sqli_get_list($sql);
}
function GetFirstVideo()
// 查找数据库第一个视频
{
    $sqli = "SELECT * from videos order by vid limit 1";
    return sqli_get_list($sqli);
}
function GetAdminById($adminid)
// 通过id搜索admin
{
    $sql = "SELECT * from admins where adminid = $adminid";
    return sqli_get_list($sql);
}
function GetScoreById($vid)
{
    $sql = "SELECT avg(score) from levels where vid = $vid";
    return sqli_get_list($sql);
}
function GetVideoByTypeId($tid)
{
    $sql = "SELECT * from videos where tid = $tid";

    return sqli_get_list($sql);
}