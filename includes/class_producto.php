<?php
require_once('conn.php');

class Productos extends conectarDB {

    public function Productos() {
        parent::__construct();
    }

    // Listar clientes desde la vista `vclientes`
    public function listar_productos() {
        $sql = "SELECT * FROM vproductos";
        $sentencia = $this->conn_db->prepare($sql);
        $sentencia->execute();
        $resultados = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        $sentencia->closeCursor();
        $this->conn_db = null;
        return $resultados;
    }

    // Agregar nuevo cliente a la tabla `tclientes`
    public function agregar_producto($nombre, $descripcion, $precio, $cantidad, $categoria, $marca, $imagen, $fecha) {
        $query_save = "INSERT INTO productos (nombre, descripcion, precio, cantidad, categoria_id, marca_id, imagen_url, fecha_creacion) 
                       VALUES (:nombre, :descripcion, :precio, :cantidad, :categoria_id, :marca_id, :imagen_url, :fecha_creacion)";
        $guardar = $this->conn_db->prepare($query_save);
        $guardar->bindParam(':nombre', $nombre);
        $guardar->bindParam(':descripcion', $descripcion);
        $guardar->bindParam(':precio', $precio);
        $guardar->bindParam(':cantidad', $cantidad);
        $guardar->bindParam(':categoria_id', $categoria);
        $guardar->bindParam(':marca_id', $marca);
        $guardar->bindParam(':imagen_url', $imagen);
        $guardar->bindParam(':fecha_creacion', $fecha);
        $guardar->execute();
        $result = $this->conn_db->lastInsertId();
        $guardar->closeCursor();
        return $result;
    }

    // Modificar cliente en la tabla `tclientes`
    public function modificar_producto($id, $nombre, $descripcion, $precio, $cantidad, $categoria, $marca, $imagen) {
        $query_modify = "UPDATE productos 
                        SET nombre = :nombre, descripcion = :descripcion, precio = :precio, 
                            cantidad = :cantidad, categoria_id = :categoria, marca_id = :marca, imagen_url = :imagen  
                        WHERE producto_id = :id";
        $modificar = $this->conn_db->prepare($query_modify);
        $modificar->bindParam(':id', $id);
        $modificar->bindParam(':nombre', $nombre);
        $modificar->bindParam(':descripcion', $descripcion);
        $modificar->bindParam(':precio', $precio);
        $modificar->bindParam(':cantidad', $cantidad);
        $modificar->bindParam(':categoria_id', $categoria);
        $modificar->bindParam(':marca_id', $marca);
        $modificar->bindParam(':imagen_url', $imagen);
        $modificar->bindParam(':fecha_creacion', $fecha);
        $modificar->execute();
        $result = true;
        $modificar->closeCursor();
        return $result;
    }

    // Cambiar el estado de un cliente (activo/inactivo)
    public function estado_cliente($id, $estado) {
        $query_modify = "UPDATE tusuarios SET lEstado = :estado WHERE nUsuarioID = :id";
        $modificar = $this->conn_db->prepare($query_modify);
        $modificar->bindParam(':id', $id);
        $modificar->bindParam(':estado', $estado);
        $modificar->execute();
        $result = true;
        $modificar->closeCursor();
        return $result;
    }
    // includes/class_cliente.php
    public function obtener_estadisticas() {
        $sql_total = "SELECT COUNT(*) as total FROM tusuarios";
        $sql_activos = "SELECT COUNT(*) as activos FROM tusuarios WHERE lEstado = 1";
        $sql_inactivos = "SELECT COUNT(*) as inactivos FROM tusuarios WHERE lEstado = 0";

        $total = $this->conn_db->query($sql_total)->fetch(PDO::FETCH_ASSOC)['total'];
        $activos = $this->conn_db->query($sql_activos)->fetch(PDO::FETCH_ASSOC)['activos'];
        $inactivos = $this->conn_db->query($sql_inactivos)->fetch(PDO::FETCH_ASSOC)['inactivos'];

        return [
            'total' => $total,
            'activos' => $activos,
            'inactivos' => $inactivos
        ];
    }

    // Obtener detalle de un cliente específico

    public function detalle_producto($id) {
        $sql = "SELECT * FROM vista_productos WHERE producto_id = :id";
        $sentencia = $this->conn_db->prepare($sql);
        $sentencia->bindParam(':id', $id);
        $sentencia->execute();
        $resultados = $sentencia->fetch(PDO::FETCH_ASSOC);
        $sentencia->closeCursor();
        return $resultados;
    }
}
?>
