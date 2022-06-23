<?php

require __DIR__.'/../../vendor/autoload.php';

use \App\Entity\Compra;
use \App\Session\Login;
use \App\Db\Pagination;

//obriga o usuário a loggar
Login::requireLogin();
 
$busca = filter_input(INPUT_GET, 'busca', FILTER_SANITIZE_STRING);


//condições 

$condicoes = [
    strlen($busca) ? 'titulo LIKE "%'.str_replace('','%', $busca).'%"' : null
];

//remove posições vazias 
$condicoes= array_filter($condicoes);

//cláusula WHERE
$where = implode(' AND ', $condicoes);




$quantidadeCompras = Compra::getQuantidadeCompras($where);

//PAGINAÇÃO
if(isset($_GET['pagina'])) {
    $pagina = $_GET['pagina']; 
} else {
    $pagina = 1;
} 

$obPagination = new Pagination(
    $quantidadeCompras, 
    $pagina
);




$compras = Compra::getCompras($where, null, $obPagination->getLimit());

include __DIR__.'/../../includes/header.php';
include __DIR__.'/../../includes/Compra/listagem.php';
include __DIR__.'/../../includes/footer.php';
