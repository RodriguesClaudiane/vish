<?php
$dbname = 'PROJETINHO_TODOLIST';
$port = '3306';
$username = 'nix';
$password = 'exist';

$dns = "mysql:host=localhost:$port;dbname:$dbname";

try {
    $connection = new PDO($dns,$username,$password);
} catch (PDOException $e) {
    echo $e;
}
