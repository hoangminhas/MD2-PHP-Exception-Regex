<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test exception</title>
</head>
<body>
<h1>Division Operating</h1>
<form action="#" method="get">
    <input type="text" name="num1" placeholder="x">
    <input type="text" name="num2" placeholder="y">
    <button>Calculate</button>
</form>
</body>
</html>
<?php
include_once "DevideByZeroExcept.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $numerator = $_GET['num1'];
    $denominator = $_GET['num2'];


    function divideNum($numerator, $denominator)
    {
        if ($denominator == 0) {
            throw new DevideByZeroExcept();
        }
        return $numerator / $denominator;
    }
    try {
        $result = divideNum($numerator, $denominator);
        echo $result;
    } catch (DevideByZeroExcept $exception) {
        echo $exception;
    }
}



?>
