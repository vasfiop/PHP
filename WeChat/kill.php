
<?php
$img_src = "http://460d80b632.zicp.vip/game/resources/images/commodity/";

include_once("include.php");
Sqli\sqli_init();
$list = commodity\GetKill();
$array = array();
while ($row = Sqli\sqli_get_map($list)) {
    $row['c_pic'] = $img_src . $row['c_pic'];
    array_push($array, $row);
}
$json = json_encode($array);
echo $json;
?>