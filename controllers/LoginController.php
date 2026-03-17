<?php
class LoginController {

    public function autenticar() {
        session_start();

        $email = $_POST['email'];
        $password = $_POST['password'];

        require_once "models/Usuario.php";
        $usuarioModel = new Usuario();

        $usuario = $usuarioModel->login($email, $password);

        if ($usuario) {
            $_SESSION['usuario'] = $usuario;

            // 🔥 SOLO REDIRECCIÓN AQUÍ
            header("Location: index.php?action=dashboard");
        } else {
            echo "Credenciales incorrectas";
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: index.php?action=login");
    }
}