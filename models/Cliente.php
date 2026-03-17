<?php
require_once "config/database.php";

class Cliente {

    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->conectar();
    }

    // ✅ LISTAR
    public function listar() {
        $sql = "SELECT * FROM clientes ORDER BY id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // ✅ CREAR (Cliente + Empresa)
    public function crear($data) {
        $sql = "INSERT INTO clientes 
                (tipo_documento, numero_documento, nombre, direccion, telefono, correo,
                 codigo_empresa, nombre_empresa, tipo_proveedor, numero_ruc, direccion_empresa, tipo_pago)
                VALUES 
                (:tipo_documento, :numero_documento, :nombre, :direccion, :telefono, :correo,
                 :codigo_empresa, :nombre_empresa, :tipo_proveedor, :numero_ruc, :direccion_empresa, :tipo_pago)";
        
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute($data);
    }

    // ✅ OBTENER POR ID
    public function obtenerPorId($id) {
        $sql = "SELECT * FROM clientes WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // ✅ ACTUALIZAR (Cliente + Empresa)
    public function actualizar($data) {
        $sql = "UPDATE clientes SET 
                tipo_documento = :tipo_documento,
                numero_documento = :numero_documento,
                nombre = :nombre,
                direccion = :direccion,
                telefono = :telefono,
                correo = :correo,
                codigo_empresa = :codigo_empresa,
                nombre_empresa = :nombre_empresa,
                tipo_proveedor = :tipo_proveedor,
                numero_ruc = :numero_ruc,
                direccion_empresa = :direccion_empresa,
                tipo_pago = :tipo_pago
                WHERE id = :id";

        $stmt = $this->conn->prepare($sql);
        return $stmt->execute($data);
    }

    // ✅ ELIMINAR
    public function eliminar($id) {
        $sql = "DELETE FROM clientes WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }
}