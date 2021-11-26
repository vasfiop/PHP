<?php
require_once('tpl/head.php');
Sqli\sqli_init();
$vid;
if (!isset($_GET['vid'])) {
    $list = my_sql\GetFirstVideo();
    $row = mysqli_fetch_assoc($list);
    $vid = $row['vid'];
} else
    $vid = $_GET['vid'];
$list = my_sql\GetVideoById($vid);
$row = mysqli_fetch_assoc($list);
?>

<div class="container">
    <div class="row row-offcanvas row-offcanvas-right">
        <div class="col-xs-12 col-sm-12">

            <div class="row box">
                <div class="col-lg-4 text-center">
                    <img src="posters/<?php echo $row['pic']; ?>" class="responsive img-thumbnail" />

                    <div class="theme-buy">
                        <a class="theme-login" href="javascrpt:;">
                            <h3 class="brand-name" title="点击这里可以在线播放~"><?php echo $row['videoname']; ?></h3>
                        </a>
                    </div>
                    <div class="theme-popover">
                        <div class="theme-poptit">
                            <a href="javascript:;" title="关闭" class="close">x</a>
                            <h4><?php echo $row['videoname']; ?></h4>
                        </div>
                        <div>
                            <video id="myVideo" src="<?php echo $row['address']; ?>" controls width="100%" height="100%"></video>
                        </div>
                    </div>
                    <div class="theme-popover-mask"></div>
                    <ul class="list-inline row text-center">
                        <?php
                        $score = my_sql\GetScoreById($vid);
                        while ($score_line = mysqli_fetch_array($score)) {
                            $number = $score_line['0'];
                            $p = stripos($number, '.');
                            if ($number == 0)
                                echo "<li><h4>影片情分：暂无评分";
                            else
                                echo "<li><h4>影片评分：</h4></li>" . substr($number, 0, $p + 2);
                        }
                        ?>
                    </ul>
                </div>
                <!--放视频海报和标题-->
                <div class="col-lg-8 text-center">
                    <table class="table">
                        <tr>
                            <td>专栏</td>
                            <td>
                                <?php
                                $tid = $row['tid'];
                                $list = my_sql\GetVideoTypeById($tid);
                                $vname = mysqli_fetch_assoc($list);
                                echo $vname['typename'];
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>上传时间</td>
                            <td><?php echo $row['uploaddate']; ?></td>
                        </tr>
                        <tr>
                            <td>点击次数:</td>
                            <td><?php echo $row['hittimes']; ?></td>
                        </tr>
                        <tr>
                            <td>上传人</td>
                            <td>
                                <?php
                                $adminid = $row['uploadadmin'];
                                $admin = my_sql\GetAdminById($adminid);
                                $admin_row = Sqli\sqli_get_map($admin);
                                echo $admin_row['adminname'];
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>下载次数</td>
                            <td><?php echo $row['downtimes']; ?></td>
                        </tr>
                        <tr>
                            <td>有事找站长</td>
                            <td><a href="mailto:zhouhaibo@neusoft.edu.cn">意见箱</a></td>
                        </tr>
                        <tr>
                            <td>下载地址</td>
                            <td><a href="down.php?vid=<?php echo $row['vid']; ?>">点击这里下载</a></td>
                        </tr>
                        <tr>
                            <td>评分</td>
                            <td>
                                <?php
                                if (isset($_SESSION['user'])) {
                                ?>
                                    <form action="doLevel.php" method="post" onsubmit="check()" class="form-horizontal" name="f1">
                                        <input type="hidden" name="vid" value="<?php echo $row['vid']; ?>">
                                        <select name="level" required>
                                            <option selected value="">评价影片</option>
                                            <option selected value="5">力推★★★★★</option>
                                            <option selected value="4">推荐★★★★</option>
                                            <option selected value="3">还行★★★</option>
                                            <option selected value="2">较差★★</option>
                                            <option selected value="1">很差★</option>
                                        </select>
                                        <input type="submit" value="评价">
                                    </form>
                                <?php
                                } else {
                                ?>
                                    <h3><a href="" data-toggle="modal" data-target="#login" onclick="func(<?php echo $row['vid'] ?>)">登陆</a>后可以评分</h3>
                                <?php
                                }
                                ?>
                            </td>
                        </tr>
                    </table>
                </div>
                <!--表格显示视频详细信息-->
            </div>
            <!--/row-->
            <div class="row box">

                <div class="col-lg-12">
                    <h2 class="intro-text text-center">内容简介
                    </h2>
                </div>
            </div>
            <!--/row-->

            <div class="row box">

                <div class="col-lg-12">
                    <h2 class="intro-text text-center">留言列表
                    </h2>
                </div>
            </div>
            <!--/row-->



        </div>
    </div>
</div>
<?php
require_once('tpl/foot.php');
?>