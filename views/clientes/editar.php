<?php
$cliente = $cliente ?? [];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Cliente</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f4f8;
            padding: 20px;
            color: #333;
        }

        h1 {
            text-align: center;
            color: #2c3e50;
        }

        form {
            max-width: 600px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        label {
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-top: 4px;
            margin-bottom: 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        button {
            background-color: #2ecc71;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #27ae60;
        }

        a {
            display: inline-block;
            margin-top: 15px;
            color: #3498db;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        hr {
            margin: 20px 0;
        }

        h3 {
            color: #34495e;
        }
    </style>
</head>
<body>

<h1>Editar Cliente</h1>

<form method="POST">

    <h3>Datos del Cliente</h3>

    <label>Tipo Documento:</label>
    <input type="text" name="tipo_documento" value="<?= htmlspecialchars($cliente['tipo_documento'] ?? '') ?>" required>

    <label>Número Documento:</label>
    <input type="text" name="numero_documento" value="<?= htmlspecialchars($cliente['numero_documento'] ?? '') ?>" required>

    <label>Nombre:</label>
    <input type="text" name="nombre" value="<?= htmlspecialchars($cliente['nombre'] ?? '') ?>" required>

    <label>Dirección:</label>
    <input type="text" name="direccion" value="<?= htmlspecialchars($cliente['direccion'] ?? '') ?>">

    <label>Teléfono:</label>
    <input type="text" name="telefono" value="<?= htmlspecialchars($cliente['telefono'] ?? '') ?>">

    <label>Correo:</label>
    <input type="email" name="correo" value="<?= htmlspecialchars($cliente['correo'] ?? '') ?>">

    <hr>

    <h3>Datos de la Empresa</h3>

    <label>Código Empresa:</label>
    <input type="text" name="codigo_empresa" value="<?= htmlspecialchars($cliente['codigo_empresa'] ?? '') ?>">

    <label>Nombre Empresa:</label>
    <input type="text" name="nombre_empresa" value="<?= htmlspecialchars($cliente['nombre_empresa'] ?? '') ?>">

    <label>Tipo Proveedor:</label>
    <input type="text" name="tipo_proveedor" value="<?= htmlspecialchars($cliente['tipo_proveedor'] ?? '') ?>">

    <label>Número RUC:</label>
    <input type="text" name="numero_ruc" value="<?= htmlspecialchars($cliente['numero_ruc'] ?? '') ?>">

    <label>Dirección Empresa:</label>
    <input type="text" name="direccion_empresa" value="<?= htmlspecialchars($cliente['direccion_empresa'] ?? '') ?>">

    <label>Tipo de Pago:</label>
    <input type="text" name="tipo_pago" value="<?= htmlspecialchars($cliente['tipo_pago'] ?? '') ?>">

    <button type="submit">Actualizar</button>

</form>
<a href="/Software_de_Empresa/index.php?action=clientes">← Volver</a>
</body>
</html>