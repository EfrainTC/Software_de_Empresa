<?php
session_start();

require_once "controllers/LoginController.php";
require_once "controllers/ClienteController.php";

// Acción
$action = $_GET['action'] ?? "login";

// 🔐 Protección
if ($action != "login" && $action != "autenticar" && !isset($_SESSION['usuario'])) {
    header("Location: index.php?action=login");
    exit;
}

// Enrutamiento
switch ($action) {

    // LOGIN
    case "login":
        require_once "views/login/login.php";
        break;

    case "autenticar":
        (new LoginController())->autenticar();
        exit;

    case "logout":
        (new LoginController())->logout();
        exit;

        // DASHBOARD (SOLO VISTA)
    case "dashboard":
        require_once "views/dashboard.php";
        break;

    // CLIENTES (SOLO VISTA)
    case "clientes":
        require_once "views/clientes/index.php";
        break;

    case "cliente_crear":
        require_once "views/clientes/crear.php";
        break;

    default:
        echo "<h1>Página no encontrada</h1>";
        exit;
}
