<?php

require __DIR__.'/../../vendor/autoload.php';

define('TITLE','Realizar compra');

use \App\Entity\Livro;
use \App\Entity\Compra;
$obCompra = new Compra;
use \App\Session\Login;

//obriga o usuário a loggar
Login::requireLogin();
 

//VALIDAÇÃO DO POST 
if(isset($_POST['quantidade'],)){


  $obLivro = Livro::getLivro($_GET['id_livro']);

  $obCompra->quantidade = $_POST['quantidade'];
  $obCompra-> cod_livro = $_GET['id_livro'];
  $obCompra->cod_usuario = $_SESSION['usuario']['id_user'];
  $obCompra->preco_total = $obCompra->quantidade * $obLivro->preco;
  $obCompra->cadastrar();

  header('location: index.php?status=success');
  exit;
}

include __DIR__.'/../../includes/header.php';
include __DIR__.'/../../includes/Compra/formulario.php';
include __DIR__.'/../../includes/footer.php';