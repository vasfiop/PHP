<?php
require_once('tpl/head.php');
include_once('./system/dbConn.php');
?>
<div class="container">
    <!--幻灯片开始-->
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <img src="assets/images/img4.jpg" class="img-responsive" alt="img4">


            </div>
            <div class="item">
                <img src="assets/images/img2.jpg" class="img-responsive" alt="img2">


            </div>
            <div class="item">
                <img src="assets/images/img3.jpg" class="img-responsive" alt="img3">


            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>
    <!--幻灯片结束-->

    <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12 col-sm-9">


            <div class="row text-center">
                <div class="col-xs-12 col-lg-12 mlist">
                    <h2>栏目名称</h2>
                    <ul class="list-inline row text-center">
                        <li class="col-xs-4 col-sm-3 col-lg-2">
                            <img src="assets/images/img1.jpg" class="responsive img-thumbnail" />

                            <p><a href="show.php">视频标题</a>
                            </p>
                        </li>
                        <li class="col-xs-4 col-sm-3 col-lg-2">
                            <img src="assets/images/img1.jpg" class="responsive img-thumbnail" />

                            <p><a href="show.php">视频标题</a>
                            </p>
                        </li>

                    </ul>
                    <p><a class="btn btn-default" href="list.html" role="button">更多 &raquo;</a></p>
                </div>
                <!--/.col-xs-6.col-lg-4-->

            </div>
            <!--/row-->
        </div>
        <!--/.col-xs-12.col-sm-9-->

        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
            <div class="list-group text-center">
                <h2 style="color:white;">排行</h2>
                <ul class="list-inline row text-center">
                    <li class="col-xs-12 col-lg-6">
                        <img src="assets/images/img1.jpg" class="responsive img-thumbnail" />

                        <p><a href="show.php">视频标题</a>
                        </p>
                    </li>
                    <li class="col-xs-12 col-lg-6">
                        <img src="assets/images/img1.jpg" class="responsive img-thumbnail" />

                        <p><a href="show.php">视频标题</a>
                        </p>
                    </li>

                </ul>
            </div>

        </div>
        <!--/.sidebar-offcanvas-->
    </div>
    <!--/row-->

</div>
<!--/.container-->
<?php
require_once('tpl/foot.php');
?>