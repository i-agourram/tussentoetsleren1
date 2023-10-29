<?php

try {
    $db = new PDO("mysql:host=localhost;dbname=schoenen", "root", "");
}  catch (PDOException $e) {
    die("Error!;" . $e -> getMessage());
}





?>

