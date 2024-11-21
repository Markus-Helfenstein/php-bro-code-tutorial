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
        <label for="username">username:</label><br>
        <input type="text" name="username"><br>
        <label for="password">password:</label><br>
        <input type="password" name="password"><br>
        <input type="submit" name="login" value="log in"><br>
    </form>
</body>

</html>
<?php
foreach ($_POST as $key => $value) {
    if (is_array($value)) {
        $concatenatedArrayString = implode(",", $value);
        echo "{$key} => [{$concatenatedArrayString}] <br>";
    } else {
        echo "{$key} => {$value} <br>";
    }
}
?>