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
$admin = $_SESSION['adminName'];
echo "1";
$rs = UserName($admin);
$row = mysqli_fetch_assoc($rs);
$uploadadmin = $row["adminid"];
$vid = $_POST['vid'];
$videoname = $_POST['videoname'];
$videotype = $_POST['videotype'];
$videointro = $_POST['videointro'];
$address = $_POST['address'];
$oldpic = $_POST['oldpic'];
$head_pic = "pic";
$file = $_FILES[$head_pic];
$upload = false;
$randname = null;
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
    $rs = VideoUpdate($videoname, $videotype, $uploadadmin, $videointro, $address, $vid, $randname);
}
if($upload){

    $filename = "../images/" . $oldpic;
    //如果头像图片文件存在，则删除头像文件
    if (file_exists($filename)) { //判定文件是否存在
        unlink($filename);
    }
    $rs = VideoUpdate($videoname, $videotype, $uploadadmin, $videointro, $address, $vid, $randname);
}
$rs = $rs or die("sql语句错误更新失败!<br>".mysqli_error($con));
$num = mysqli_affected_rows($con);
if($num !=1){
    redirect('videoList.php','修改失败！3秒后返回视频列表!');
}else{
    redirect('videoList.php','修改成功！3秒后返回视频列表!');
}
?>
<?php
require_once('tpl/footer.php');
?>