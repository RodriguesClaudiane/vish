<?php
require 'balaio.php';
header('Access-Control-Allow-Methods:GET');

$json = file_get_contents('php://input');
$data = json_decode($json,true);

$response = [];

$sql = "SELECT INFO_TODO_TITLE, INFO_TODO_ID FROM TODO_INFO;";

try {
    $trocancia = $connection->query($sql);
    $response['todos'] = $trocancia->fetchAll(PDO::FETCH_ASSOC);
    $response['success'] = true;
} catch (PDOException $e) {
    $response['error'] = $e;
}

header('Content-Type: application/json');
echo json_encode($response);