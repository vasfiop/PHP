<?php
header("content-type:text/html;charset=utf-8");
require_once("./email.php");
echo sendMail("1941399592@qq.com", "你好", "欢迎来到php世界");
