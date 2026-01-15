<?php
namespace Ejercicios\Actividad3_2\view;
class View{
    public function showView(string $viewName, ?array $data=null){

        include_once VIEW_PATH."$viewName-view.php";
    }
}

?>