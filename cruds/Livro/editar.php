<?php

require __DIR__.'/../../vendor/autoload.php';

define('TITLE','Editar livro');

use \App\Entity\Livro;
use \App\Session\Login;

//obriga o usuário a loggar
Login::requireLogin();
 
//VALIDAÇÃO DO ID
if(!isset($_GET['id_livro']) or !is_numeric($_GET['id_livro'])){
  header('location: index.php');
  exit;
}

//CONSULTA AO USUARIO
$obLivro = Livro::getLivro($_GET['id_livro']);

//VALIDAÇÃO DO USUARIO
if(!$obLivro instanceof Livro){
  header('location: index.php');
  exit;
}

//VALIDAÇÃO DO POST
if(isset($_POST['titulo'],$_POST['autor'], $_POST['preco'])){

  $obLivro->nome    = $_POST['titulo'];
  $obLivro->telefone     = $_POST['autor'];
  $obLivro->preco        = $_POST['preco'];
  $obLivro->atualizar();

  header('location: index.php');
  exit;
}

include __DIR__.'../../includes/header.php';
include __DIR__.'/../../includes/Usuario/formulario.php';
include __DIR__.'/../../includes/footer.php';