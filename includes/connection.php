<?php


$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "root";
$dbName = "loginsystem";

//$conn = mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);

try {
    /** @var TYPE_NAME $pdo */
    $pdo = new PDO('mysql:host=localhost;dbname=loginsystem2', "$dbUsername", 'root');
}catch (PDOException $e){
    exit('Database error');
}

