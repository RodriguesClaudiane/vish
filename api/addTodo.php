<?php
require 'balaio.php';
header('Access-Control-Allow-Methods:POST');

$json = file_get_contents('php://input');
$data = json_encode($json,true);

$title = $data['title'];
$responsible = $data['responsible'];
$status = false;

$sql = "INSERT INTO TODO_INFO (INFO_TODO_TITLE,INFO_TODO_RESPONSIBLE,INFO_TODO_STATUS) VALUES (:title,:responsible, false);";

try {
    $trocancia = $connection->prepare($sql);
    $trocancia-> bindParam(':title,$title');
    $trocancia-> bindParam(':reponsible,$responsible');
    $trocancia-> execute();
    $response['success'] = true;
} catch (PDOException $e) {
    $response['error'] = $e;
}

header('Content-Type: application/json');
echo json_encode($response);

