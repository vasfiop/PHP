<?php
require_once('tpl/header.php');
require_once("../system/loginCheck.php");
?>
<form action="doTypeAdd.php" method="post">
    <table border="1">
        <tr>
            <td>视频类别名称：</td>
            <td><input type="text" name="typename"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="添加">
                <input type="reset" value="重置">
            </td>

        </tr>
    </table>
</form>
<?php
require_once('tpl/footer.php');
?>