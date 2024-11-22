<?php
    include("database.php");

    $username = "Thaddeus";
    $password_hash = password_hash('1234', PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, password_hash) VALUES ('{$username}', '{$password_hash}')";
    mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<?php
    mysqli_close($conn);
?>