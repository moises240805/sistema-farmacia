<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Farmacia: Productos</title>
    <?php
    require_once 'components/links.php';
    ?>
    <link rel="stylesheet" href="assets/css/validaciones.css" />
  </head>
  <body>
    <?php
    require_once 'components/menu.php';
    require_once 'components/header.php';
    ?>
      <div class="container">
          <div class="page-inner">
            <div class="page-header">
              <h3 class="fw-bold mb-3">Productos</h3>
              <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                  <a href="ndex.php?url=dashboard">
                    <i class="icon-home"></i>
                  </a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="index.php?url=dashboard">Dashboard</a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="index.php?url=categorias">Categorias</a>
                </li>
              </ul>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                      <h4 class="card-title">Registros</h4>
                      <button
                        class="btn btn-outline-success btn-round ms-auto"
                        data-bs-toggle="modal"
                        data-bs-target="#productoModal"
                      >
                        <i class="fa fa-plus"></i>
                        Agregar
                      </button>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table
                        id="add-row"
                        class="display table table-striped table-hover"
                      >
                        <thead>
                          <tr>
                              <th>#</th>
                            <th>Img</th>
                            <th>Nombre</th>
                            <th>Categoria</th>
                            <th>Proveedor</th>
                            <th>Precio</th>
                            <th>Stock</th>
                            <th>U. medida</th>
                            <th>F. Registro</th>
                            <th>F. Vecimiento</th>
                            <th>Actualizacion</th>
                            <th style="width: 10%">Accion</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                //verifica si cliente existe o esta vacia en dado caso que este vacia muestra clientes no 
                // registrados ya que si el usuario que realizo la pedticion no tiene el permiso en cambio 
                // si lo tiene muestra la informacion
                if(isset($productos) && is_array($productos) && !empty($productos)){
                foreach ($productos as $producto): 
            ?>
                          <tr>
                            <td><?php echo $producto['producto_id']; ?></td>
                            <td><?php echo $producto['producto_img']; ?></td>
                            <td><?php echo $producto['producto_nombre']; ?></td>
                            <td><?php echo $producto['categoria_nombre']; ?></td>
                            <td><?php echo $producto['proveedor_nombre']; ?></td>
                            <td><?php echo $producto['producto_precio']; ?></td>
                            <td><?php echo $producto['producto_cantidad']; ?></td>
                            <td><?php echo $producto['unidad_medida_nombre']; ?></td>
                            <td><?php echo $producto['producto_fecha_registro']; ?></td>
                            <td><?php echo $producto['producto_fecha_vencimiento']; ?></td>
                            <td><?php echo $producto['actualizacion_nombre']; ?></td>
                            <td>
                              <div class="form-button-action">
                                <a
                                onclick="ObtenerProducto(<?php echo $producto['producto_id']; ?>)"
                                data-bs-toggle="modal"
                                data-bs-target="#productoModalModificar"      
                                type="button"
                                class="btn btn-link btn-primary btn-lg"
                                title='Modificar'
                                >
                                  <i class="fa fa-edit"></i>
                                </a>
                                <a href="#"
                                 onclick="return EliminarProducto(event,<?php echo $producto['producto_id']; ?>)"
                                  type="button"
                                  data-bs-toggle="tooltip"
                                  class="btn btn-link btn-danger"
                                  title='Eliminar'
                                >
                                  <i class="fa fa-times"></i>
                                </a>
                              </div>
                            </td>
                          </tr>
                                      <?php
            //Imprime esta informacion en caso de estar vacia la variable             
            endforeach; 
        } else {
            echo "<tr><td colspan='6'>No hay registros.</td></tr>";
        } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
<?php
require_once 'components/footer.php';
require_once 'components/scripts.php';
?>


<!-- Modal -->
<div class="modal fade" id="productoModal" tabindex="-1" aria-labelledby="productoModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="formProducto" onsubmit="return validar_formulario()" method="post" action="index.php?url=productos&action=agregar">
        <div class="modal-header">
          <h5 class="modal-title" id="categoriaModalLabel">Agregar Nuevo Producto</h5>
          <button type="button" class="fa fa-close btn btn-outline-dark btn-round ms-auto" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>
        <div class="modal-body">
              <label for="nombreCategoria" class="form-label"><b>Nombre de Producto</b></label>
              <input type="text" class="form-control" id="nombreProducto" name="nombreProducto" placeholder="Ingrese el nombre" oninput="validar_nombre()" required>
              <span id="errorProducto" class="error-messege"></span>
              <span id="icono-validacionProducto" class="input-icon"></span>
        </div>
        <div class="modal-footer d-flex justify-content-center">
          <button type="button" class="btn btn-outline-danger btn-round" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-outline-success btn-round">Guardar</button>
        </div>
      </form>
    </div>
  </div>
</div>


<!-- Modal Modificar -->
<div class="modal fade" id="productoModalModificar" tabindex="-1" aria-labelledby="productoModalModificarLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="formProducto" onsubmit="return validar_formulario_modificado()" method="post" action="index.php?url=productos&action=modificar">
        <div class="modal-header">
          <h5 class="modal-title" id="categoriaModalModificarLabel">Modificar Producto</h5>
          <button type="button" class="fa fa-close btn btn-outline-dark btn-round ms-auto" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>
        <div class="modal-body">
              <input type="hidden" class="form-control" id="id" name="id" placeholder="" required>
              <label for="nombreCategoria" class="form-label"><b>Nombre de Producto</b></label>
              <input type="text" class="form-control" id="nombreProductoEdit" name="nombreProducto" placeholder="Ingrese el nombre" oninput="validar_nombre_modificado()" required>
              <span id="errorProductoEdit" class="error-messege"></span>
              <span id="icono-validacionProductoEdit" class="input-icon"></span>
        </div>
        <div class="modal-footer d-flex justify-content-center">
          <button type="button" class="btn btn-outline-danger btn-round" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-outline-warning btn-round">Modificar</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="assets/js/validaciones/productos_validaciones.js"></script>
<script src="assets/js/ajax/productos_ajax.js"></script>

  </body>
</html>