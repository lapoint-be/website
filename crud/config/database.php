<?php
// used to connect to the database
$host = "localhost";
$db_name = "grocery";
$username = "cruduser";
$password = "this#is#for#lists";

try {
    $con = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
}

// show error
catch(PDOException $exception){
    echo "Connection error: " . $exception->getMessage();
}
?>
