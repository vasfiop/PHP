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

    if (!sqli_check_connection()) {
        echo "数据库还未建立连接！";
        exit();
    }

    $result = mysqli_query($con, $sql);
    if (!sqli_check_select($result))
        die("sql=$sql,查询失败!<br>" . mysqli_error($con) . "<br>");

    return $result;
}
function sqli_update($sql)
{
    global $con;

    if (!sqli_check_connection())
        return false;

    $result = mysqli_query($con, $sql);
    if (!$result)
        die("sql=$sql,更新失败!<br>" . mysqli_error($con) . "<br>");

    return $result;
}
function sqli_close()
{
    global $con;

    if (!sqli_check_connection())
        return false;
    else
        mysqli_close($con);
    $con = null;
}
function sqli_check_select($list)
{

    if (!sqli_check_connection())
        sqli_init();
    $count = mysqli_num_rows($list);
    if ($count)
        return true;
    else
        return false;
}
function sqli_get_count()
{
    global $con;

    if (!sqli_check_connection())
        sqli_init();

    return mysqli_affected_rows($con);
}
function sqli_check_connection()
{
    global $con;

    if ($con == null)
        return false;
    else
        return true;
}
