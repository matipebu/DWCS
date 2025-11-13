<?php
include_once "usuario.php";
include_once "proyecto.php"; 

// Definicion de constantes de la BD
define('DB_DSN', 'mysql:host=mariadb;dbname=empresa');
define('DB_USER', 'root');
define('DB_PASS', 'bitnami');

function conexionDb()
{
    try {
        $db = new PDO(DB_DSN, DB_USER, DB_PASS);
    } catch (PDOException $th) {
        die('Fallo en la conexion con la db' . $th->getMessage());
    }
    return $db;
}

function altaUsuario(Usuario $usuario, int $rol_id)
{
    $nombre = $usuario->getNombre();
    $correo = $usuario->getCorreo();
    $contrasena = sha1($usuario->getContrasena());

    $conexion = conexionDb();
    $resultado = false;

    // Comprobar si ya existe el usuario
    $sql = 'SELECT COUNT(*) AS num_usr FROM usuarios WHERE nombre=? OR correo=?';
    try {
        $query = $conexion->prepare($sql);
        $query->bindValue(1, $nombre, PDO::PARAM_STR);
        $query->bindValue(2, $correo, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch();

        if (isset($result['num_usr']) && $result['num_usr'] > 0) {
            return false;
        }

        // Insertar usuario
        $sqlInsert = 'INSERT INTO usuarios (nombre, correo, contrasena) VALUES (:nombre, :correo, :contrasena)';
        $statement = $conexion->prepare($sqlInsert);
        $statement->bindValue(':nombre', $nombre, PDO::PARAM_STR);
        $statement->bindValue(':correo', $correo, PDO::PARAM_STR);
        $statement->bindValue(':contrasena', $contrasena, PDO::PARAM_STR);

        if ($statement->execute()) {
            $sql = "SELECT MAX(id) AS id FROM usuarios";
            $stm = $conexion->query($sql);
            $row = $stm->fetch();
            $idUsuario = $row['id'];
            $stm->closeCursor();

            $sqlRol = "INSERT INTO usuario_rol (usuario_id, rol_id) VALUES (:usuario_id, :rol_id)";
            $st2 = $conexion->prepare($sqlRol);
            $st2->bindValue(':usuario_id', $idUsuario, PDO::PARAM_INT);
            $st2->bindValue(':rol_id', $rol_id, PDO::PARAM_INT);
            $resultado = $st2->execute();
            $st2->closeCursor();
        }

        $statement->closeCursor();
    } catch (PDOException $ex) {
        error_log($ex->getMessage());
        $resultado = false;
    } finally {
        $conexion = null;
    }

    return $resultado;
}


function comprobar_usuario($correo, $contrasena)
{
    $sql = "SELECT id,nombre,correo,contrasena FROM usuarios WHERE correo = :correo AND contrasena = :contrasena";

    $conexion = conexionDb();

    $query = $conexion->prepare($sql);
    $query->bindValue(':correo', $correo);
    $query->bindValue(':contrasena', sha1($contrasena));

    $query->execute();
    $result = $query->fetch();

    $query = null;
    $conexion = null;
    return $result;
}

function getRolById(int $id)
{
    $sql = 'SELECT r.nombre AS rol FROM usuario_rol ur JOIN roles r ON ur.rol_id = r.id WHERE ur.usuario_id = :id';
    $conexion = conexionDb();
    $query = $conexion->prepare($sql);
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $rol = $query->execute();

    $rol = $query->fetch();
    return $rol['rol'];
}

function obtenerRoles()
{
    $sql = "SELECT id,nombre FROM roles";
    $bd = conexionDb();
    $stm = $bd->query($sql);
    $roles = [];
    foreach ($stm as $row) {
        $roles[] = [
            'id' => $row['id'],
            'nombre' => $row['nombre']
        ];
    }
    return $roles;
}

function getProyectosByRol(Usuario $usuario)
{
    $db = conexionDb();
    $proyectos = [];
    $rol = getRolById($usuario->getId());

    try {
        if ($rol === 'jefe') {
            $sql = "SELECT id, nombre, descripcion, id_responsable FROM proyectos";
            $stm = $db->query($sql);

        } elseif ($rol === 'responsable') {
            $sql = "SELECT id, nombre, descripcion, id_responsable 
                    FROM proyectos 
                    WHERE id_responsable = :id_responsable";
            $stm = $db->prepare($sql);
            $stm->bindValue(':id_responsable', $usuario->getId(), PDO::PARAM_INT);
            $stm->execute();

        } elseif ($rol === 'programador') {
           $sql = "SELECT id, nombre, descripcion, id_responsable FROM proyectos";
            $stm = $db->query($sql);

        } else {
            return [];
        }

        foreach ($stm as $pro) {
            $p = new Proyecto($pro['nombre'], $pro['descripcion'], $pro['id_responsable']);
            $p->setId($pro['id']);
            $proyectos[] = $p;
        }

        $stm->closeCursor();
    } catch (PDOException $e) {
        error_log("Error en getProyectosByRol: " . $e->getMessage());
    } finally {
        $db = null;
    }

    return $proyectos;
}
function getUsuarioById(int $id): Usuario|null
{
    $sql = "SELECT id, nombre,correo,contrasena FROM usuarios WHERE id = :id";
    $db = conexionDb();
    try {
        $query = $db->prepare($sql);
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
        $row = $query->fetch();

        if ($row) {
            return new Usuario($row['nombre'], $row['correo'], $row['contrasena'], $row['id']);
        } else {
            return null;
        }

    } catch (PDOException $th) {
        die($th->getMessage());
    }
}


function addProyecto(Proyecto $pro)
{
    $nombre = $pro->getNombre();
    $descripcion = $pro->getDescripcion();
    $id_responsable = $pro->getIdResponsable();

    $conexion = conexionDb();
    $resultado = false;

    // Insertar Proyecto
    try {
        $sql = 'INSERT INTO proyectos (nombre, descripcion, id_responsable) VALUES (:nombre, :descripcion, :id_responsable)';
        $statement = $conexion->prepare($sql);
        $statement->bindValue(':nombre', $nombre, PDO::PARAM_STR);
        $statement->bindValue(':descripcion', $descripcion, PDO::PARAM_STR);
        $statement->bindValue(':id_responsable', $id_responsable, PDO::PARAM_STR);
        $resultado = $statement->execute();
    } catch (PDOException $th) {
        die('Fallo en la conexion con la db' . $th->getMessage());
    } finally {

        $statement->closeCursor();

        $conexion = null;

    }
    return $resultado;
}

function getResponsables(): array
{
    $db = conexionDb();
    $responsables = [];

    // Consulta para obtener todos los usuarios que tengan rol "responsable"
    $sql = "SELECT u.id, u.nombre, u.correo
            FROM usuarios u
            INNER JOIN usuario_rol ur ON u.id = ur.usuario_id
            INNER JOIN roles r ON ur.rol_id = r.id
            WHERE r.nombre = 'responsable'";

    try {
        $query = $db->query($sql);

        foreach ($query as $res) {
            $responsable = new Usuario($res['nombre'], $res['correo'], $res['contrasena'], $res['id']);
            $responsables[] = $responsable;
        }

        $query->closeCursor();
    } catch (PDOException $th) {
        error_log("Error en getResponsables: " . $th->getMessage());
    } finally {
        $db = null;
    }

    return $responsables;
}

function actualizarResponsableProyecto(int $idProyecto, int $idResponsable): bool
{
    $db = conexionDb();
    $sql = "UPDATE proyectos SET id_responsable = :id_responsable WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':id_responsable', $idResponsable, PDO::PARAM_INT);
    $stmt->bindValue(':id', $idProyecto, PDO::PARAM_INT);
    return $stmt->execute();
}
function getProyectosResponsable(int $id_responsable)
{
    $proyectos = [];
    $sql = "SELECT * FROM proyectos p 
        INNER JOIN usuarios u On u.id=p.id_responsable 
        WHERE p.id_responsable = :id_responsable";
    $db = conexionDb();
    try {
        $query = $db->prepare($sql);
        $query->bindValue(':id_responsable', $id_responsable, PDO::PARAM_INT);
        $query->execute();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $proyecto = new Proyecto($row['nombre'], $row['descripcion'], $row['id_responsable']);
            $proyectos[] = $proyecto;

        }
        $query->closeCursor();
    } catch (PDOException $th) {
        die($th->getMessage());
    } finally {
        $db = null;
    }
    return $proyectos;
}
function getProyectoById(int $id): Proyecto|null
{
    $sql = "SELECT nombre,descripcion,id_responsable
            FROM proyectos 
            WHERE id = :id";
    $db = conexionDb();
    try {
        $query = $db->prepare($sql);
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
        $row = $query->fetch();

        if ($row) {
            return new Proyecto($row['nombre'], $row['descripcion'], $row['id_responsable']);
        } else {
            return null;
        }

    } catch (PDOException $th) {
        die($th->getMessage());
    } finally {
        $db = null;
    }
}
function getProgramadoresProyecto(int $idProyecto): array
{
    $db = conexionDb();
    $programadores = [];

    $sql = "SELECT u.id, u.nombre, u.correo,pp.proyecto_id
            FROM usuarios u
            INNER JOIN usuario_rol ur 
                ON u.id = ur.usuario_id 
                AND ur.rol_id = 2
            LEFT JOIN programador_proyecto pp 
                ON u.id = pp.programador_id 
                AND pp.proyecto_id = :idProyecto";

    try {
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':idProyecto', $idProyecto, PDO::PARAM_INT);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $programadores[] = [
                'id' => (int)$row['id'],
                'nombre' => $row['nombre'],
                'correo' => $row['correo'],
                'asignado' => !is_null($row['proyecto_id'])
            ];
        }

        $stmt->closeCursor();
    } catch (PDOException $e) {
        error_log("Error en getProgramadoresAsignacion: " . $e->getMessage());
    } finally {
        $db = null;
    }

    return $programadores;
}

function actualizarProgramadoresProyecto(int $idProyecto, array $programadoresSeleccionados): bool
{
    $db = conexionDb();
    $resultado = false;

    try {
        $sqlDelete = "DELETE FROM programador_proyecto WHERE proyecto_id = :idProyecto";
        $stmtDelete = $db->prepare($sqlDelete);
        $stmtDelete->bindValue(':idProyecto', $idProyecto, PDO::PARAM_INT);
        $stmtDelete->execute();

        $sqlInsert = "INSERT INTO programador_proyecto (programador_id, proyecto_id) VALUES (:programador_id, :idProyecto)";
        $stmtInsert = $db->prepare($sqlInsert);

        foreach ($programadoresSeleccionados as $idProg) {
            $stmtInsert->bindValue(':programador_id', $idProg, PDO::PARAM_INT);
            $stmtInsert->bindValue(':idProyecto', $idProyecto, PDO::PARAM_INT);
            $stmtInsert->execute();
        }

        $resultado = true;
    } catch (PDOException $e) {
        error_log("Error en actualizarProgramadoresProyecto: " . $e->getMessage());
        $resultado = false;
    } finally {
        $db = null;
    }

    return $resultado;
}