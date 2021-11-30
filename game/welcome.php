<?php
include_once("./tql/head.php");
include_once("./include.php");
include_once("./system/CheckLogin.php");
Sqli\sqli_init();
$aid = $_SESSION['admin_id'];
$list = admin\GetAdminById($aid);
$row = Sqli\sqli_get_map($list);
?>

<?php
include_once("./tql/header.php");
?>

<main role="main">
    <section class="jumbotron text-center">
        <div class="container">
            <h1>欢迎访问后台管理系统</h1>
            <p class="lead text-muted">
                用户名：<?php echo $row['a_name']; ?>
            </p>
            <p class="lead text-muted">
                上次登录时间：<?php echo $row['a_lastlogintime']; ?>
            </p>
            <p>
                <a href="data_center.php" class="btn btn-primary my-2">数据中心</a>
                <!-- TODO 安全中心 -->
                <a href="#" class="btn btn-secondary my-2">安全中心</a>
            </p>
        </div>
    </section>
</main>

<?php
include_once("./tql/footer.php");
?>