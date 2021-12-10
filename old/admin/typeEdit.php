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
     include_once('inc_admin.php');
     use function mysql_connect\sqli_init;
     $con = sqli_init();
     $tid = $_GET["tid"];
     $rs = TypeTid($tid);
     $row = mysqli_fetch_assoc($rs);
    ?>
    <form action="doTypeUpdate.php" method="post"> 
        <input type="hidden" name="tid" value="<?php echo $row["tid"];?>">
        <table>
            <tr>
                <td>视频类别名称</td>
                <td><input type="text" name="typename" value="<?php echo $row["typename"]?>"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="修改">
            <input type="reset" value="重置"></td>
                
            </tr>
        </table>
    </form>
    <?php
require_once('tpl/footer.php');
?>
</body>
</html>