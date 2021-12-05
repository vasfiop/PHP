<?php
$img_src = "http://460d80b632.zicp.vip/WeChat/image/";
$array = array(
    array(
        array("name" => "京东超市", "img_src" => $img_src . "small-rotation1.png"),
        array("name" => "京东家电", "img_src" => $img_src . "small-rotation2.png"),
        array("name" => "京东服饰", "img_src" => $img_src . "small-rotation3.png"),
        array("name" => "京东手机", "img_src" => $img_src . "small-rotation4.png"),
        array("name" => "低价爆款", "img_src" => $img_src . "small-rotation5.png"),
        array("name" => "新人福利", "img_src" => $img_src . "small-rotation6.png"),
        array("name" => "1元抢购", "img_src" => $img_src . "small-rotation7.png"),
        array("name" => "领京豆", "img_src" => $img_src . "small-rotation2.png"),
        array("name" => "领优惠劵", "img_src" => $img_src . "small-rotation2.png"),
        array("name" => "免费水果", "img_src" => $img_src . "small-rotation2.png")
    ),
    array(
        array("name" => "充值中心", "img_src" => $img_src . "small-rotation2.png"),
        array("name" => "京东国际", "img_src" => $img_src . "small-rotation2.png"),
        array("name" => "视频号", "img_src" => $img_src . "small-rotation2.png"),
        array("name" => "超然青年", "img_src" => $img_src . "small-rotation2.png"),
        array("name" => "拍拍二手", "img_src" => $img_src . "small-rotation2.png"),
        array("name" => "沃尔玛", "img_src" => $img_src . "small-rotation2.png"),
        array("name" => "京东电器", "img_src" => $img_src . "small-rotation2.png"),
        array("name" => "排行榜", "img_src" => $img_src . "small-rotation2.png"),
        array("name" => "京东生鲜", "img_src" => $img_src . "small-rotation2.png"),
        array("name" => "京东到家", "img_src" => $img_src . "small-rotation2.png")
    ),
    array(
        array("name" => "领现金", "img_src" => $img_src . "small-rotation2.png"),
        array("name" => "京东特价", "img_src" => $img_src . "small-rotation2.png"),
        array("name" => "女装", "img_src" => $img_src . "small-rotation2.png"),
        array("name" => "电脑", "img_src" => $img_src . "small-rotation2.png"),
        array("name" => "寄件服务", "img_src" => $img_src . "small-rotation2.png"),
        array("name" => "新品首发", "img_src" => $img_src . "small-rotation2.png"),
        array("name" => "京东试用", "img_src" => $img_src . "small-rotation2.png"),
        array("name" => "京东图书", "img_src" => $img_src . "small-rotation2.png"),
        array("name" => "发现好货", "img_src" => $img_src . "small-rotation2.png"),
        array("name" => "京东家居", "img_src" => $img_src . "small-rotation2.png")
    )
);
$json = json_encode($array);
echo $json;
