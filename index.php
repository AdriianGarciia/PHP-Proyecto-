<?php
header("Content-Type: application/json; chartset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-Width");

$data = array(
    "data" => [
        array("IdNota"=>"1", "TituloNota"=>"Ejemplo 1", "ContenidoNota"=>"Contenido ejemplo")
    ]
);

echo json_encode($data);

?>