<?php
include_once("../Util/email.php");
include_once("../Util/GetRandNumber.php");
include_once("../Util/file_upload_check.php");
include_once("../Util/mysqli.php");

include_once("SQL/sort.php");
include_once("SQL/commodity.php");
include_once("SQL/user.php");
include_once("SQL/brand.php");
include_once("SQL/smallsort.php");
include_once("SQL/order.php");
include_once("SQL/cart.php");

$img_src = "http://460d80b632.zicp.vip/game/resources/images/commodity/";
$user_src = "http://460d80b632.zicp.vip/game/resources/images/user/";
$brand_src = "http://460d80b632.zicp.vip/game/resources/images/brand/";
session_start();
