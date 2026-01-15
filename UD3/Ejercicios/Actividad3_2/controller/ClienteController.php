<?php
namespace Ejercicios\Actividad3_2\controller;
use Ejercicios\Actividad3_2\model\ClienteModel;
use Ejercicios\Actividad3_2\model\vo\ClienteVO;
class ClienteController extends Controller
{

    public function listarClientes()
    {
        $clientes = ClienteModel::listarClientes();
        $this->vista->showView("lista_clientes", ['clientes' => $clientes]);
    }
    public function anadirCliente()
    {
        $nombre = $_REQUEST['nombre'] ?? null;
        $apellidos = $_REQUEST['apellidos'] ?? null;
        $telefono = $_REQUEST['telefono'] ?? null;
        $mail = $_REQUEST['mail'] ?? null;

        $cliente = new ClienteVO(
            nombre:$nombre,
            apellidos:$apellidos,
            telefono:$telefono,
            mail:$mail
        );

  
        if(ClienteModel::addCliente($cliente)){
            self::formAddCliente();
        }else{
            $this->vista->showView("page_not_found");

        }
    }

    public function formAddCliente(){
        $this->vista->showView("add_clientes");
    }
}

?>