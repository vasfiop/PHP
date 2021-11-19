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
    $list = my_sql\GetVideoType();
    $count = mysqli_num_rows($list);
    ?>
    <form action="dovideoAdd.php" method="post" enctype="multipart/form-data">
        <table border="1">
            <tr>
                <td>视频类型</td>
                <td><input type="text" name="videoname"></td>
            </tr>
            <tr>
                <td>视频类型</td>
                <td>
                    <select name="videotype">
                        <?php
                        while ($row = mysqli_fetch_assoc($list))
                            echo '<option value=' . $row["tid"] . '>' . $row['typename'] . '</option>';
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>视频海报</td>
                <td><input type="file" name="videofile" required></td>
            </tr>
            <tr>
                <td>视频简介</td>
                <td><textarea name="videointro"></textarea></td>
            </tr>
            <tr>
                <td>下载地址</td>
                <!-- <a href=""></a> -->
                <td><input type="text" name="address" ></td>
            </tr>
            <tr>
                <td><button type="submit">添加</button></td>
                <td><button onclick="location.reload();">重置</button></td>
            </tr>
        </table>
    </form>
</body>

</html>