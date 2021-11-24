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
    include_once("../system/loginCheck.php");
    include_once("../../Util/mysqli.php");
    include_once("SQL.php");
    Sqli\sqli_init();
    $tid = $_GET['tid'];
    $list = my_sql\GetVideoTypeById($tid);
    $row = mysqli_fetch_assoc($list);
    ?>
    <form action="doTypeUpdate.php" method="post">
        <input type="hidden" name="tid" value="<?php echo $row['tid']; ?>">
        <table border="1">
            <tr>
                <td>视频类别名称</td>
                <td><input type="text" name="typename" value="<?php echo $row['typename']; ?>"></td>
            </tr>
            <tr>
                <td><input type="submit" value="修改"></td>
                <td><input type="reset" value="重置"></td>
            </tr>
        </table>
    </form>
</body>

</html>