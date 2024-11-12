<?php 
include 'plantilla.html'; 
startblock('article');

// Crear instancia y listar clientes.
$consultar = new cliente();
$array_clientes = $consultar->listar_cliente();
?>

<div class="row">
  <div class="col-md-12 grid-margin">
    <h3 class="font-weight-bold">Lista de usuarios</h3>
    <h6 class="font-weight-normal mb-4">
      Total de clientes registrados: 
      <span class="text-primary"><?php echo count($array_clientes); ?></span>
    </h6>
  </div>
</div>

<div class="row justify-content-center">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Usuarios Registrados</h4>

        <?php if (count($array_clientes) > 0) { ?>
          <div class="table-responsive">
            <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th>#</th>
                  <th>Nombre Completo</th>
                  <th>Cédula</th>
                  <th>Celular</th>
                  <th>Correo</th>
                  <th>Estado</th>
                  <th>Tipo</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $cont = 0;
                foreach ($array_clientes as $cliente) {
                  $cont++;
                ?>
                <tr>
                  <td><?php echo $cont; ?></td>
                  <td><?php echo $cliente['uNombre'] . " " . $cliente['uApellido']; ?></td>
                  <td><?php echo $cliente['uDocumento']; ?></td>
                  <td><?php echo $cliente['uCelular']; ?></td>
                  <td><?php echo $cliente['uCorreo']; ?></td>
                  <td><?php echo $cliente['lEstado'] == 1 ? 'Activo' : 'Inactivo'; ?></td>
                  <td><?php echo $cliente['nTipoID']== 1 ? 'Admin' : 'Cliente'; ?></td>
                  <td>
                      <button class="btn <?php echo $cliente['lEstado'] == 1 ? 'btn-outline-danger' : 'btn-outline-success'; ?> btn-sm" 
                              onclick="cambiarEstado('<?php echo $cliente['nUsuarioID']; ?>', <?php echo $cliente['lEstado'] == 1 ? 0 : 1; ?>)">
                          <?php echo $cliente['lEstado'] == 1 ? 'Desactivar' : 'Activar'; ?>
                      </button>
                      <a class="btn btn-outline-info btn-sm" 
                        href="cliente_editar.php?ID=<?php echo $cliente['nUsuarioID']; ?>">
                        Editar Perfil
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



