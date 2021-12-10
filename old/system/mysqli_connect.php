<?php
//链接数据库
namespace mysql_connect;
static $con = null;
function sqli_init(){
    global $con;//global 调用静态属性的方法
    $con = mysqli_connect("localhost","root","","neuvideo","3306");
    // $con->query("set names utf8");
    mysqli_set_charset($con,"utf8");
    if(mysqli_connect_errno($con)){
        echo"链接MySQl失败：";
        mysqli_connect_error();
    }else{
        return $con;
    }
}
function sqli_ctrl($array){
    global $con;//global 调用静态属性的方法
    if (!isset($con)) {
        echo "请先建立数据库的链接";
        return;
    }else{
        if(mysqli_connect_errno($con)){
            echo "链接MySQL失败";
            mysqli_connect_error();
        }
    }
    return mysqli_query($con,$array);
}
?>