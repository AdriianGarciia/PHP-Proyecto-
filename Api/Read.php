<?php

    header("Content-Type: application/json; chartset=UTF-8");
     header("Access-Control-Allow-Origin: *");
     header("Access-Control-Allow-Methods: GET");
     header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

     include_once '../Config/Database.php';
     include_once '../Class/User.php';

     $database = new DataBase();
     $db = $database->getConnection();
     $items = new User($db);
     $stmt = $items->getNotas();
     $itemCount = $stmt->rowCount();

     echo json_encode($stmt);
     echo json_encode($itemCount);

     if ($itemCount > 0) {
        $userArr = array();
        $userArr["body"] = array();
        $userArr["itemCount"] = $itemCount;

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $data = array(
                "IdNota" => $IdNota,
                "TituloNota" => $TituloNota,
                "ContenidoNota" => $ContenidoNota
            );
            array_push($userArr["body"], $data);
        }
        echo json_encode($userArr);
     } else {
        http_response_code(404);
        echo json_encode(
            array("message" => "Not records found")
        );
     }

?>