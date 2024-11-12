<?php 
    include 'plantilla.html'; 
    startblock('article');
    $consultar = new Productos();
    $array_driver = $consultar->listar_productos();
?>

<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="row">
            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                <h3 class="font-weight-bold">Nuevo Producto</h3>
                <h6 class="font-weight-normal mb-0">Completa la información del nuevo producto.</h6>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-10 col-xs-12 grid-margin stretch-card" >    
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Formulario nuevo producto</h4>
                <p class="card-description">Registra la información completa del Producto.</p>

                <form id="formNuevoProducto" action="action/control_producto.php" method="post"> 
                    <input type="hidden" name="caso" value="1">

                    <label for="nombre">Nombre</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
                        
                    </div>

                    <label for="apellido">Descripcion</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripcion" required>
                        
                    </div>

                    <label for="documento">precio</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="precio" name="precio" placeholder="precio" required>
                        
                    </div>

                    <label for="celular">cantidad</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="cantidad" name="cantidad" placeholder="cantidad" required>
                    </div>

                    <br>

                   

                    <label for="marca_id">Categoria</label>
                    <div class="col-sm-9">
                        <select class="form-control" id="categoria_id" name="categoria_id">
                            <option value="" disabled selected>Selecciona la categoria</option>
                            <option value="1">HOMBRE</option>
                            <option value="2">MUJER</option>
                            <option value="3">NIÑOS</option>
                        </select>
                    </div>
                    

                    <label for="marca_id">Marca</label>
                    <div class="col-sm-9">
                        <select class="form-control" id="marca_id" name="marca_id">
                            <option value="" disabled selected>Selecciona la marca</option>
                            <option value="1">NIKE</option>
                            <option value="2">ADIDAS</option>
                        </select>
                    </div>

                    <br>

                    <label for="celular">imagen</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="imagen_url" name="imagen_url" placeholder="imagen url">
                    </div>

                    <br>

                    <label for="registro">Fecha de Registro</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" id="registro" name="registro" value="<?php echo date('Y-m-d'); ?>" required>
                        
                    </div>

                    <div class="contenedor-boton">
                        <button type="submit" class="btn btn-sm btn-info">Registrar Producto</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<?php endblock(); ?>

<script>
    //Revisar validaciones
    document.getElementById('formNuevoProducto').addEventListener('submit', function (e) {
    let nombre = document.getElementById('nombre').value;
    let apellido = document.getElementById('apellido').value;
    let documento = document.getElementById('documento').value;

    if (!nombre || !apellido || !documento) {
      e.preventDefault();
      Swal.fire({
        title: 'Error!',
        text: 'Todos los campos son obligatoriossssssssssssss.',
        icon: 'error',
        confirmButtonText: 'Entendido'
      });
    }
  });
</script>
