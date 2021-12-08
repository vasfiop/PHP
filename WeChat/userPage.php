<?php
include_once("include.php");
Sqli\sqli_init();
$list = array();
$array = array(
    array("name" => "客户服务", "img_src" => ""),
    array("name" => "寄件服务", "img_src" => ""),
    array("name" => "我的预约", "img_src" => ""),
    array("name" => "我的问答", "img_src" => ""),
    array("name" => "闲置换钱", "img_src" => ""),
    array("name" => "充值中心", "img_src" => ""),
    array("name" => "我的爱车", "img_src" => ""),
    array("name" => "高价回收", "img_src" => ""),
    array("name" => "抽碰撞红包", "img_src" => ""),
    array("name" => "闪电退款S+", "img_src" => ""),
    array("name" => "特价机票", "img_src" => ""),
);
$list[0] = $array;
$json = json_encode($list);
echo $json;
