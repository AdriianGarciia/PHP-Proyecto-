<?php

class User {
    private $conn;
    private $db_table = "databasenotas";

    public $IdNota;
    public $TituloNota;
    public $ContenidoNota;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getNotas() {
        $sqlQuery = "SELECT * FROM " .$this->db_table. "";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }

    public function createNotas() {
        $sqlQuery = "INSERT INTO " .$this->db_table. "
                    SET 
                        TituloNota = :TituloNota,
                        ContenidoNota = :ContenidoNota";
        $stmt = $this->conn->prepare($sqlQuery);

        $stmt->bindParam(":TituloNota", $this->TituloNota);
        $stmt->bindParam(":ContenidoNota", $this->ContenidoNota);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function updateNotas() {
        $sqlQuery = "UPDATE " .$this->db_table. "
                    SET 
                        TituloNota = :TituloNota,
                        ContenidoNota = :ContenidoNota
                    WHERE
                        IdNota= :IdNota";
        $stmt = $this->conn->prepare($sqlQuery);

        $stmt->bindParam(":TituloNota", $this->TituloNota);
        $stmt->bindParam(":ContenidoNota", $this->ContenidoNota);
        $stmt->bindParam(":IdNota", $this->IdNota);
        
    }

    public function deleteNotas() {
        $sqlQuery = "DELETE FROM " .$this->db_table. "
                    WHERE
                        IdNota = :IdNota";

        $stmt = $this->conn->prepare($sqlQuery);

        $stmt->bindParam(":IdNota", $this->IdNota);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    /*public function getSingleUser() {
        $sqlQuery = "SELECT * FROM " .$this->db_table. "
                    WHERE ContactID = :ContactId LIMIT 1";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->bindParam(":ContactId", $this->ContactId);
        $stmt->execute();

        $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->Name = $dataRow("Name");
        $this->Phone = $dataRow("Phone");
        $this->Date = $dataRow("Date");
        $this->Status = $dataRow("Status");
        $this->ContactId = $dataRow("ContactId");
    }*/

}

?>