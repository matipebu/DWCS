<?php
namespace controlador;

use modelo\ConductorModel;
use modelo\vo\ConductorVO;

class ConductorController extends Controller
{
    public function altaConductor()
    {
        $mensaje = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $nombre = $_REQUEST['nombre'] ?? '';
            $apellido1 = $_REQUEST['apellido1'] ?? '';
            $apellido2 = $_REQUEST['apellido2'] ?? '';
            $licencia = $_REQUEST['licencia'] ?? '';

            // Pasamos id: null porque es nuevo
            $conductor = new ConductorVO(
                null, 
                $nombre,
                $apellido1,
                $apellido2,
                $licencia
            );

            // Guardamos
            $resultado = ConductorModel::altaConductor($conductor);
            
            // preparamos mensaje para la vista
            $mensaje = $resultado ? "Registrado correctamente" : "Error al registrar";
        }

        // Cargamos la vista "alta_conductor-view.php" pasando el mensaje
        // Recuerda que en la vista recibirás esto en la variable $data
        $this->view->show("alta_conductor", $mensaje);
    }
}