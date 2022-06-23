<?php

require __DIR__.'/../../vendor/autoload.php';

define('TITLE','Editar usuario');

use \App\Entity\Usuario;
use \App\Session\Login;

//obriga o usuário a loggar
Login::requireLogin();
 
//VALIDAÇÃO DO ID
if(!isset($_GET['id_user']) or !is_numeric($_GET['id_user'])){
  header('location: index.php');
  exit;
}

//CONSULTA AO USUARIO
$obUsuario = Usuario::getUsuario($_GET['id_user']);

//VALIDAÇÃO DO USUARIO
if(!$obUsuario instanceof Usuario){
  header('location: Usuario/index.php');
  exit;
}

//VALIDAÇÃO DO POST
if(isset($_POST['nome'])){

  $obUsuario->nome    = $_POST['nome'];
  $obUsuario->atualizar();

  header('location: index.php');
  exit;
}

include __DIR__.'/../../includes/header.php';
include __DIR__.'/../../includes/Usuario/formulario.php';
include __DIR__.'/../../includes/footer.php';