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
    $foods = ["apple", "orange", "banana", "coconut"];

    array_push($foods, "pineapple", "kiwi");
    $foods = array_reverse($foods);

    foreach($foods as $food){
        echo "{$food}<br>";
    }
?>