<?php

namespace WeChatCart;

use function Sqli\sqli_get_list;
use function Sqli\sqli_update;

function GetCartByUid($uid)
{
    $sql = "SELECT * from shoppingcart join commodity on shoppingcart.cid = commodity.cid where shoppingcart.uid = $uid";

    return sqli_get_list($sql);
}
function UpdateNumById($scid, $sc_num)
{
    $sql = "UPDATE shoppingcart set sc_num = $sc_num where scid = $scid";

    return sqli_update($sql);
}
function GetCartByScid($scid)
{
    $sql = "SELECT * from shoppingcart where scid = $scid";

    return sqli_get_list($sql);
}
function Delete($scid)
{
    $sql = "DELETE from shoppingcart where scid = $scid";

    return sqli_update($sql);
}
function Insert($uid, $cid)
{
    $sql = "INSERT into shoppingcart value(null,$uid,$cid,0,1)";

    return sqli_update($sql);
}
