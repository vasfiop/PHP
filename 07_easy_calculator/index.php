<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form action="index.php" method="post">
        <p>第一个数:<input name="first_number" type="number"></p>
        <input type="radio" name="fuhao" value="1">+
        <input type="radio" name="fuhao" value="2">-
        <input type="radio" name="fuhao" value="3">*
        <input type="radio" name="fuhao" value="4">/
        <p>第二个数:<input name="dec_number" type="number"></p>
        <p><button type="submit">提交</button></p>
    </form>
    <?php
    if (isset($_POST['first_number'])) {
        $first_number = $_POST['first_number'];
        $fuhao = $_POST['fuhao'];
        $dec_number = $_POST['dec_number'];
        $char;
        $answer;
        switch ($fuhao) {
            case '1':
                $char = '+';
                $answer = $first_number + $dec_number;
                break;
            case '2':
                $char = '-';
                $answer = $first_number - $dec_number;
                break;
            case '4':
                $char = '/';
                $answer = $first_number / $dec_number;
                break;
            case '3':
                $char = '*';
                $answer = $first_number * $dec_number;
                break;
            default:
                echo "ERROR";
                break;
        }
        echo "<p>" . $first_number . $char . $dec_number . "=" . $answer . "</p>";
    }
    ?>
</body>

</html>