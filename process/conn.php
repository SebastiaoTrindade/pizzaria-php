<?php

session_start();

$user = 'root';
$pass = 'adminroot';
$host = 'localhost';
$db = 'pizzaria';

try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    //code...
} catch (PDOException $e) {
    print "Erro: " . $e->getMessage() . "<br>";
    die();
    
}

?>

