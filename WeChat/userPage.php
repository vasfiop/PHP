<?php
include_once("include.php");
$img = "http://460d80b632.zicp.vip/WeChat/image/small-rotation29.png";
Sqli\sqli_init();
$array = array(
    array("name" => "客户服务", "img_src" => $img),
    array("name" => "寄件服务", "img_src" => $img),
    array("name" => "我的预约", "img_src" => $img),
    array("name" => "我的问答", "img_src" => $img),
    array("name" => "闲置换钱", "img_src" => $img),
    array("name" => "充值中心", "img_src" => $img),
    array("name" => "我的爱车", "img_src" => $img),
    array("name" => "高价回收", "img_src" => $img),
    array("name" => "抽碰撞红包", "img_src" => $img),
    array("name" => "闪电退款S+", "img_src" => $img),
    array("name" => "特价机票", "img_src" => $img)
);
$json = json_encode($array);
echo $json;
