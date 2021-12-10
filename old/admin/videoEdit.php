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
    $vid = $_GET["vid"];
    include_once('inc_admin.php');

    use function mysql_connect\sqli_init;

    $con = sqli_init();
    $rs = VideoVid($vid);
    $row = mysqli_fetch_assoc($rs);
    $rs0 = TypeList();
    ?>
    <form action="doVideoUpdate.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="vid" value="<?php echo $vid; ?>">
        <table border="1">
            <tr>
                <td>视频名称</td>
                <td><input name="videoname" type="text" value="<?php echo $row["videoname"] ?>"></td>
            </tr>
            <tr>
                <td>视频类型</td>
                <td>
                    <select name="videotype">
                        <?php
                        $i = 1;
                        while ($type_row = mysqli_fetch_assoc($rs0)) {
                            $answer = $row['tid'] == $type_row['tid'] ? "selected" : " ";
                            echo "<option value=\"{$type_row['tid']}\" $answer >{$type_row['typename']}</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>视频海报</td>
                <td>
                    <input type="file" name="pic">
                    <img src="../images/<?php echo "{$row['pic']}"; ?>" width="100" height="80">
                    <input type="hidden" name="oldpic" value="<?php echo $row['pic']; ?>">
                </td>
            </tr>
            <tr>
                <td>视频介绍</td>
                <td>
                    <textarea name="videointro" rows="10" cols="80">
                        <?php
                        echo $row['intro'];
                        ?>
                    </textarea>
                </td>
            </tr>
            <tr>
                <td>下载地址</td>
                <td><input type="text" name="address" value="<?php echo $row['address'] ?>"></td>
            </tr>
            <tr>
                <td><button type="submit">更新</button></td>
                <td><button type="reset">重置</button></td>
            </tr>
        </table>
    </form>
    <?php
require_once('tpl/footer.php');
?>
</body>

</html>