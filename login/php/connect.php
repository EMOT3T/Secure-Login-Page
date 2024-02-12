<?php

$localhost = "localhost";
$user = "root";
$password = "";
$bank = "dbOec";

global $pdo;

try {
    $pdo = new PDO("mysql:dbname=".$bank."; host=".$localhost, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "ERROR".$e->getMessage();
    exit;
}

?>