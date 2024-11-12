<?php 
    include 'plantilla.html'; 
    startblock('article');
    $consultar = new cliente();
    $array_driver = $consultar->listar_cliente();
?>

<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="row">
            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                <h3 class="font-weight-bold">Nuevo Admin</h3>
                <h6 class="font-weight-normal mb-0">Completa la información del nuevo administrador.</h6>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-10 col-xs-12 grid-margin stretch-card" >    
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Formulario nuevo administrador</h4>
                <p class="card-description">Registra la información completa del administrador.</p>

                <form id="formNuevoCliente" action="action/control_admin.php" method="post"> 
                    <input type="hidden" name="caso" value="1">

                    <label for="nombre">Nombre</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
                        
                    </div>

                    <label for="apellido">Apellido</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido" required>
                        
                    </div>

                    <label for="documento">Documento</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="documento" name="documento" placeholder="Documento" required>
                        
                    </div>

                    <label for="celular">Celular</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="celular" name="celular" placeholder="Celular" required>
                    </div>

                    <label for="registro">Fecha de Registro</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" id="registro" name="registro" value="<?php echo date('Y-m-d'); ?>" required>
                        
                    </div>
                    <br>

                    <label for="celular">Correo</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="correo" name="correo" placeholder="correo" required>
                    </div>


                    <label for="celular">Contraseña</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="contrasena" name="contrasena" placeholder="contrasena" required>
                    </div>

                    <br>

                    <div class="contenedor-boton">
                        <button type="submit" class="btn btn-sm btn-info">Registrar Administrador</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<?php endblock(); ?>

<script>
  document.getElementById('formNuevoCliente').addEventListener('submit', function (e) {
    let nombre = document.getElementById('nombre').value;
    let apellido = document.getElementById('apellido').value;
    let documento = document.getElementById('documento').value;

    if (!nombre || !apellido || !documento) {
      e.preventDefault();
      Swal.fire({
        title: 'Error!',
        text: 'Todos los campos son obligatorios.',
        icon: 'error',
        confirmButtonText: 'Entendido'
      });
    }
  });
</script>
