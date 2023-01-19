<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>LISTAR DE FORNECEDOR</title>
    <?php include 'style.php';?>
  </head>
  <body>
    <section>
      <!-- Menu -->
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

    <section id="listar_fornecedores">
      <!-- tabela q mostra as informações -->
      <form action="../Fornecedor/delete" method="post">
        <div class="content">
        <table class="rTable">
          <thead>
            <tr>
              <th>  </th>
              <th>Nome</th>
              <th>Nome Fantasia</th>
              <th>Razão Social</th>
              <th>CNPJ</th>
              <th>Email</th>
              <th>Telefone</th>
              <th>Celular</th>
              <th>   </th>
            </tr>
          </thead>
          <tbody>
          <?php foreach($model->rows as $item):?>
            <!-- Percorre as linhas do banco -->
            <tr>
              <td><input type="checkbox" name="deletar[]" id="" value="<?= $item->id_Fornecedor?>"></td>
              <!-- Checkbox para deletes -->
              <td><?= $item->nome_vendedor ?></td>
              <td><?= $item->nome_fantasia ?></td>
              <td><?= $item->razao_social ?></td>
              <td><?= $item->cnpj ?></td>
              <td><?= $item->email_vendedor ?></td>
              <!-- Colocando Informações -->
              <td><?= $item->telefone ?></td>
              <td><?= $item->celular_vendedor ?></td>
              <td><a href="../Fornecedor/cadastrar?id=<?= $item->id_Fornecedor?>" class="editar">Editar</a></td>
              <!-- botão de editar -->
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
            <a href="../Fornecedor?paginas=<?= $atual-1?>">Anterior</a>
            <a href="../Fornecedor?paginas=<?= $atual+1?>">Próxima</a>
            <!-- Paginação -->

          </div>
          
        </div>
      </form>
    </section>
  </body>
</html>
