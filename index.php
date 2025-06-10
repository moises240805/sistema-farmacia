<?php
//inicializa la session
session_start();
//se almacena la peticion de la url
$controller = isset($_GET['url']) ? $_GET['url'] : '';
//llama al archivo que contiene la rutas
require_once 'config/route.php';

//valida la session
if(!isset($_SESSION['s_usuario']) && $controller != 'autenticator') {
    //si la session no esta iniciada redirige al login
    require_once 'app/controllers/AutenticatorController.php';
    //aqui termina el script
    exit();
}

//valida si el controller tiene una url
if($controller == ''){
    // si el controller esta vacio carga por defecto el login
    require_once 'app/controllers/AutenticatorController.php';
    //termina el script
    exit();
}

//valida si tiene una url
else{

    //valida si existe la url en el arry de url del archivo route.php
    if(isset($rutas[$controller])){
        //construlle la url dinamicamente desde el arry de url del achivo route.php
        require_once $rutas[$controller];
        //termina el script
        exit();
    }
    //en caso contrario de que no este la url carga una pagina de error
    require_once 'app/views/404.php';
    //terina el scrpit
    exit();
}
?>