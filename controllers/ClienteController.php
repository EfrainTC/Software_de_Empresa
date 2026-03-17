<?php
require_once __DIR__ . "/../models/Cliente.php";

class ClienteController {

    public function index() {
        session_start();
        if (!isset($_SESSION["usuario"])) {
            header("Location: /Software_empresa/index.php");
            exit();
        }

        $clienteModel = new Cliente();
        $clientes = $clienteModel->listar();

        require_once __DIR__ . "/../views/clientes/index.php";
    }

    // MOSTRAR FORMULARIO
    public function crear() {
        require_once __DIR__ . "/../views/clientes/crear.php";
    }

    // GUARDAR CLIENTE
    public function guardar() {
        $data = [
            "tipo_documento" => $_POST["tipo_documento"],
            "numero_documento" => $_POST["numero_documento"],
            "nombre" => $_POST["nombre"],
            "direccion" => $_POST["direccion"],
            "telefono" => $_POST["telefono"],
            "correo" => $_POST["correo"],
            "codigo_empresa" => $_POST["codigo_empresa"],
            "nombre_empresa" => $_POST["nombre_empresa"],
            "tipo_proveedor" => $_POST["tipo_proveedor"],
            "numero_ruc" => $_POST["numero_ruc"],
            "direccion_empresa" => $_POST["direccion_empresa"],
            "tipo_pago" => $_POST["tipo_pago"]
        ];

        $clienteModel = new Cliente();
        $clienteModel->crear($data);

        header("Location: /Software_de_Empresa/index.php?action=clientes");
        exit();
    }

    // ELIMINAR
    public function eliminar() {
        $id = $_GET["id"];
        $clienteModel = new Cliente();
        $clienteModel->eliminar($id);

        header("Location: /Software_de_Empresa/index.php?action=clientes");
        exit();
    }

    // EDITAR
    public function editar() {
        $clienteModel = new Cliente();
        $id = $_GET["id"];

        if($_POST){
            $data = [
                "id" => $id,
                "tipo_documento" => $_POST["tipo_documento"],
                "numero_documento" => $_POST["numero_documento"],
                "nombre" => $_POST["nombre"],
                "direccion" => $_POST["direccion"],
                "telefono" => $_POST["telefono"],
                "correo" => $_POST["correo"],
                "codigo_empresa" => $_POST["codigo_empresa"],
                "nombre_empresa" => $_POST["nombre_empresa"],
                "tipo_proveedor" => $_POST["tipo_proveedor"],
                "numero_ruc" => $_POST["numero_ruc"],
                "direccion_empresa" => $_POST["direccion_empresa"],
                "tipo_pago" => $_POST["tipo_pago"]
            ];

            $clienteModel->actualizar($data);

            header("Location: /Software_de_Empresa/index.php?action=clientes");
            exit();
        }

        $cliente = $clienteModel->obtenerPorId($id);
        require __DIR__ . "/../views/clientes/editar.php";
    }
}