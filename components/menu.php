<div class="wrapper">
      <!-- Sidebar -->
      <div class="sidebar" data-background-color="dark">
        <div class="sidebar-logo">
          <!-- Logo Header -->
          <div class="logo-header" data-background-color="dark">
            <a href="index.php?url=dashboard" class="logo">
              <img
                src="assets/img/kaiadmin/logo_light.svg"
                alt="navbar brand"
                class="navbar-brand"
                height="20"
              />
            </a>
            <div class="nav-toggle">
              <button class="btn btn-toggle toggle-sidebar">
                <i class="gg-menu-right"></i>
              </button>
              <button class="btn btn-toggle sidenav-toggler">
                <i class="gg-menu-left"></i>
              </button>
            </div>
            <button class="topbar-toggler more">
              <i class="gg-more-vertical-alt"></i>
            </button>
          </div>
          <!-- End Logo Header -->
        </div>
        <div class="sidebar-wrapper scrollbar scrollbar-inner">
          <div class="sidebar-content">
            <ul class="nav nav-secondary">
              <li class="nav-item active">
                <a href="index.php?url=dashboard">
                  <i class="fas fa-home"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              <li class="nav-section">
                <span class="sidebar-mini-icon">
                  <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section"><i class="fa fa-briefcase"></i> Administracion</h4>
              </li>
              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#catalogo">
                  <i class="fa fa-th, fa fa-th-list" aria-hidden="true"></i>
                  <p>Catalogo</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="catalogo">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="index.php?url=categorias">
                        <i class="fa fa-list-alt"></i>
                        <span class="sub-item">Categorias</span>
                      </a>
                    </li>
                    <li>
                      <a href="index.php?url=marcas">
                        <i class="fa fa-tags"></i>
                        <span class="sub-item">Marcas</span>
                      </a>
                    </li>
                    <li>
                      <a href="index.php?url=presentacion">
                        <i class="fa fa-box"></i>
                        <span class="sub-item">Presentacion</span>
                      </a>
                    </li>
                    <li>
                      <a href="index.php?url=productos">
                        <i class="fa fa-cubes"></i>
                        <span class="sub-item">Productos</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a href="index.php?url=clientes">
                  <i class="fa fa-users"></i>
                  <p>Clientes</p>
                  <span class="caret"></span>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?url=proveedores">
                  <i class="fa fa-truck"></i>
                  <p>Proveedores</p>
                  <span class="caret"></span>
                </a>
              </li>
              <li class="nav-section">
                <span class="sidebar-mini-icon">
                  <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section"><i class="fa fa-file-invoice"></i> Facturacion / Ordenes</h4>
              </li>
              <li class="nav-item">
                <a href="index.php?url=ventas">
                  <i class="fas fa-shopping-basket"></i>
                  <p>Ventas</p>
                  <span class="caret"></span>
                </a>
              </li>
              <li class="nav-item">
                <a data-bs-toggle="collapse" href="index.php?url=compras">
                  <i class="fa fa-shopping-cart"></i>
                  <p>Compras</p>
                  <span class="caret"></span>
                </a>
              </li>
              <li class="nav-section">
                <span class="sidebar-mini-icon">
                  <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section"><i class="fa fa-dollar-sign"></i> Finanzas</h4>
              </li>
               <li class="nav-item">
                <a data-bs-toggle="collapse" href="#cuenta">
                  <i class="fa fa-bank" aria-hidden="true"></i>
                  <p>Cuentas</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="cuenta">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="index.php?url=cobrar">
                        <i class="fa fa-file-invoice-dollar"></i>
                        <span class="sub-item">Cuentas por Cobrar</span>
                      </a>
                    </li>
                    <li>
                      <a href="index.php?url=pagar">
                        <i class="fa fa-receipt"></i>
                        <span class="sub-item">Cuentas por Pagar</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#movimientos">
                  <i class="fa fa-chart-bar"></i>
                  <p>Movimientos</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="movimientos">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="index.php?url=caja">
                        <i class="fa fa-dollar"></i>
                        <span class="sub-item">Cajas</span>
                      </a>
                    </li>
                    <li>
                      <a href="index.php?ulr=ingreso">
                        <i class="fa fa-hand-holding-usd"></i>
                        <span class="sub-item">Ingresos</span>
                      </a>
                    </li>
                    <li>
                      <a href="index.php?ulr=engreso"> 
                        <i class="fa fa-money-bill-wave"></i>
                        <span class="sub-item">Engresos</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-section">
                <span class="sidebar-mini-icon">
                  <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section"><i class="fa fa-cog"></i> Configuracion</h4>
              </li>
              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#sistema">
                  <i class="fa fa-desktop"></i>
                  <p>Sistema</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="sistema">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="index.php?url=usuario">
                        <i class="fa fa-user-circle"></i>
                        <span class="sub-item">Usuarios</span>
                      </a>
                    </li>
                    <li>
                      <a href="index.php?ulr=seguridad">
                        <i class="fa fa-shield-alt"></i>
                        <span class="sub-item">Seguridad</span>
                      </a>
                    </li>
                    <li>
                    <li>
                      <a href="index.php?ulr=bitacora">
                        <i class="fa fa-file-text"></i>
                        <span class="sub-item">Bitacora</span>
                      </a>
                    </li>
                    <li>
                      <a href="index.php?ulr=mantenimiento"> 
                        <i class="fa fa-database"></i>
                        <span class="sub-item">mantenimiento</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-section">
                <span class="sidebar-mini-icon">
                  <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section"><i class="fa fa-file-word"></i> Documentos</h4>
              </li>
              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#reportes">
                  <i class="fa fa-file"></i>
                  <p>Reportes</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="reportes">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="index.php?url=reportes_generales">
                        <i class="fa fa-file-text"></i>
                        <span class="sub-item">Generales / Parametrizados</span>
                      </a>
                    </li>
                    <li>
                      <a href="index.php?ulr=reportes_estadisticos">
                        <i class="fa fa-chart-bar"></i>
                        <span class="sub-item">Estadisticos</span>
                      </a>
                    </li>
                    <li>
                      <a href="index.php?ulr=facturas">
                        <i class="fa fa-file-invoice-dollar"></i>
                        <span class="sub-item">Facturas</span>
                      </a>
                    </li>
                    <li>
                      <a href="index.php?ulr=documuentos"> 
                        <i class="fa fa-file-pdf"></i>
                        <span class="sub-item">DOCS / XLS / PDF</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-section">
                <span class="sidebar-mini-icon">
                  <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section"><i class="fa fa-question-circle"></i> Ayuda</h4>
              </li>
              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#manual">
                  <i class="fa fa-folder-open"></i>
                  <p>Manuales</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="manual">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="index.php?url=manual">
                        <i class="fa fa-book-open"></i>
                        <span class="sub-item">Manual</span>
                      </a>
                    </li>
                    <li>
                      <a href="index.php?ulr=manual_form">
                        <i class="fa fa-file-alt"></i>
                        <span class="sub-item">Formularios</span>
                      </a>
                    </li>
                    <li>
                      <a href="index.php?ulr=manual_facturas">
                        <i class="fa fa-file-text"></i>
                        <span class="sub-item">Facturas</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
          </div>
        </div>
      </div>