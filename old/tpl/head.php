<?php
include_once('system/mysqli_connect.php');
include_once('system/SQL.php');
use function mysql_connect\sqli_init;
$con = sqli_init();
$rs = GetVideoType();
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="../../favicon.ico">

	<title>视频信息管理系统</title>

	<link href="assets/css/bootstrap.min.css" rel="stylesheet">

	<link href="assets/css/offcanvas.css" rel="stylesheet">
	<link href="assets/css/style.css" rel="stylesheet">
	<script src="assets/js/ie-emulation-modes-warning.js"></script>
</head>

<body>
	<nav class="navbar navbar-fixed-top navbar-default">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>

			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<?php
					while ($row = mysqli_fetch_assoc($rs)) {
					?>
						<li><a href="index.php?tid=<?php echo $row['tid']; ?>"><?php echo $row['typename']; ?></a></li>
					<?php
					}
					?>
				</ul>
				<form class="navbar-form navbar-left" role="search" action="search.php" method="POST">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Search" name="videosearch">
					</div>
					<button type="submit" class="btn btn-default">搜索</button>
				</form>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#" data-toggle="modal" data-target="#login">登录</a></li>
					<li><a href="#" data-toggle="modal" data-target="#reg">注册</a></li>

				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>

	<!-- /.navbar -->
	<div class="modal fade" id="reg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">registration</h4>
				</div>
				<div class="modal-body">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" onclick="location.replace('index.php')" data-dismiss="modal">关闭</button>
				</div>
			</div>
		</div>
	</div>
	<!-- /注册模态框结束 -->
	<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">user login</h4>
				</div>
				<div class="modal-body">






				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" onclick="location.replace('index.php')" data-dismiss="modal">关闭</button>
				</div>
			</div>
		</div>
	</div>
	<!-- /登录模态框结束 -->
