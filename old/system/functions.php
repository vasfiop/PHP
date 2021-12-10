<?php
namespace functions_email;
use PHPMailer\PHPMailer\PHPMailer;

function sendMail($to, $title, $content)
{
    require_once("../src/PHPMailer.php");
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
    $mail->Host = 'smtp.qq.com';
    $mail->Port = 465;
    $mail->CharSet = 'UTF-8';
    $mail->FromName = '熊猫';
    $mail->Username = '2624833118@qq.com';
    $mail->Password = 'tglpoehilibjeabb';
    $mail->From = '2624833118@qq.com';
    $mail->isHTML(true);

    $mail->addAddress($to);
    $mail->Subject = $title;
    $mail->Body =  $content;
    $mail->addAttachment('./5.jpg');
    return $mail->send(); 
}
