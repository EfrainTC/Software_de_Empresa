<?php
// 🔥 VISTA PARCIAL (SIN HTML, HEAD NI BODY)
?>

<style>
    /* Reset y tipografía */
    .contenido-clientes {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f0f4f8;
        padding: 20px;
        color: #333;
    }

    .contenido-clientes h1 {
        text-align: center;
        color: #2c3e50;
    }

    .contenido-clientes a {
        text-decoration: none;
        color: #3498db;
    }

    .contenido-clientes a:hover {
        text-decoration: underline;
    }

    /* Botón Nuevo Cliente */
    .btn-nuevo {
        display: inline-block;
        background-color: #2ecc71;
        color: white !important;
        padding: 10px 20px;
        border-radius: 6px;
        font-weight: bold;
        margin-bottom: 20px;
        transition: background-color 0.3s;
    }

    .btn-nuevo:hover {
        background-color: #27ae60;
    }

    /* Tabla */
    .contenido-clientes table {
        width: 100%;
        border-collapse: collapse;
        background-color: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .contenido-clientes th,
    .contenido-clientes td {
        padding: 12px 15px;
        text-align: left;
    }

    .contenido-clientes th {
        background-color: #3498db;
        color: white;
    }

    .contenido-clientes tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .contenido-clientes tr:hover {
        background-color: #f1f1f1;
    }

    /* Acciones */
    .accion {
        font-size: 18px;
        padding: 5px 8px;
        border-radius: 4px;
        color: white;
    }

    .editar {
        background-color: #f39c12;
    }

    .editar:hover {
        background-color: #e67e22;
    }

    .eliminar {
        background-color: #e74c3c;
    }

    .eliminar:hover {
        background-color: #c0392b;
    }

    /* Volver */
    .volver {
        display: inline-block;
        margin-top: 20px;
        color: #34495e;
    }

    .volver:hover {
        text-decoration: underline;
    }

    /* Mensaje */
    .contenido-clientes p {
        text-align: center;
        font-style: italic;
        color: #7f8c8d;
    }
</style>

<div class="contenido-clientes">

    <h1>Lista de Clientes</h1>

    <a href="index.php?action=cliente_crear" class="btn-nuevo menu-link">
        ➕ Nuevo Cliente
    </a>

    <hr>

    <?php if (empty($clientes)) : ?>
        <p>No hay clientes registrados.</p>
    <?php else : ?>

        <table>
            <tr>
                <th>Cliente</th>
                <th>Empresa</th>
                <th>Acciones</th>
            </tr>

            <?php foreach ($clientes as $cliente) : ?>
                <tr>
                    <td><?= $cliente["nombre"]; ?></td>
                    <td><?= $cliente["nombre_empresa"]; ?></td>
                    <td>
                        <a href="index.php?action=cliente_editar&id=<?= $cliente["id"]; ?>" class="accion editar menu-link">
                            ✏
                        </a>

                        <a href="index.php?action=cliente_eliminar&id=<?= $cliente["id"]; ?>"
                           class="accion eliminar"
                           onclick="return confirm('¿Seguro que deseas eliminar este cliente?');">
                            🗑
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>

        </table>

    <?php endif; ?>

    <br>

    <a href="index.php?action=dashboard" class="volver menu-link">
        ← Volver al Dashboard
    </a>

</div>