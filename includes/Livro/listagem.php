<?php
  $resultados = '';
  foreach($livros as $livro){
    $resultados .= '<tr>
                      <td>'.$livro->id_livro.'</td>
                      <td>'.$livro->titulo.'</td>
                      <td>'.$livro->autor.'</td>
                      <td>'.$livro->preco.'</td>
                      <td>
                        <a href="/livraria_bd/cruds/Compra/comprar.php?id_livro='.$livro->id_livro.'">
                      <button type="button" class="btn btn-primary">Comprar</button>
                        </a>
                        <a href="excluir.php?id_livro='.$livro->id_livro.'">
                          <button type="button" class="btn btn-danger">Excluir</button>
                        </a>
                      </td>
                    </tr>';
  }

  $resultados = strlen($resultados) ? $resultados : '<tr>
                                                       <td colspan="6" class="text-center">
                                                              Nenhum livro encontrado
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
    <a href="cadastrar.php">
      <button class="btn btn-success">Novo livro</button>
    </a>
  </section>

  <form method="get">
      <div class="row my-3">
        <div class="col">
          <label>Buscar livro</label>
          <input type="text" name="busca" class="form-control"  value="<?=$busca?>">
        </div >

        <div class="col d-flex align-items-end">
          <button type="submit" class="btn-primary">Filtrar</button>
        </div>

      </div>
  </form>


  <section>

    <table class="table bg-light mt-3">
        <thead>
          <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Autor</th>
            <th>Preço</th>
            <th>Ações</th>
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