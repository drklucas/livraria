<?php

require __DIR__.'/../../vendor/autoload.php';

define('TITLE','Cadastrar livro');

use \App\Entity\Livro;
$obLivro = new Livro;
use \App\Session\Login;

//obriga o usuário a loggar
Login::requireLogin();
 
//VALIDAÇÃO DO POST
if(isset($_POST['titulo'], $_POST['autor'], $_POST['preco'])){

  $obLivro->titulo    = $_POST['titulo'];
  $obLivro->autor     = $_POST['autor'];
  $obLivro->preco     = $_POST['preco'];
  $obLivro->cadastrar();

  header('location: index.php?status=success');
  exit;
}

include __DIR__.'/../../includes/header.php';
include __DIR__.'/../../includes/Livro/formulario.php';
include __DIR__.'/../../includes/footer.php';