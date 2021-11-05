<?php

namespace Email;

use PHPMailer\PHPMailer\PHPMailer;

function sendMail($to, $title, $content) // to=收件人邮箱 title=发件标题 content=内容
{
    require_once("../PHPMailer/src/PHPMailer.php");
    $mail = new PHPMailer();
    $mail->SMTPSecure = 'ssl';
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    $mail->SMTPDebug = 1;
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->Host = "smtp.qq.com";
    $mail->Port = 465;
    $mail->CharSet = "UTF-8";
    $mail->FromName = 'PHP邮件验证'; // 发件人名称
    $mail->Username = "1941399592@qq.com"; // 发件人SMTP注册人邮箱
    $mail->Password = 'tmcbhkrnpuetbjhd';
    $mail->From = "1941399592@qq.com";  // 发件人邮箱
    $mail->isHTML(true);

    $mail->addAddress($to);
    $mail->Subject = $title;
    $mail->Body = $content;
    return $mail->send();
}
