<?

Class DataBase {
    private $host = "localhost";
    private $database_name = "backend";
    private $username = "root";
    private $password = "root";
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->database_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        } catch(PDOException $exception) {
            echo "Database error: " . $exception->getMessage();
        }
        return $this->conn;
    }
}

?>