<?php
// Capturamos la página actual
$current_page = isset($_GET['action']) ? $_GET['action'] : 'dashboard';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fuerza Motriz - ERP</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #f0f2f5;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', sans-serif;
        }

        .container {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 280px;
            background: linear-gradient(180deg, #0f1929 0%, #1a2d47 100%);
            color: #ffffff;
            padding: 24px 20px;
            min-height: 100vh;
            box-shadow: 2px 0 12px rgba(0, 0, 0, 0.3);
            position: fixed;
            left: 0;
            top: 0;
            overflow-y: auto;
            z-index: 1000;
        }

        .logo-section {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 32px;
            padding-bottom: 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .logo-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #2196F3 0%, #1976D2 100%);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 18px;
            color: white;
            flex-shrink: 0;
        }

        .logo-text {
            display: flex;
            flex-direction: column;
        }

        .logo-name {
            font-weight: 700;
            font-size: 13px;
            line-height: 1.2;
            color: #ffffff;
        }

        .logo-subtitle {
            font-size: 10px;
            color: #8fa3b8;
            font-weight: 400;
            line-height: 1.2;
        }

        .sidebar-section {
            margin-bottom: 28px;
        }

        .sidebar-section:last-child {
            margin-bottom: 0;
        }

        .section-title {
            font-size: 10px;
            font-weight: 700;
            color: #6a7f9e;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            margin-bottom: 12px;
            padding: 0 8px;
        }

        .sidebar-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 12px;
            margin-bottom: 6px;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.25s ease;
            color: #b5c3d4;
            font-size: 13px;
            font-weight: 500;
            position: relative;
            text-decoration: none;
            background: none;
            border: none;
            width: 100%;
            text-align: left;
        }

        .sidebar-item:hover {
            background-color: rgba(33, 150, 243, 0.12);
            color: #e0e8f0;
        }

        .sidebar-item.active {
            background-color: rgba(33, 150, 243, 0.2);
            color: #2196F3;
            font-weight: 600;
        }

        .sidebar-item.active::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 3px;
            background-color: #2196F3;
            border-radius: 0 3px 3px 0;
        }

        .sidebar-item-icon {
            width: 18px;
            height: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        svg {
            width: 18px;
            height: 18px;
            stroke: currentColor;
            stroke-width: 2;
            fill: none;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .sidebar-item svg {
            color: inherit;
        }

        .sidebar-item-text {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .sidebar::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar::-webkit-scrollbar-track {
            background: transparent;
        }

        .sidebar::-webkit-scrollbar-thumb {
            background-color: rgba(255, 255, 255, 0.15);
            border-radius: 3px;
        }

        .sidebar::-webkit-scrollbar-thumb:hover {
            background-color: rgba(255, 255, 255, 0.25);
        }

        /* MAIN CONTENT */
        .main-content {
            flex: 1;
            margin-left: 280px;
            padding: 30px;
            overflow-y: auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .header-left h1 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 5px;
            color: #1a1a1a;
        }

        .header-left p {
            font-size: 13px;
            color: #8b95a7;
        }

        .header-right {
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .badge {
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .badge.active {
            background-color: #e8f5e9;
            color: #2e7d32;
        }

        .badge.time {
            background-color: #e3f2fd;
            color: #1976D2;
        }

        .badge-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background-color: #2e7d32;
        }

        .section {
            margin-bottom: 30px;
        }

        .section-title {
            font-size: 12px;
            font-weight: 700;
            color: #8b95a7;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 15px;
        }

        .flujo-operacion {
            display: flex;
            gap: 10px;
            overflow-x: auto;
            padding-bottom: 10px;
        }

        .flujo-item {
            background-color: #1a2640;
            color: white;
            padding: 12px 16px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 600;
            white-space: nowrap;
            flex-shrink: 0;
        }

        .cards-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .card {
            background: white;
            border-radius: 8px;
            padding: 24px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.08);
            border: 1px solid #e8eaed;
        }

        .card-label {
            font-size: 11px;
            font-weight: 700;
            color: #8b95a7;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 12px;
        }

        .card-number {
            font-size: 32px;
            font-weight: 700;
            color: #1a1a1a;
            margin-bottom: 8px;
        }

        .card-subtext {
            font-size: 12px;
            color: #8b95a7;
            margin-bottom: 12px;
        }

        .card-bar {
            height: 3px;
            border-radius: 2px;
            margin-top: 12px;
        }

        .bar-blue {
            background-color: #2196F3;
        }

        .bar-red {
            background-color: #d32f2f;
        }

        .bar-teal {
            background-color: #00897b;
        }

        .bar-purple {
            background-color: #7b1fa2;
        }

        .grid-2x2 {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .card-full {
            background: white;
            border-radius: 8px;
            padding: 24px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.08);
            border: 1px solid #e8eaed;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background-color: #f5f7fa;
            padding: 12px;
            text-align: left;
            font-size: 11px;
            font-weight: 700;
            color: #8b95a7;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 1px solid #e8eaed;
        }

        td {
            padding: 12px;
            border-bottom: 1px solid #e8eaed;
            font-size: 13px;
        }

        td:first-child {
            color: #8b95a7;
        }

        .empty-state {
            text-align: center;
            padding: 20px;
            color: #8b95a7;
            font-size: 13px;
        }

        .alerts-table td {
            padding: 12px;
        }

        .alerts-table tr {
            background-color: #fffbea;
        }

        .alerts-table tr:last-child {
            border-bottom: none;
        }

        .alert-badge {
            background-color: #ffebee;
            color: #c62828;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 11px;
            font-weight: 600;
        }

        .page-content {
            background: white;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.08);
            border: 1px solid #e8eaed;
            min-height: 400px;
        }

        .page-content h2 {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 20px;
            color: #1a1a1a;
        }

        .page-content p {
            color: #666;
            line-height: 1.6;
        }

        .menu-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 12px;
            margin-bottom: 6px;
            border-radius: 6px;
            text-decoration: none;
            color: #b5c3d4;
            transition: all .25s ease;
        }

        .menu-link:hover {
            background-color: rgba(33, 150, 243, .12);
            color: #e0e8f0;
        }

        .menu-link.active {
            background-color: rgba(33, 150, 243, .2);
            color: #2196F3;
            font-weight: 600;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- SIDEBAR FIJO -->
        <div class="sidebar">
            <!-- LOGO -->
            <div class="logo-section">
                <div class="logo-icon">FM</div>
                <div class="logo-text">
                    <div class="logo-name">FUERZA MOTRIZ</div>
                    <div class="logo-subtitle">ÓLEO-HIDRÁULICA + ERP</div>
                </div>
            </div>

            <!-- GENERAL -->
            <div class="sidebar-section">
                <div class="section-title">General</div>
                <a href="?action=dashboard" class="menu-link <?php echo $current_page === 'dashboard' ? 'active' : ''; ?>">
                    <div class="sidebar-item-icon">
                        <svg viewBox="0 0 24 24">
                            <rect x="3" y="3" width="8" height="8" />
                            <rect x="13" y="3" width="8" height="8" />
                            <rect x="3" y="13" width="8" height="8" />
                            <rect x="13" y="13" width="8" height="8" />
                        </svg>
                    </div>
                    <div class="sidebar-item-text">Dashboard</div>
                </a>
            </div>

            <!-- OPERACIONES -->
            <div class="sidebar-section">
                <div class="section-title">Operaciones</div>
                <a href="index.php?action=clientes" class="menu-link <?php echo ($current_page == 'clientes') ? 'active' : ''; ?>">

                    <div class="sidebar-item-icon">
                        <svg viewBox="0 0 24 24">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                            <circle cx="9" cy="7" r="4" />
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                            <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                        </svg>
                    </div>

                    <div class="sidebar-item-text">
                        Gestión de Clientes
                    </div>

                </a>
                <a href="?action=ordenes" class="menu-link <?php echo $current_page === 'ordenes' ? 'active' : ''; ?>">
                    <div class="sidebar-item-icon">
                        <svg viewBox="0 0 24 24">
                            <path d="M9 11l3 3L22 4" />
                            <path d="M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0z" />
                        </svg>
                    </div>
                    <div class="sidebar-item-text">Órdenes de Trabajo</div>
                </a>
                <a href="?action=inventario" class="menu-link <?php echo $current_page === 'inventario' ? 'active' : ''; ?>">
                    <div class="sidebar-item-icon">
                        <svg viewBox="0 0 24 24">
                            <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z" />
                            <polyline points="3.27 6.96 12 12.01 20.73 6.96" />
                            <line x1="12" y1="22.08" x2="12" y2="12" />
                        </svg>
                    </div>
                    <div class="sidebar-item-text">Inventario / Stock</div>
                </a>
            </div>

            <!-- COMPRAS -->
            <div class="sidebar-section">
                <div class="section-title">Compras</div>
                <a href="?action=compras" class="menu-link <?php echo $current_page === 'compras' ? 'active' : ''; ?>">
                    <div class="sidebar-item-icon">
                        <svg viewBox="0 0 24 24">
                            <circle cx="9" cy="21" r="1" />
                            <circle cx="20" cy="21" r="1" />
                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6" />
                        </svg>
                    </div>
                    <div class="sidebar-item-text">Compras y Proveedores</div>
                </a>
            </div>

            <!-- FINANZAS -->
            <div class="sidebar-section">
                <div class="section-title">Finanzas</div>
                <a href="?action=ventas" class="menu-link <?php echo $current_page === 'ventas' ? 'active' : ''; ?>">
                    <div class="sidebar-item-icon">
                        <svg viewBox="0 0 24 24">
                            <polyline points="23 6 13.5 15.5 8.5 10.5 1 18" />
                            <polyline points="17 6 23 6 23 12" />
                        </svg>
                    </div>
                    <div class="sidebar-item-text">Ventas / Cobros</div>
                </a>
                <a href="?action=contabilidad" class="menu-link <?php echo $current_page === 'contabilidad' ? 'active' : ''; ?>">
                    <div class="sidebar-item-icon">
                        <svg viewBox="0 0 24 24">
                            <line x1="12" y1="2" x2="12" y2="22" />
                            <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6" />
                        </svg>
                    </div>
                    <div class="sidebar-item-text">Finanzas / Contabilidad</div>
                </a>
            </div>

            <!-- PERSONAL -->
            <div class="sidebar-section">
                <div class="section-title">Personal</div>
                <a href="?action=rrhh" class="menu-link <?php echo $current_page === 'rrhh' ? 'active' : ''; ?>">
                    <div class="sidebar-item-icon">
                        <svg viewBox="0 0 24 24">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                            <circle cx="12" cy="7" r="4" />
                        </svg>
                    </div>
                    <div class="sidebar-item-text">Recursos Humanos</div>
                </a>
            </div>

            <!-- ANÁLISIS -->
            <div class="sidebar-section">
                <div class="section-title">Análisis</div>
                <a href="?action=reportes" class="menu-link <?php echo $current_page === 'reportes' ? 'active' : ''; ?>">
                    <div class="sidebar-item-icon">
                        <svg viewBox="0 0 24 24">
                            <line x1="12" y1="2" x2="12" y2="22" />
                            <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6" />
                        </svg>
                    </div>
                    <div class="sidebar-item-text">Reportes y KPIs</div>
                </a>
            </div>
        </div>

        <!-- MAIN CONTENT -->
        <div class="main-content" id="contenido">
            <?php if ($current_page === 'dashboard'): ?>
                <div class="header">
                    <div class="header-left">
                        <h1>Dashboard</h1>
                        <p>Vista general del sistema</p>
                    </div>
                    <div class="header-right">
                        <div class="badge active">
                            <span class="badge-dot"></span>
                            Activo
                        </div>
                        <div class="badge time"><?php echo date('h:i a'); ?></div>
                    </div>
                </div>

                <!-- FLUJO DE OPERACIÓN ERP -->
                <div class="section">
                    <div class="section-title">Flujo de Operación ERP</div>
                    <div class="flujo-operacion">
                        <div class="flujo-item">1. Cliente solicita servicio</div>
                        <div class="flujo-item">2. CRM → OT creada</div>
                        <div class="flujo-item">3. Inventario descuenta</div>
                        <div class="flujo-item">4. Técnico ejecuta</div>
                        <div class="flujo-item">5. Finanzas facture</div>
                        <div class="flujo-item">6. Reportes KPIs</div>
                    </div>
                </div>

                <!-- CARDS PRINCIPALES -->
                <div class="cards-grid">
                    <div class="card">
                        <div class="card-label">Clientes</div>
                        <div class="card-number">3</div>
                        <div class="card-subtext">Registrados</div>
                        <div class="card-bar bar-blue"></div>
                    </div>
                    <div class="card">
                        <div class="card-label">OTs Abiertas</div>
                        <div class="card-number">0</div>
                        <div class="card-subtext">En curso</div>
                        <div class="card-bar bar-red"></div>
                    </div>
                    <div class="card">
                        <div class="card-label">Stock Items</div>
                        <div class="card-number">5</div>
                        <div class="card-subtext">Productos</div>
                        <div class="card-bar bar-teal"></div>
                    </div>
                    <div class="card">
                        <div class="card-label">Personal</div>
                        <div class="card-number">3</div>
                        <div class="card-subtext">Registrados</div>
                        <div class="card-bar bar-purple"></div>
                    </div>
                </div>

                <!-- GRID 2X2 -->
                <div class="grid-2x2">
                    <!-- ÚLTIMAS OTS -->
                    <div class="card-full">
                        <div class="card-label">Últimas OTs</div>
                        <table>
                            <thead>
                                <tr>
                                    <th>OT</th>
                                    <th>Cliente</th>
                                    <th>Técnico</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="4" class="empty-state">Sin OTs registradas</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- ALERTAS STOCK MÍNIMO -->
                    <div class="card-full">
                        <div class="card-label">Alertas Stock Mínimo</div>
                        <table class="alerts-table">
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Stock</th>
                                    <th>Mínimo</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Sello mecánico 50mm</td>
                                    <td>3</td>
                                    <td>4</td>
                                    <td><span class="alert-badge">⚠ BAJO</span></td>
                                </tr>
                                <tr>
                                    <td>Manguera hidráulica 1/2" x 1m</td>
                                    <td>2</td>
                                    <td>5</td>
                                    <td><span class="alert-badge">⚠ BAJO</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            <?php elseif ($current_page === 'clientes'): ?>
                <div class="page-content">
                    <h2>Gestión de Clientes</h2>
                    <p>Aquí puedes gestionar todos tus clientes. Puedes agregar nuevos clientes, editar información, ver historial de servicios y más.</p>
                </div>

            <?php elseif ($current_page === 'ordenes'): ?>
                <div class="page-content">
                    <h2>Órdenes de Trabajo</h2>
                    <p>Aquí puedes crear y gestionar órdenes de trabajo. Asigna técnicos, seguimiento de estado y documentación de tareas realizadas.</p>
                </div>

            <?php elseif ($current_page === 'inventario'): ?>
                <div class="page-content">
                    <h2>Inventario / Stock</h2>
                    <p>Controla tu inventario de productos. Registra entradas y salidas, establece niveles mínimos de stock y recibe alertas automáticas.</p>
                </div>

            <?php elseif ($current_page === 'compras'): ?>
                <div class="page-content">
                    <h2>Compras y Proveedores</h2>
                    <p>Administra tus compras y proveedores. Crea órdenes de compra, seguimiento de entregas y gestiona relaciones con proveedores.</p>
                </div>

            <?php elseif ($current_page === 'ventas'): ?>
                <div class="page-content">
                    <h2>Ventas / Cobros</h2>
                    <p>Registra tus ventas y cobros. Crea facturas, controla pagos y visualiza tu flujo de ingresos.</p>
                </div>

            <?php elseif ($current_page === 'contabilidad'): ?>
                <div class="page-content">
                    <h2>Finanzas / Contabilidad</h2>
                    <p>Administra tus finanzas. Estados financieros, balance general, reportes de ganancias y pérdidas.</p>
                </div>

            <?php elseif ($current_page === 'rrhh'): ?>
                <div class="page-content">
                    <h2>Recursos Humanos</h2>
                    <p>Gestiona tu personal. Registra empleados, controla asistencia, nómina y evaluaciones de desempeño.</p>
                </div>

            <?php elseif ($current_page === 'reportes'): ?>
                <div class="page-content">
                    <h2>Reportes y KPIs</h2>
                    <p>Visualiza reportes detallados y KPIs importantes para tu negocio. Analiza tendencias y toma decisiones basadas en datos.</p>
                </div>
            <?php else: ?>
                <div class="page-content">
                    <h2>Página no encontrada</h2>
                    <p>La sección que intentas abrir no existe.</p>
                </div>
            <?php endif; ?>

        </div>

    </div>


    <script>
        document.querySelectorAll(".menu-link").forEach(link => {

            link.addEventListener("click", function(e) {

                e.preventDefault();

                let url = this.getAttribute("href")

                fetch(url)
                    .then(res => res.text())
                    .then(html => {

                        let parser = new DOMParser()
                        let doc = parser.parseFromString(html, "text/html")

                        let contenido = doc.querySelector("#contenido").innerHTML

                        document.querySelector("#contenido").innerHTML = contenido

                        window.history.pushState({}, "", url)

                    })

            })

        })
    </script>

</body>

=======
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>
<body>

<h1>Bienvenido <?php echo $_SESSION["usuario"]; ?></h1>

<hr>

<h3>Menú Principal</h3>

<ul>
    <li>
        <a href="/Software_de_Empresa/index.php?action=clientes">
            Gestión de Clientes
        </a>
    </li>

    <li>Productos (Próximo módulo)</li>
    <li>Orden de Trabajo (Próximo módulo)</li>

    <li>
        <a href="/Software_de_Empresa/index.php?action=logout">
            Cerrar sesión
        </a>
    </li>
</ul>

</body>
</html>