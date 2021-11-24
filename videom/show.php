<?php
require_once('tpl/head.php');
include_once('./system/dbConn.php');
?>


<div class="container">

    <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12 col-sm-12">


            <div class="row box">
                <div class="col-lg-4 text-center">
                   <img src="assets/images/img1.jpg" class="responsive img-thumbnail"/>
                    
                    <p>视频标题</p>

                </div><!--放视频海报和标题-->
                <div class="col-lg-8 text-center">


                </div><!--表格显示视频详细信息-->


            </div>
            <!--/row-->
            <div class="row box">

                <div class="col-lg-12">
                    <h2 class="intro-text text-center">内容简介

                    </h2>


                </div>
            </div>  <!--/row-->

            <div class="row box">

                <div class="col-lg-12">
                    <h2 class="intro-text text-center">留言列表

                    </h2>


                </div>
            </div>  <!--/row-->



        </div>
        <!--/.col-xs-12.col-sm-12-->

       
    </div>
    <!--/row-->

    

</div>
<!--/.container-->
<?php
require_once('tpl/foot.php');
include_once('./system/dbConn.php');
?>
