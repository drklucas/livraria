<?php

require __DIR__.'/../../vendor/autoload.php';

use \App\Entity\Livro;
use \App\Session\Login;

//obriga o usuário a loggar
Login::requireLogin();
 
//VALIDAÇÃO DO ID
if(!isset($_GET['id_livro']) or !is_numeric($_GET['id_livro'])){
  header('location: index.php');
  exit;
}

//CONSULTA LIVRO
$obLivro = Livro::getLivro($_GET['id_livro']);

//VALIDAÇÃO DO LIVRO
if(!$obLivro instanceof Livro){
  header('location: index.php');
  exit;
}

//VALIDAÇÃO DO POST
if(isset($_POST['excluir'])){

  $obLivro->excluir();

  header('location: index.php');
  exit;
}

include __DIR__.'/../../includes/header.php';
include __DIR__.'/../../includes/Livro/confirmar-exclusao.php';
include __DIR__.'/../../includes/footer.php';