<?php
include_once('tpl/head.php');
include_once('system/mysqli_connect.php');
include_once('system/SQL.php');
use function mysql_connect\sqli_init;
$con = sqli_init();
if (!isset($_GET['page']))
    $page = 1;
else
    $page = $_GET['page'];
$videosearch = $_POST['videosearch'];
$list = SearchVideo($videosearch);
$totalrows = mysqli_num_rows($list);
$rowsperpage = 8;
if ($totalrows > 0) {
?>
    <div class="container">
        <div class="row row-offcanvas row-offcanvas-right">
            <div class="col-xs-12 col-sm-12">
                <div class="row">
                    <div class="col-xs-12 col-lg-12 mlist">
                        <h2>搜索结果</h2>
                        <ul class="list-line row text-center" style="list-style-type: none;padding:0;">
                            <?php
                            while ($row = mysqli_fetch_assoc($list)) {
                            ?>
                                <li class="col-xs-6 col-lg-3">
                                    <img src="posters/<?php echo $row['pic']; ?>" class="responsive img-cnumonall" style="width: 160px;height: 200px;">
                                    <p><a href="show.php?vid=<?php echo $row['vid']; ?>"><?php echo $row['videoname']; ?></a></p>
                                </li>
                            <?php
                            }
                            ?>
                        </ul>
                        <nav class="text-center">
                            <?php
                            if ($rowsperpage >= $totalrows)
                                $totalpages = 1;
                            else
                                $totalpages = ceil($totalrows / $rowsperpage);
                            if ($page > 1) {
                                $first = "<a href=\"?videoname=$videoname&page=1\">首页</a>";
                                $pre = "<a href=\"?videoname=$videoname&page=" . ($page - 1) . "\"></a>";
                            } else {
                                $first = '首页';
                                $pre = '上一页';
                            }
                            if ($page < $totalpages) {
                                $last = "<a href=\"?videoname=$videoname&page=$totalpages\">尾页</a>";
                                $next = "<a href=\"?videoname=$videoname&page=" . ($page + 1) . "\">下一页</a>";
                            } else {
                                $last = '尾页';
                                $next = '下一页';
                            }
                            echo "共{$totalrows}条记录&nbsp;&nbsp;";
                            echo "$first" . "&nbsp;&nbsp;";
                            echo "$pre" . "&nbsp;&nbsp;";
                            for ($i = 1; $i < $totalpages; $i++)
                                echo "<a href=\"?videoname=$videoname&page=$i\">第{$i}页</a>&nbsp;&nbsp;";
                            echo "$next" . "&nbsp;&nbsp;";
                            echo "$last";
                            ?>
                        </nav>
                    </div>
                </div>
            </div>
        <?php
    } else
        echo '<meta http-equiv="refresh" content="3;url=index.php"><h2 style="color: white;">未找到符合条件的结果！3秒后返回首页</h2>';

        ?>
        </div>
    </div>

    <?php
    require_once('tpl/foot.php');
    ?>