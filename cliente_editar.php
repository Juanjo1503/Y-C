<?php 
    include 'plantilla.html'; 
    startblock('article');

    $ID = $_GET['ID'];
    $consultar_cliente = new cliente();
    $cliente = $consultar_cliente->detalle_cliente($ID);
    ?>

<div class="row">
    <div class="col-md-12 grid-margin">
        <h3 class="font-weight-bold">Editar Cliente</h3>
    </div>
</div>

<div class="row">
    <div class="col-md-10 col-xs-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Formulario Detalles Cliente</h4>
                <p class="card-description">Actualiza los datos del cliente.</p>

                <form id="formEditarCliente" action="action/control_cliente.php" method="post"> 
                    <input type="hidden" name="caso" value="2">
                    <input type="hidden" name="id" value="<?php echo $cliente['nUsuarioID']; ?>">

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="nombre" name="nombre" 
                               placeholder="Nombre" value="<?php echo $cliente['uNombre']; ?>" >
                        <label for="nombre">Nombre</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="apellido" name="apellido" 
                               placeholder="Apellido" value="<?php echo $cliente['uApellido']; ?>" >
                        <label for="apellido">Apellido</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="doc" name="documento" 
                               placeholder="Documento" value="<?php echo $cliente['uDocumento']; ?>" >
                        <label for="doc">Documento</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="date" class="form-control" id="registro" name="registro" 
                               value="<?php echo $cliente['dRegistro']; ?>" required>
                        <label for="registro">Fecha de Registro</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="cel" name="celular" 
                               placeholder="Celular" value="<?php echo $cliente['uCelular']; ?>" >
                        <label for="cel">Celular</label>
                    </div>

                    
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="correo" name="correo" 
                        placeholder="correo" value="<?php echo $cliente['uCorreo']; ?>">
                        <label for="celular">Correo</label>
                    </div>
                    
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="contrasena" name="contrasena" 
                        placeholder="contrasena" value="<?php echo $cliente['uContrasena']; ?>">
                        <label for="celular">Contrasena</label>
                    </div>



                    <div class="d-flex justify-content-between">
                        <a href="cliente_lista.php" class="btn btn-info">Volver</a>
                        <button type="submit" class="btn btn-info">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php endblock(); ?>


