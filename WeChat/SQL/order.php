<?php

namespace WeChatorder;

use function Sqli\sqli_get_list;
use function Sqli\sqli_update;

function Insert($cid,$uid,$o_num){
    $sql = "INSERT into commodityorder value(null,$cid,$uid,0,$o_num)";

    return sqli_update($sql);
}
function GetOrderByUid($uid){
    $sql = "SELECT * from commodityorder join commodity on commodityorder.cid = commodity.cid where uid = $uid";

    return sqli_get_list($sql);
}