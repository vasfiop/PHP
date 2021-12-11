<?php
include_once("include.php");
$img = "http://460d80b632.zicp.vip/WeChat/image/";
Sqli\sqli_init();
$array = array(
    array("name" => "客户服务", "img_src" => $img . "small-rotation29.png"),
    array("name" => "寄件服务", "img_src" => $img . "userpage_11.png"),
    array("name" => "我的预约", "img_src" => $img . "userpage_7.png"),
    array("name" => "我的问答", "img_src" => $img . "userpage_3.png"),
    array("name" => "闲置换钱", "img_src" => $img . "userpage_8.png"),
    array("name" => "充值中心", "img_src" => $img . "userpage_1.png"),
    array("name" => "我的爱车", "img_src" => $img . "userpage_10.png"),
    array("name" => "高价回收", "img_src" => $img . "userpage_6.png"),
    array("name" => "抽碰撞红包", "img_src" => $img . "userpage_4.png"),
    array("name" => "闪电退款S+", "img_src" => $img . "userpage_2.png"),
    array("name" => "特价机票", "img_src" => $img . "userpage_9.png"),
    array("name" => "小炒本", "img_src" => $img . "userpage_5.png")
);
$json = json_encode($array);
echo $json;
