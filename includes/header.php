<?php

use App\Entity\Usuario;
use App\Session\Login;

//dados do usuário logado
$usuarioLogado = Login::getUsuarioLogado();

//detalhes do usuário
$usuario = $usuarioLogado ? $usuarioLogado['nome'].'<a href="/livraria_bd/cruds/logout.php"  class="text-light font-weight-bold ml-2">Sair</a>':
'Visitante <a href="/livraria_bd/cruds/login.php"  class="text-light font-weight-bold ml-2">Entrar</a>';

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Livraria</title>
  </head>
  <body class="bg-dark text-light">

    <div class="container">

      <div class="jumbotron bg-danger">
        <h1>Livraria</h1>
        <p>Livraria em php com CRUD</p>
            <hr class="border-light">
              <div class="d-flex justify-content-start">
                <?=$usuario?>
              </div>




<div id="menu">
            <ul style="overflow: hidden;
                margin:0px;
                list-style:none;">
                 <li style= "display: inline;"><a href="/livraria_bd/cruds/Compra/index.php" style="text-decoration: none;
                margin-right: 70px;
                text-align: center;
                padding: 18px 10px;
                border-bottom:5px solid #0C88F0;
                font-style: normal;
                font-size: 20px;
                color: white;
                float:right;">Compras</a></li>
                <li style= "display: inline;"><a href="/livraria_bd/cruds/Livro/index.php" style="text-decoration: none;
                margin-right: 70px;
                text-align: center;
                padding: 18px 10px;
                border-bottom:5px solid #0C88F0;
                font-style: normal;
                font-size: 20px;
                color: white;
                float:right;"> Livro </a></li>
                <li style= "display: inline;"><a href="/livraria_bd/cruds/Usuario/index.php" style="text-decoration: none;
                margin-right: 70px;
                text-align: center;
                padding: 18px 10px;
                border-bottom:5px solid #0C88F0;
                font-style: normal;
                font-size: 20px;
                color: white;
                float:right;">Usuario</a></li>
                
                
            </ul>
        </div>
  </div>
