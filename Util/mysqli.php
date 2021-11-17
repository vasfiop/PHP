<?php

namespace Sqli;

static $con = null;

function sqli_init()
{
    global $con;
    $con = mysqli_connect("localhost", "root", "", "neuvideo");
    if (mysqli_connect_errno($con)) {
        echo "连接MySQL失败";
        mysqli_connect_error();
    }
    mysqli_set_charset($con, "utf8");
}
function sqli_ctrl($array)
{
    global $con;

    if ($con == null) {
        echo 'console.log("error::mysqli::数据库还未建立连接")';
        return false;
    }

    return mysqli_query($con, $array);
}
function sqli_get_list($sql)
{
    global $con;

    if ($con == null) {
        echo 'console.log("error::mysqli::数据库还未建立连接")';
        return false;
    }

    return mysqli_query($con, $sql);
}
function sqli_update($sql)
{
    global $con;

    if ($con == null) {
        echo 'console.log("error::mysqli::数据库还未建立连接")';
        return false;
    }

    return mysqli_query($con, $sql);
}
function sqli_close()
{
    global $con;

    if ($con == null) {
        echo 'console.log("error::mysqli::未连接数据库")';
        return false;
    } else
        mysqli_close($con);
}
