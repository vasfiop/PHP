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
    // 全局变量
    $a = 1;
    $b = 1;
    // 

    echo "<table border=\"1\">";
    for ($a = 1; $a <= 9; $a++) {
        echo "<tr>";
        for ($b = 1; $b <= $a; $b++) {
            echo "<td>" . $a . "*" . $b . "=" . $a * $b . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";

    ?>

</body>

</html>