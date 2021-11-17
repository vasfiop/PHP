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
    include_once("../Util/mysqli.php");

    use Sqli;

    Sqli\sqli_init();
    $list = Sqli\sqli_ctrl("select * from admins");
    ?>
    <script>
        console.log();
    </script>

    <table border="1">
        <tr>
            <th>id</th>
            <th>name</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($list)) {
            echo "<tr>";
            echo "<th>" . $row["adminid"] . "</th>";
            echo "<th>" . $row["adminname"] . "</th>";
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>