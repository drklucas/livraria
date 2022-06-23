<?php
  $resultados = '';
  foreach($compras as $compra){
    $resultados .= '<tr>
                      <td>'.$compra->id_compra.'</td>
                      <td>'.$compra->titulo.'</td>
                      <td>'.$compra->nome.'</td>
                      <td>'.$compra->quantidade.'</td>
                      <td>'.$compra->preco_total.'</td>
                    </tr>';
  }

  $resultados = strlen($resultados) ? $resultados : '<tr>
                                                       <td colspan="6" class="text-center">
                                                              Nenhuma compra encontrada
                                                       </td>
                                                    </tr>';


//PAGINAÇÃO
$paginacao = '';
$paginas = $obPagination->getPages();
foreach($paginas as $key=>$pagina){
  $paginacao .= '<a href="?pagina='.$pagina['pagina'].'">
                      <button type="button" class="btn btn-light">'.$pagina['pagina'].'</button>
                </a>';
}
?>

<main>
  

  <section>

    <table class="table bg-light mt-3">
        <thead>
          <tr>
            <th>ID da compra</th>
            <th>Nome do livro</th>
            <th>Nome do usuário</th>
            <th>Quantidade</th>
            <th>Preço total</th>
          </tr>
        </thead>
        <tbody>
            <?=$resultados?>
        </tbody>
    </table>

  </section>
  <section>
    <?=$paginacao?>
  </section>

</main>