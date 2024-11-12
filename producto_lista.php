<?php 
include 'plantilla.html'; 
startblock('article');

// Crear instancia y listar clientes.
$consultar = new Productos();
$array_productos = $consultar->listar_productos();
?>

<div class="row">
  <div class="col-md-12 grid-margin">
    <h3 class="font-weight-bold">Lista de Productos</h3>
    <h6 class="font-weight-normal mb-4">
      Total de Productos registrados: 
      <span class="text-primary"><?php echo count($array_productos); ?></span>
    </h6>
  </div>
</div>

<div class="row justify-content-center">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Usuarios Registrados</h4>

        <?php if (count($array_productos) > 0) { ?>
          <div class="table-responsive">
            <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th>#</th>
                  <th>Nombre</th>
                  <th>Descripcion</th>
                  <th>Precio</th>
                  <th>Stock</th>
                  <th>categoria</th>
                  <th>Marca</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $cont = 0;
                foreach ($array_productos as $producto) {
                  $cont++;
                ?>
                <tr>
                  <td><?php echo $cont; ?></td>
                  <td><?php echo $producto['nombre_producto']?></td>
                  <td><?php echo $producto['descripcion']; ?></td>
                  <td><?php echo $producto['precio']; ?></td>
                  <td><?php echo $producto['cantidad_disponible']; ?></td>
                  <td><?php echo $producto['categoria']?></td>
                  <td><?php echo $producto['marca']?></td>
                  <td>
                <!--
                      <button class="btn <?php echo $producto['lEstado'] == 1 ? 'btn-outline-danger' : 'btn-outline-success'; ?> btn-sm" 
                              onclick="cambiarEstado('<?php echo $producto['producto_id']; ?>', <?php echo $producto['lEstado'] == 1 ? 0 : 1; ?>)">
                          <?php echo $producto['lEstado'] == 1 ? 'Desactivar' : 'Activar'; ?>
                      </button>
                      -->
                      <a class="btn btn-outline-info btn-sm" 
                        href="producto_editar.php?ID=<?php echo $producto['producto_id']; ?>">
                        Editar Producto
                      </a>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        <?php } else { ?>
          <h2 class="text-warning text-center">No hay clientes registrados.</h2>
        <?php } ?>
      </div>
    </div>
  </div>
</div>

<?php endblock(); ?>

<script>
  function cambiarEstado(id, nuevoEstado) {
    if (confirm("¿Deseas cambiar el estado de este cliente?")) {
      let form = document.createElement("form");
      form.method = "POST";
      form.action = "action/control_cliente.php";

      form.innerHTML = `
        <input type="hidden" name="caso" value="3">
        <input type="hidden" name="id" value="${id}">
        <input type="hidden" name="estado" value="${nuevoEstado}">
      `;
      document.body.appendChild(form);
      form.submit();
    }
  }
</script>



