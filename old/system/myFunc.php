<?php
function redirect($url, $msg)
{
    echo $msg . '<a href="' . $url . '">如果没有跳转。请点这里跳转</a>';
    header("refresh:3;url=$url");
}
