<?php

require __DIR__.'/../../vendor/autoload.php';

define('TITLE','Cadastrar usuario');

use \App\Entity\Usuario;
$obUsuario = new Usuario;
use \App\Session\Login;

//obriga o usuário a loggar
Login::requireLogin();
 
//VALIDAÇÃO DO POST
if(isset($_POST['nome'], $_POST['senha'])){

  $obUsuario->nome    = $_POST['nome'];
  $obUsuario->senha     = $_POST['senha'];

  $obUsuario->cadastrar();

  header('location: index.php?status=success');
  exit;
}

include __DIR__.'/../../includes/header.php';
include __DIR__.'/../../includes/Usuario/formulario.php';
include __DIR__.'/../../includes/footer.php';