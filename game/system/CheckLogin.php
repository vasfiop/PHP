<?php
session_start();
if (!isset($_SESSION['admin_id']))
    header("location:index.php");

function redirect($address, $msg)
{
    echo $msg . '<br>';
    header("refresh:5;url='$address'");
    echo "<a href=\"$address\">如果没反应,请点击跳转</a>";
}
