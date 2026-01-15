<?php
namespace Ejercicios\Actividad3_2\controller;
use Ejercicios\Actividad3_2\model\ProductoModel;
use Ejercicios\Actividad3_2\model\vo\ProductoVO;
class ProductoController extends Controller
{

    public function listarProductos()
    {
        $productos = ProductoModel::listarProductos();
        $this->vista->showView("lista_productos", ['productos' => $productos]);
    }
    public function anadirProducto()
    {
        $denominacion = $_REQUEST['denominacion'] ?? null;
        $descripcion = $_REQUEST['descripcion'] ?? null;
        $precio = $_REQUEST['precio'] ?? null;
        $cantidad = $_REQUEST['cantidad'] ?? null;

        $producto = new ProductoVO(
            denominacion: $denominacion,
            descripcion: $descripcion,
            precio: $precio,
            cantidad: $cantidad
        );

        if(ProductoModel::addProducto($producto)){
            self::formAddProducto();
        }else{
            $this->vista->showView("page_not_found");

        }
    }

    public function formAddProducto(){
        $this->vista->showView("add_productos");
    }
}

?>