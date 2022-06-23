<main>

  <section>
    <a href="index.php">
      <button class="btn btn-success">Voltar</button>
    </a>
  </section>

  <h2 class="mt-3"><?=TITLE?></h2>

  <form method="post">

    <div class="form-group">
      <label>Título</label>
      <input type="text" class="form-control" name="titulo" value=<?=$obLivro->titulo?>>
    </div>
    <div class="form-group">
      <label>Autor</label>
      <textarea class="form-control" name="autor"><?=$obLivro->autor?></textarea>
    </div>
    <div class="form-group">
      <label>Preço</label>
      <textarea class="form-control" name="preco"><?=$obLivro->preco?></textarea>
    </div>

    <div class="form-group">
      <button type="submit" class="btn btn-success">Enviar</button>
    </div>

  </form>

</main>