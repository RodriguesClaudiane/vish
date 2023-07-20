<?php
require 'balaio.php';
header('Controll-Access-Allow-Methods: POST');

$json = file_get_contents('php://input');
$data = json_decode($json,true);

$sql = "DELETE FROM TODO_INFO WHERE INFO_ID == ?;";
try{

$trocancia = $connection->prepare($sql);
$trocancia->execute($sql);

}
catch(PDOException $e){
    echo($e);
}

header('Content-Type: application/json');
echo json_encode($json);
