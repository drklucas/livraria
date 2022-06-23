<?php

require __DIR__.'/../../vendor/autoload.php';

use \App\Entity\Usuario;
use \App\Session\Login;

//obriga o usuário a loggar
Login::requireLogin();
 
//VALIDAÇÃO DO ID
if(!isset($_GET['id_user']) or !is_numeric($_GET['id_user'])){
  header('location: index.php');
  exit;
}

//CONSULTA USUARIO
$obUsuario = Usuario::getUsuario($_GET['id_user']);

//VALIDAÇÃO DO USUARIO
if(!$obUsuario instanceof Usuario){
  header('location: index.php');
  exit;
}

//VALIDAÇÃO DO POST
if(isset($_POST['excluir'])){

  $obUsuario->excluir();

  header('location: index.php');
  exit;
}

include __DIR__.'/../../includes/header.php';
include __DIR__.'/../../includes/Usuario/confirmar-exclusao.php';
include __DIR__.'/../../includes/footer.php';