<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .checkbox-lable {
            display: block;
            width: 20px;
            height: 20px;
            border: 1px solid black;
            border-radius: 50%;
        }

        .checkbox:checked+.checkbox-lable {
            display: block;
            background-color: red;
        }

        .checkbox {
            display: none;
        }
    </style>
</head>

<body>
    <input id="color-input-red" class="checkbox" type="checkbox" />
    <label for="color-input-red" class="checkbox-lable"></label>
</body>

</html>