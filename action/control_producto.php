<?php
require_once '../includes/class_producto.php';    
$consultar = new Productos();

if (!empty($_POST['caso'])) {
    $caso = $_POST['caso'];
    
    switch ($caso) {
        case '1':  // Agregar 
            if (
                isset($_POST['nombre'], $_POST['descripcion'], $_POST['precio'], 
                $_POST['cantidad'], $_POST['categoria_id'], $_POST['marca_id'], 
                $_POST['registro']) &&
                !empty($_POST['nombre']) && !empty($_POST['descripcion']) &&
                !empty($_POST['precio']) && !empty($_POST['cantidad']) &&
                !empty($_POST['categoria_id']) && !empty($_POST['marca_id'])
                && !empty($_POST['registro'])
            ) {
                $nombre = $_POST['nombre'];
                $descripcion = $_POST['descripcion'];
                $precio= $_POST['precio'];
                $cantidad = $_POST['cantidad'];
                $categoria = $_POST['categoria_id'];
                $marca = $_POST['marca_id'];
                $imagen = $_POST['imagen_url'];
                $fecha = $_POST['registro'];
               
                
                $resultado = $consultar->agregar_producto($nombre, $descripcion, $precio, $cantidad, $categoria, $marca, $imagen, $fecha);
                    
                if ($resultado) {
                    echo '<script>alert("Producto registrado exitosamente."); window.location.href="../producto_lista.php";</script>';    
                } else {
                    echo '<script>alert("Error al registrar el Producto."); window.location.href="../producto_lista.php";</script>';    
                }
            } else {
                echo '<script>alert("Todos los campos son requeridos."); window.location.href="../producto_lista.php";</script>';
            }
            break;

        case '2':  // Modificar 
            if (
                isset($_POST['nombre'], $_POST['descripcion'], $_POST['precio'], 
                $_POST['cantidad'], $_POST['categoria_id'], $_POST['marca_id']) &&
                !empty($_POST['nombre']) && !empty($_POST['descripcion']) &&
                !empty($_POST['precio']) && !empty($_POST['cantidad']) &&
                !empty($_POST['categoria_id']) && !empty($_POST['marca_id'])
            ) {
                $nombre = $_POST['nombre'];
                $descripcion = $_POST['descripcion'];
                $precio= $_POST['precio'];
                $cantidad = $_POST['cantidad'];
                $categoria = $_POST['categoria_id'];
                $marca = $_POST['marca_id'];
                $imagen = $_POST['imagen_producto'];
          
                $id = $_POST['id'];

                $resultado = $consultar->modificar_producto($id, $nombre, $descripcion, $precio, $cantidad, $categoria, $marca, $imagen);

                if ($resultado) {
                    echo '<script>alert("Producto modificado exitosamente."); window.location.href="../producto_lista.php";</script>';
                } else {
                    echo '<script>alert("Error al modificar el producto."); window.location.href="../producto_lista.php";</script>';
                }
            } else {
                echo '<script>alert("Todos los campos son requeridos."); window.location.href="../producto_lista.php";</script>';
            }
            break;

        case '3':  // Cambiar estado del cliente
            $ID = $_POST['id'];
            $estado = $_POST['estado'];
            $resultado = $consultar->estado_cliente($ID, $estado);

            if ($resultado) {
                echo '<script>alert("Estado cambiado exitosamente."); window.location.href="../cliente_lista.php";</script>';
            } else {
                echo '<script>alert("Error al cambiar el estado."); window.location.href="../cliente_lista.php";</script>';
            }
            break;

        default:
            echo '<script>alert("Caso desconocido."); window.location.href="../cliente_lista.php";</script>';
            break;
    }
} else {
    echo '<script>alert("Se desconoce el caso."); window.location.href="../cliente_lista.php";</script>';
}
?>
