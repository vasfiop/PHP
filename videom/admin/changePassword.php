<?php
include_once("tpl/header.php");
include_once("../system/loginCheck.php");
include_once("../../Util/mysqli.php");
include_once("SQL.php");
?>

<form action="doChangePassword.php" method="post">
    <h2 class="form-signin-heading">请修改密码</h2>
    请输入旧密码:
    <input type="password" name="oldpassword" required><br>
    请输入新密码:
    <input type="password" name="password1" required><br>
    请确认新密码:
    <input type="password" name="password2" required><br>
    <input class="btn" type="submit" value="确定">
</form>

<?php
include_once("tpl/footer.php");
