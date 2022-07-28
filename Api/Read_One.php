<?php

    header("Content-Type: application/json; chartset=UTF-8");
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once '../Config/database.php';
    include_once '../Class/user.php';

    $database = new DataBase();
    $db = $database->getConnection();
    $item = new User($db);
    $item->IdNota = isset($_GET['IdNota'])?$_GET['IdNota'] : die();

    /*$item->getSingleNota();

    if ($item->TituloNota != null) {
        $data = array (
            "IdNota" => $item->IdNota,
            "TituloNota" => $item->TituloNota,
            "ContenidoNota" => $item->ContenidoNota
        );
        echo json_encode($data);
    } else {
        http_response_code(404);
        echo json_encode(
            array("message" => "User not found")
        );
    }*/

?>