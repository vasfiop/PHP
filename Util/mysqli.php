<?php

namespace Sqli;

use mysqli_result;

define('DB_HOST', "localhost");
define('DB_USERNAME', "root");
define('DB_PASSWORD', "");
define('DB_PORT', "game");

static $con = null;

function sqli_init()
{
    global $con;
    $con = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_PORT);
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
function sqli_get_list($sql) // select
{
    global $con;

    if (!sqli_check_connection()) {
        echo "数据库还未建立连接！";
        exit();
    }

    $result = mysqli_query($con, $sql);

    if (is_bool($result))
        die("sql=$sql,查询失败!<br>" . mysqli_error($con) . "<br>");

    if (!($result->num_rows))
        return $result;

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
function sqli_get_map($mysqli_result)
{
    if (!($mysqli_result instanceof mysqli_result))
        return false;
    return mysqli_fetch_assoc($mysqli_result);
}

class Sqli
{
    private $con;

    private  $DB_HOST = "localhost";
    private  $DB_USERNAME = "root";
    private  $DB_PASSWORD = "";
    private  $DB_PORT = "neuvideo";


    public function __constant()
    // 构造函数
    {
        $this->con = mysqli_connect($this->DB_HOST, $this->DB_USERNAME, $this->DB_PASSWORD, $this->DB_PORT);
    }

    public function sqli_get_list($sql)
    {
        if (!sqli_check_connection()) {
            echo "数据库还未建立连接！";
            exit();
        }

        $result = mysqli_query($this->con, $sql);
        if ($result->num_rows == 0)
        // 没找到元素
        {
        }
        if (is_bool($result))
            die("sql=$sql,查询失败!<br>" . mysqli_error($this->con) . "<br>");

        return $result;
    }

    public function __destruct()
    // 析构函数
    {
        $this->con = null;
    }
}
