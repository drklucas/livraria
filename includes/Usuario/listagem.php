<?php
  $resultados = '';
  foreach($usuarios as $usuario){
    $resultados .= '<tr>
                      <td>'.$usuario->id_user.'</td>
                      <td>'.$usuario->nome.'</td>
                      <td>
                        <a href="editar.php?id_user='.$usuario->id_user.'">
                          <button type="button" class="btn btn-primary">Editar</button>
                        </a>
                        <a href="excluir.php?id_user='.$usuario->id_user.'">
                          <button type="button" class="btn btn-danger">Excluir</button>
                        </a>
                      </td>
                    </tr>';
  }

  $resultados = strlen($resultados) ? $resultados : '<tr>
                                                       <td colspan="6" class="text-center">
                                                              Nenhum usuário encontrado
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

  <form method="get">
      <div class="row my-3">
        <div class="col">
          <label>Buscar usuário</label>
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
            <th>Nome</th> 
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