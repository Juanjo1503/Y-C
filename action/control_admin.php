<?php
require_once '../includes/class_cliente.php';    
$consultar = new cliente();

if (!empty($_POST['caso'])) {
    $caso = $_POST['caso'];
    
    switch ($caso) {
        case '1':  // Agregar cliente
            if (
                isset($_POST['nombre'], $_POST['apellido'], $_POST['documento'], 
                $_POST['celular'], $_POST['registro'], $_POST['correo'], $_POST['contrasena']) &&
                !empty($_POST['nombre']) && !empty($_POST['apellido']) &&
                !empty($_POST['documento']) && !empty($_POST['celular']) &&
                !empty($_POST['registro']) && !empty($_POST['correo']) && 
                !empty($_POST['contrasena'])
            ) {
                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
                $documento = $_POST['documento'];
                $celular = $_POST['celular'];
                $registro = $_POST['registro'];
                $tipo = 1;
                $estado = 1;
                $correo = $_POST['correo'];
                $contrasena = $_POST['contrasena'];

                $resultado = $consultar->agregar_cliente($nombre, $apellido, $documento, $celular, $registro, $tipo, $estado, $correo, $contrasena);
                    
                if ($resultado) {
                    echo '<script>alert("Cliente registrado exitosamente."); window.location.href="../cliente_lista.php";</script>';    
                } else {
                    echo '<script>alert("Error al registrar el cliente."); window.location.href="../cliente_lista.php";</script>';    
                }
            } else {
                echo '<script>alert("Todos los campos son requeridos."); window.location.href="../cliente_lista.php";</script>';
            }
            break;

        case '2':  // Modificar cliente
            if (
                isset($_POST['nombre'], $_POST['apellido'], $_POST['documento'], 
                $_POST['celular'], $_POST['registro'], $_POST['correo'], $_POST['contrasena']) &&
                !empty($_POST['nombre']) && !empty($_POST['apellido']) &&
                !empty($_POST['documento']) && !empty($_POST['celular']) &&
                !empty($_POST['registro']) && !empty($_POST['correo']) && 
                !empty($_POST['contrasena'])
            ) {
                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
                $documento = $_POST['documento'];
                $celular = $_POST['celular'];
                $id = $_POST['id'];
                $tipo = 1;
                $correo = $_POST['correo'];
                $contrasena = $_POST['contrasena'];

                $resultado = $consultar->modificar_cliente($id, $nombre, $apellido, $documento, $celular, $tipo, $correo, $contrasena);

                if ($resultado) {
                    echo '<script>alert("Cliente modificado exitosamente."); window.location.href="../cliente_lista.php";</script>';
                } else {
                    echo '<script>alert("Error al modificar el cliente."); window.location.href="../cliente_lista.php";</script>';
                }
            } else {
                echo '<script>alert("Todos los campos son requeridos."); window.location.href="../cliente_lista.php";</script>';
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
