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
    ?>
    <form action="doTypeAdd.php" method="post">
        <table border="1">
            <tr>
                <td>视频类别名称：</td>
                <td><input type="text" name="typename"></td>
            </tr>
            <tr>
                <td><input type="submit" value="添加"></td>
                <td><input type="reset" value="重置"></td>
            </tr>
        </table>
    </form>
</body>

</html>