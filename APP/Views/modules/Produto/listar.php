<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>LISTAR DE PRODUTO</title>
    <?php include 'style.php';?>
  </head>
  <body>
    <section>
      <ul>
        <li class="dropdown">
          <a href="javascript:void(0)" class="dropbtn">Fornecedor</a>
          <div class="dropdown-content">
            <a href="../Fornecedor/cadastrar">Cadastrar</a>
            <a href="../Fornecedor/listar">Listar</a>
          </div>
        </li>
        <li class="dropdown">
          <a href="javascript:void(0)" class="dropbtn">Produto</a>
          <div class="dropdown-content">
            <a href="../Produto/cadastrar">Cadastrar</a>
            <a href="../Produto/listar">Listar</a>
          </div>
        </li>
      </ul>
    </section>

    <section id="listar_produto">
      <form action="../Produto/delete" method="post">
        <div class="content">
        <table class="rTable">
          <thead>
            <tr>
              <th>  </th>
              <th>Nome Fornecedor</th>
              <th>Nome Produto</th>
              <th>Peso</th>
              <th>Quantidade Estoque</th>
              <th>   </th>
            </tr>
          </thead>
          <tbody>
          <?php foreach($model->rows as $item):?>
            <tr>
              <td><input type="checkbox" name="deletar[]" id="" value="<?= $item->id_Produto?>"></td>
              <td><?= $item->nome_fantasia ?></td>
              <td><?= $item->nome_produto ?></td>
              <td><?= $item->peso ?></td>
              <td><?= $item->quantidade_estoque ?></td>
              <td><a href="../Produto/cadastrar?id=<?= $item->id_Fornecedor?>" class="editar">Editar  </a></td>
            </tr>
            <?php endforeach ?>
          </tbody>
        </table>
        </div>
        <div class="content2">
          <button type="submit" class="deletar">Deletar</button>
          <div class="flex">
          <?php
          (isset($_GET['paginas'])) ? $atual = $_GET['paginas'] : $atual = 1;
           ?>
            <a href="../Produto?paginas=<?= $atual-1?>">Anterior</a>
            <a href="../Produto?paginas=<?= $atual+1?>">Próxima</a>

          </div>
          
        </div>
      </form>
    </section>
  </body>
</html>
