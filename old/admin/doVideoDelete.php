<?php
require_once('tpl/header.php');
include_once('inc_admin.php');
use function mysql_connect\sqli_init;
$con = sqli_init();
$vid = $_GET["vid"];
$rs = VideoVid($vid);
$row = mysqli_fetch_assoc($rs);
$filename = "../images/".$row["pic"];
if(file_exists($filename)){
    unlink($filename);
}
$rs = VideoDelete($vid);
$num = mysqli_affected_rows($con);
if($num!=1){
    redirect('videoList.php','删除失败');
}else{
    redirect('videoList.php','删除成功');
}
?>
<?php
require_once('tpl/footer.php');
?>