<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_REQUEST["email"];
    $name = $_REQUEST["name"];
    $password = $_REQUEST["password"];
    $cf_password = $_REQUEST["cf-password"];
    $errors = [];

    //check password
    if (empty($password)) {
        $errors["password"] = "Xin vui long nhap password";
    } else {
        $pattern = "/^[a-zA-Z0-9]{8,}$/";
        if (!preg_match($pattern, $password)) {
            $errors["password"] = "Mat khau can toi thieu 8 ky tu";
        }
    }

    //check confirm password
    if (empty($cf_password)) {
        $errors["cf-password"] = "Xin vui long xac nhan password";
    } elseif($cf_password !== $password) {
        $errors["cf-password"] = "Khong khop password";
    }

    //check email
    if (empty($email)) {
        $errors["email"] = "Xin vui long nhap vao email";
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors["email"] = "Email sai dinh dang";
        }
    }

    //check name
    if (empty($name)) {
        $errors["name"] = "Xin vui long nhap ten";
    }

    //check errors
    if (empty($errors)) {
        header("location:login.php");
    }

}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        span {
            color: rosybrown;
            font-family: Monospace;
            font-size: smaller;
        }
    </style>
</head>
<body>
<h1>Register</h1>
<form action="#" method="post">
    <label for="email">
        Email: <br>
        <input id="email" type="text" name="email" value="<?php echo $email?>"><br>
        <span> <?php echo $errors["email"]??"" ?> </span>
    </label><br>
    <label for="name">
        Name: <br>
        <input id="name" type="text" name="name" value="<?php echo $name?>">
        <br>
        <span><?php echo $errors["name"]??"" ?></span>
    </label><br>
    <label for="password">
        Password: <br>
        <input id="password" type="password" name="password">
        <br>
        <span><?php echo $errors["password"]??"" ?></span>
    </label><br>
    <label for="cf-password">
        Confirm Password: <br>
        <input id="cf-password" type="password" name="cf-password">
        <br>
        <span><?php echo $errors["cf-password"]??"" ?></span>
    </label><br>
    <button>Register</button>
</form>
</body>
</html>
