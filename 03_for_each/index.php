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
    $emp = array(
        array(1, 'name1', 'A company', 'beijing', 'name1@neusoft.edu.cn'),
        array(2, 'name2', 'B company', 'shanghai', 'name2@neusoft.edu.cn'),
        array(3, 'name3', 'C company', 'hangzhou', 'name3@neusoft.edu.cn'),
        array(4, 'name4', 'D company', 'shenyang', 'name4@neusoft.edu.cn')
    );
    ?>

    <table border="1">
        <tr>
            <th>编号</th>
            <th>姓名</th>
            <th>公司</th>
            <th>地址</th>
            <th>email</th>
        </tr>
        <?php
        for ($i = 0; $i < count($emp); $i++) {
            echo "<tr>";
            foreach ($emp[$i] as $value) {
                echo "<td>" . $value . "</td>";
            }
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>