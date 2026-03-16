<?php
//inicializa la session
session_start();

//Llama el FrontController
require_once "app/controllers/FrontController.php";

//Intancia la clase FrontController
$frontcontroller = new FrontController();
?>