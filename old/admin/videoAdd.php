<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    require_once('tpl/header.php');
    require("../system/loginCheck.php");
    include_once('inc_admin.php');

    use function mysql_connect\sqli_init;

    $con = sqli_init();
    $rs = TypeList();

    ?>
    <form action="doVideoAdd.php" method="post" enctype="multipart/form-data">
        <table border="1">
            <tr>
                <td>视频名称</td>
                <td><input type="text" name="videoname" required></td>
            </tr>
            <tr>
                <td>视频类型</td>
                <td>
                    <select name="videotype" id="">
                        <?php
                        while ($row = mysqli_fetch_assoc($rs)) {
                        ?>
                            <option value="<?php echo $row["tid"]; ?>"><?php echo $row["typename"]; ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>视频海报</td>
                <td><input type="file" name="pic" required="required"></td>
            </tr>
            <tr>
                <td>视频简介</td>
                <td><textarea name="videointro" rows="4"></textarea></td>
            </tr>
            <tr>
                <td>下载地址</td>
                <td><input type="text" name="address"></td>
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
</body>

</html>