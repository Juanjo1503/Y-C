<?php 
    include 'plantilla.html'; 
    startblock('article');

    $ID = $_GET['ID'];
    $consultar_producto = new Productos();
    $producto = $consultar_producto->detalle_producto($ID);
    ?>

<div class="row">
    <div class="col-md-12 grid-margin">
        <h3 class="font-weight-bold">Editar Producto</h3>
    </div>
</div>

<div class="row">
    <div class="col-md-10 col-xs-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Formulario Detalles Producto</h4>
                <p class="card-description">Actualiza los datos del Producto.</p>

                <form id="formEditarProducto" action="action/control_producto.php" method="post"> 
                    <input type="hidden" name="caso" value="2">
                    <input type="hidden" name="id" value="<?php echo $producto['producto_id']; ?>">

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="nombre" name="nombre" 
                               placeholder="Nombre" value="<?php echo $producto['nombre_producto']; ?>" >
                        <label for="nombre">Nombre</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="descripcion" name="descripcion" 
                               placeholder="descripcion" value="<?php echo $producto['descripcion']; ?>" >
                        <label for="descripcion">Descripcion</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="precio" name="precio" 
                               placeholder="precio" value="<?php echo $producto['precio']; ?>" >
                        <label for="precio">Precio</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="cantidad" name="cantidad" 
                               value="<?php echo $producto['cantidad_disponible']; ?>" required>
                        <label for="cantidad">Cantidad</label>
                    </div>

                    
                    <label for="marca_id">Categoria</label>
                    <div class="form-floating mb-3">
                        <select class="form-control" id="categoria_id" name="categoria_id">
                            <option value="<?php echo $producto['categoria']; ?>"><?php echo $producto['categoria']; ?></option>
                            <option value="1">HOMBRE</option>
                            <option value="2">MUJER</option>
                            <option value="3">NIÑOS</option>
                        </select>
                    </div>
               

                    <label for="marca_id">Marca</label>
                    <div class="form-floating mb-3">
                        <select class="form-control" id="marca_id" name="marca_id">
                            <option value="<?php echo $producto['marca']; ?>" ><?php echo $producto['marca']; ?></option>
                            <option value="1">NIKE</option>
                            <option value="2">ADIDAS</option>
                        </select>
                    </div>
                 
                    
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="imagen_producto" name="imagen_producto" 
                        placeholder="imagen_producto" value="<?php echo $producto['imagen_producto']; ?>">
                        <label for="imagen_producto">Imagen</label>
                    </div>



                    <div class="d-flex justify-content-between">
                        <a href="producto_lista.php" class="btn btn-info">Volver</a>
                        <button type="submit" class="btn btn-info">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php endblock(); ?>


