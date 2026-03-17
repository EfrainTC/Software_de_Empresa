<?php
// 🔥 VISTA PARCIAL (SIN HTML COMPLETO)
?>

<h1>Nuevo Cliente</h1>

<form method="POST" action="index.php?action=cliente_guardar">

<h3>Datos del Cliente</h3>

<label>Tipo Documento:</label><br>
<input type="text" name="tipo_documento" required><br><br>

<label>Número Documento:</label><br>
<input type="text" name="numero_documento" required><br><br>

<label>Nombre:</label><br>
<input type="text" name="nombre" required><br><br>

<label>Dirección:</label><br>
<input type="text" name="direccion"><br><br>

<label>Teléfono:</label><br>
<input type="text" name="telefono"><br><br>

<label>Correo:</label><br>
<input type="email" name="correo"><br><br>

<hr>

<h3>Datos de la Empresa</h3>

<label>Código:</label><br>
<input type="text" name="codigo_empresa"><br><br>

<label>Nombre Empresa:</label><br>
<input type="text" name="nombre_empresa"><br><br>

<label>Tipo Proveedor:</label><br>
<input type="text" name="tipo_proveedor"><br><br>

<label>Número RUC:</label><br>
<input type="text" name="numero_ruc"><br><br>

<label>Dirección Empresa:</label><br>
<input type="text" name="direccion_empresa"><br><br>

<label>Tipo de Pago:</label><br>
<input type="text" name="tipo_pago"><br><br>

<button type="submit">Guardar</button>

</form>

<br>
<a href="index.php?action=clientes">← Volver</a>