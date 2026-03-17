<?php
require_once __DIR__ . "/../config/database.php";
class Usuario {

    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->conectar();
    }

    public function obtenerPorEmail($email) {
        $sql = "SELECT * FROM usuarios WHERE email = :email AND estado = 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function login($email, $password) {

    $query = "SELECT * FROM usuarios WHERE email = :email LIMIT 1";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    if($stmt->rowCount() > 0) {

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if(password_verify($password, $usuario['password'])) {
            return $usuario;
        }
    }

    return false;
}
}