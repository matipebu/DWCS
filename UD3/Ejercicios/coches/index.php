<?php
require_once "globals.php";

spl_autoload_register(function ($clase) {

    $ruta = $_SERVER['DOCUMENT_ROOT'] . '/' . str_replace('\\', '/', $clase) . '.php';
    if (file_exists($ruta)) {
        require_once $ruta;
    } else {
        error_log("No se encuentra la clase : $ruta");
    }
});

$controller = $_REQUEST['controller'] ?? "ErrorController";
try {
    $controller = "controlador\\$controller";
    $objeto = new $controller();
    $action = $_REQUEST['action'] ?? 'pageNotFound';
} catch (\Throwable $th) {
    $objeto = new controlador\ErrorController();
    $action = "pageNotFound";
}

try {
    $objeto->$action();
} catch (\Throwable $th) {
    die("<h1>ERROR CRÍTICO:</h1><p>" . $th->getMessage() . "</p><pre>" . $th->getTraceAsString() . "</pre>");
    $objeto = new controlador\ErrorController();
    $objeto->pageNotFound();
}