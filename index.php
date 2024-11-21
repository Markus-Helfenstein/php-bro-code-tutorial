<?php
session_start()
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="index.php" method="post">
        <input type="radio" name="payment_method" id="payment_method_0" value="Visa"><label for="payment_method_0">Visa</label><br>
        <input type="radio" name="payment_method" id="payment_method_1" value=" MasterCard"><label for="payment_method_1">MasterCard</label><br>
        <input type="radio" name="payment_method" id="payment_method_2" value="American Express"><label for="payment_method_2">American Express</label><br>
        <input type="checkbox" name="foods[]" id="food_0" value="Hamburger"><label for="food_0">Hamburger</label><br>
        <input type="checkbox" name="foods[]" id="food_1" value="Pizza"><label for="food_1">Pizza</label><br>
        <label for="email">email: </label><br>
        <input type="text" name="email"><br>
        <label for="username">username: </label><br>
        <input type="text" name="username"><br>
        <label for="password">password: </label><br>
        <input type="password" name="password"><br>
        <input type="submit" name="login" value="log in"><br>
        <input type="submit" name="logout" value="log out"><br>
    </form>
</body>

</html>
<?php
function filter_sanitize_post($key)
{
    return filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
}

foreach ($_POST as $key => $value) {
    $value = filter_sanitize_post($key);
    if (is_array($value)) {
        $concatenatedArrayString = implode(",", $value);
        echo "{$key} => [{$concatenatedArrayString}] <br>";
    } elseif (0 == strcmp($key, "email")) {
        // does not to_lower/to_upper
        $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
        if (empty($email)) {
            echo "Entered value is not a valid email address!<br>";
        } else {
            echo "{$key} => <a href='mailto:{$email}'>{$email}</a> <br>";
        }
    } else {
        echo "{$key} => {$value} <br>";
    }
}

if (isset($_POST["login"]) && !empty($_POST["username"]) && !empty($_POST["password"])) {
    $_SESSION["username"] = filter_sanitize_post("username");
    $_SESSION["password"] = filter_sanitize_post("password");
}

if (isset($_POST["logout"])) {
    session_destroy();
    header("location: index.php");
} else {
    if (isset($_SESSION["username"])) {
        echo "{$_SESSION['username']}<br>";
    }
    if (isset($_SESSION["password"])) {
        echo "{$_SESSION['password']}<br>";
    }    
}

?>