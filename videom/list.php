<?php
require_once('tpl/head.php');
include_once('./system/dbConn.php');
?>


<div class="container">

    <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12 col-sm-9">


            <div class="row">


                <div class="col-xs-12 col-lg-12 mlist">
                    <h2>专栏名称</h2>
                    <ul class="list-inline row text-center">
                        <li class="col-xs-6 col-lg-3">
                            <img src="assets/images/img1.jpg" class="responsive img-thumbnail"/>

                            <p><a href="show.php">视频标题</a>
                            </p>
                        </li>
                        <li class="col-xs-6 col-lg-3">
                            <img src="assets/images/img1.jpg" class="responsive img-thumbnail"/>

                            <p><a href="show.php">视频标题</a>
                            </p>
                        </li>

                    </ul>
                    <nav class="text-center">
                        <ul class="pagination">
                            <li>
                                <a href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li>
                                <a href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>


                </div>
                <!--/.col-xs-6.col-lg-4-->

            </div>
            <!--/row-->
        </div>
        <!--/.col-xs-12.col-sm-9-->

        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
            <div class="list-group text-center" >
                <h2 style="color:white;">排行</h2>
                <ul class="list-inline row text-center">
                    <li class="col-xs-12 col-lg-6">
                        <img src="assets/images/img1.jpg" class="responsive img-thumbnail"/>

                        <p><a href="show.php">视频标题</a>
                        </p>
                    </li>
                    <li class="col-xs-12 col-lg-6">
                        <img src="assets/images/img1.jpg" class="responsive img-thumbnail"/>

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