<?php
$email = $_POST['email'];
$pass_world = $_POST['pass_world'];
$name = $_POST['name'];
$sex = $_POST['sex'];
$date = $_POST['date'];
$now = $_POST['now'];
$address = $_POST['address'];
$tongyi = $_POST['tongyi'];

if($sex=="1")
    $sex='男';
else
    $sex='女';

switch ($now) {
    case '1':
        $now="在工作";
        break;
    case '2':
        $now="在上学";
        break;
    case '3':
        $now="其他";
        break;
    default:
        $now="error";
        break;
}
echo "页面跳转成功，你注册信息如下";
echo "<br>";
echo "您的电子邮箱是：". $email;
echo "<br>";
echo "您的密码是：". $pass_world;
echo "<br>";
echo "您的姓名是:". $name;
echo "<br>";
echo "您的性别是:". $sex;
echo "<br>";
echo "您的生日是：". $date;
echo "<br>";
echo "您现在的状态是：". $now;
echo "<br>";
echo "您现在的居住地是：". $address;
echo "<br>";
echo $tongyi;
echo "<br>";
