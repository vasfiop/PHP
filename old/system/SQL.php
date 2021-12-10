<?php

use function mysql_connect\sqli_ctrl;

function UserDelete($uid)
{
    $sql = "delete from users where uid=$uid";
    $rs = sqli_ctrl($sql);
    return $rs;
}
function UserList($uid)
{
    $sql = "select * from users where uid=$uid";
    $rs = sqli_ctrl($sql);
    return $rs;
}
function UserName($name)
{
    $sql = "select * from admins where adminname='$name'";
    $rs = sqli_ctrl($sql);
    return $rs;
}
function UserUpdatePic($userName, $gender, $telephone, $email, $randname, $uid)
{
    $sql = "update users set uname='$userName', gender='$gender', 
    tel='$telephone',email='$email',photo='$randname' where uid=$uid";
    $rs = sqli_ctrl($sql);
    return $rs;
} //有图片
function UserUpdate($userName, $gender, $telephone, $email, $uid)
{
    $sql = "update users set uname='$userName', gender='$gender', 
    tel='$telephone',email='$email' where uid=$uid";
    $rs = sqli_ctrl($sql);
    return $rs;
} //没有图片
function ContrastType($typeName)
{
    $sql = "select * from videotype where typename='$typeName'";
    $rs = sqli_ctrl($sql);
    return $rs;
}
function AddType($typeName)
{ //添加视频分类
    $sql = "insert into videotype values(null,'$typeName')";
    $rs = sqli_ctrl($sql);
    return $rs;
}
function TypeList()
{ //视频查找
    $sql = "select * from videotype";
    $rs = sqli_ctrl($sql);
    return $rs;
}
function TypeTid($tid)
{ //根据id查找当前视频分类
    $sql = "select * from videotype where tid='$tid'";
    $rs = sqli_ctrl($sql);
    return $rs;
}
function TypeUpdate($typename, $tid)
{
    $sql = "update videotype set typename='{$typename}' where tid='{$tid}'";
    $rs = sqli_ctrl($sql);
    return $rs;
}
function TypeDelect($tid)
{
    $sql = "delete from videotype where tid='$tid'";
    $rs = sqli_ctrl($sql);
    return $rs;
}
function VideoAdd($videoname, $videotype, $randname, $videointro, $uploadadmin, $address)
{
    $sql = "insert into videos values(null,'$videoname','$videotype','$randname','$videointro',now(),'$uploadadmin',0,0,'$address')";
    $rs = sqli_ctrl($sql);
    return $rs;
}
function VideoList($key)
{
    if (isset($_GET["key"])) {
        $key = trim($_GET["key"]);
        $sql = "select * from videos join videotype on videotype.tid=videos.tid where videoname like '%{$key}%'";
    } else {
        $sql = "select * from videos join videotype on videotype.tid=videos.tid";
    }

    $rs = sqli_ctrl($sql);
    return $rs;
}
function VideoVid($vid)
{
    $sql = "select * from videos where vid = '$vid'";
    $rs = sqli_ctrl($sql);
    return $rs;
}
function VideoUpdate($videoname, $videotype, $uploadadmin, $videointro, $address, $vid, $pic_name)
{
    if ($pic_name == null)
        $sql = "UPDATE videos set videoname = '$videoname',tid = $videotype , uploaddate=now() , uploadadmin = '$uploadadmin' , intro = '$videointro' , address = '$address' where vid = '$vid'";
    else
        $sql = "UPDATE videos set videoname = '$videoname',tid = $videotype , uploaddate=now() , uploadadmin = '$uploadadmin' , intro = '$videointro' , address = '$address',pic= '$pic_name' where vid = '$vid'";

    $rs = sqli_ctrl($sql);

    return $rs;
}
function VideoDelete($vid)
// 删除视频
{
    $sql = "DELETE from videos where vid = '$vid'";

    $rs = sqli_ctrl($sql);

    return $rs;
}
function CommentList()
// 查找所有留言
{
    $sql = "SELECT * from comments a,videos b,users c where a.vid = b.vid and a.uid=c.uid";
    $rs = sqli_ctrl($sql);
    return $rs;
}
function CommentDelete($cid)
{
    $sql = "DELETE from comments where cid = '$cid'";
    $rs = sqli_ctrl($sql);
    return $rs;
}
function UpdateAdminPass($adminname, $password)
{
    $sql = "UPDATE admins set password = md5($password) where adminname='$adminname'";
    $rs = sqli_ctrl($sql);
    return $rs;
}
function GetVideoType() // 获取所有视频类型
{
    $sql = "SELECT * from videotype";
    $rs = sqli_ctrl($sql);

    return $rs;
}
function SearchVideo($key) // 搜索视频
{
    $sql = "SELECT * FROM videos JOIN videotype on videotype.tid = videos.tid where videoname LIKE '%{$key}%'";

    $list = sqli_ctrl($sql);

    return $list;
}
function GetVideoTypeById($tid)
// 通过id找到视频类型
{
    $sql = "SELECT * from videotype WHERE tid = '$tid'";

    return sqli_ctrl($sql);
}
function GetVideoByRanking()
// 搜索视频排行
{
    $sql = "SELECT * from videos order by hittimes desc limit 6";
    return sqli_ctrl($sql);
}
function GetVideoByTypeIdForNumber($tid)
{
    $sql = "SELECT * FROM videos WHERE tid = $tid limit 6";
    return sqli_ctrl($sql);
}
function GetFirstVideo()
// 查找数据库第一个视频
{
    $sqli = "SELECT * from videos order by vid limit 1";
    return sqli_ctrl($sqli);
}
function GetVideoById($vid) // 按照id搜索视频
{
    $sql = "SELECT * FROM videos WHERE vid = '$vid'";

    return sqli_ctrl($sql);
}
function GetScoreById($vid)
{
    $sql = "SELECT avg(score) from levels where vid = $vid";
    return sqli_ctrl($sql);
}
function GetAdminById($adminid)
// 通过id搜索admin
{
    $sql = "SELECT * from admins where adminid = $adminid";
    return sqli_ctrl($sql);
}
