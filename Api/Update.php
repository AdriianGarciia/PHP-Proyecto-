<?php

header("Content-Type: application/json; chartset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../Config/Database.php';
include_once '../Class/User.php';

$database = new DataBase();
$db = $database->getConnection();
$item = new User($db);
$data = json_decode(file_get_contents("php://input"));

$item->IdNota = $data->IdNota;
$item->TituloNota = $data->TituloNota;
$item->ContenidoNota = $data->ContenidoNota;

try {
    $item->updateNotas();
    echo json_encode("OK");
} catch(PDOException $exception){
    echo "Database error: " . $exception->getMessage();
}

?>