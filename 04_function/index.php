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
    define("PI", 3.14);
    function circular($r)
    {
        return $r * $r * PI;
    }

    function sum_1_to_50()
    {
        for ($i = 1; $i <= 50; $i++) {
            echo $i . " ";
        }
        echo "<br>";
    }

    function print_1_to_50()
    {
        $sum = 0;
        for ($i = 1; $i <= 50; $i++) {
            $sum += $i;
        }
        echo $sum . "<br>";
    }

    function print_table($name, $age, $sex)
    {
        echo "<table border='1'>";

        echo "<tr>";
        echo "<th>性别</th>";
        echo "<td>" . $name . "</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<th>年龄</th>";
        echo "<td>" .  $age . "</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<th>性别</th>";
        echo "<td>" . $sex . "</td>";
        echo "</tr>";

        echo "</table>";
    }
    ?>

    <?php
    echo circular(10);
    echo "<br>";

    echo sum_1_to_50();

    echo print_1_to_50();

    echo print_table("zhangsan", 11, "女");
    ?>

</body>

</html>