<?php
require_once('tpl/header.php');
include_once('inc_admin.php');

use function mysql_connect\sqli_init;
use function  pic_upload\file_upload_check;
use function pic_upload\file_upload_extension;
use function pic_upload\Get_File_name;
use function pic_upload\Move_File;
session_start();
$con = sqli_init();
$name = $_SESSION['adminName'];
$videoname = trim($_POST['videoname']);
$videotype = $_POST['videotype'];
$videointro = $_POST['videointro'];
$address = $_POST['address'];
$rs0 = UserName($name);
$row0 = mysqli_fetch_assoc($rs0);
$uploadadmin = $row0["adminid"];
$head_pic = "pic";
$file = $_FILES[$head_pic];
$upload = false;
$success = file_upload_check($file);
if ($success) {
    if (file_upload_extension($file, "pic")) {
        $randname = Get_File_name($file);
        $upload = Move_File($file,$randname);
        if(!$upload){
            echo "文件上传失败";
            exit;
        }
    }else{
        echo "文件类型不正确";
        exit;
    }
} else {
    exit;
}
$rs = VideoAdd($videoname,$videotype,$randname,$videointro,$uploadadmin,$address) or die("插入失败".mysqli_error($con));
$num = mysqli_affected_rows($con);
if($num!=1){
    redirect('videoAdd.php','添加失败，3秒后返回添加');
}else{
    redirect('videolist.php','添加成功，3秒后返回视频列表');
}
?>
<?php
require_once('tpl/footer.php');
?>





