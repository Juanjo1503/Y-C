<?php
require_once('conn.php');

class cliente extends conectarDB {

    public function cliente() {
        parent::__construct();
    }

    // Listar clientes desde la vista `vclientes`
    public function listar_cliente() {
        $sql = "SELECT * FROM vusuarios";
        $sentencia = $this->conn_db->prepare($sql);
        $sentencia->execute();
        $resultados = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        $sentencia->closeCursor();
        $this->conn_db = null;
        return $resultados;
    }

    // Agregar nuevo cliente a la tabla `tclientes`
    public function agregar_cliente($nombre, $apellido, $cc, $cel, $registro, $tipo, $estado, $correo, $contrasena) {
        $query_save = "INSERT INTO tusuarios (uNombre, uApellido, uDocumento, uCelular, dRegistro, lEstado, nTipoID, uCorreo, uContrasena) 
                       VALUES (:nombre, :apellido, :cc, :cel, :registro, :estado, :tipo, :correo, :contrasena)";
        $guardar = $this->conn_db->prepare($query_save);
        $guardar->bindParam(':nombre', $nombre);
        $guardar->bindParam(':apellido', $apellido);
        $guardar->bindParam(':cc', $cc);
        $guardar->bindParam(':cel', $cel);
        $guardar->bindParam(':registro', $registro);
        $guardar->bindParam(':estado', $estado);
        $guardar->bindParam(':tipo', $tipo);
        $guardar->bindParam(':correo', $correo);
        $guardar->bindParam(':contrasena', $contrasena);
        $guardar->execute();
        $result = $this->conn_db->lastInsertId();
        $guardar->closeCursor();
        return $result;
    }

    // Modificar cliente en la tabla `tclientes`
    public function modificar_cliente($id, $nombre, $apellido, $cc, $cel, $tipo, $correo, $contrasena) {
        $query_modify = "UPDATE tusuarios 
                         SET uNombre = :nombre, uApellido = :apellido, uDocumento = :cc, 
                             uCelular = :cel, nTipoID = :tipo, uCorreo = :correo, uContrasena = :contrasena 
                         WHERE nUsuarioID = :id";
        $modificar = $this->conn_db->prepare($query_modify);
        $modificar->bindParam(':id', $id);
        $modificar->bindParam(':nombre', $nombre);
        $modificar->bindParam(':apellido', $apellido);
        $modificar->bindParam(':cc', $cc);
        $modificar->bindParam(':cel', $cel);
        $modificar->bindParam(':tipo', $tipo);
        $modificar->bindParam(':correo', $correo);
        $modificar->bindParam(':contrasena', $contrasena);
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

    public function detalle_cliente($id) {
        $sql = "SELECT * FROM tusuarios WHERE nUsuarioID = :id";
        $sentencia = $this->conn_db->prepare($sql);
        $sentencia->bindParam(':id', $id);
        $sentencia->execute();
        $resultados = $sentencia->fetch(PDO::FETCH_ASSOC);
        $sentencia->closeCursor();
        return $resultados;
    }
}
?>
