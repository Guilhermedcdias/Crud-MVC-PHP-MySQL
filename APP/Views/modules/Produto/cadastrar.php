<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CADASTRO DE PRODUTO</title>
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
  <section id="cadastrar_produto">
    <div class="caixa">
      <form action="/Produto/cadastrar/save" method="post">
        <!-- Começo dos Inputs e select -->
        <input type="hidden" name="id" value="<?= $model->id_Produto?>">
        <label for="id_Fornecedor">Fornecedor:
          </label>
          <select name="id_Fornecedor" required>
            <?php foreach($forn->rows2 as $item):?> 
              <!-- Percorre fornecedores e coloca cada um em uma value -->
            <option value="<?= $item->id_Fornecedor?>" <?php
             if (($model->id_Fornecedor) == ($item->id_Fornecedor)) {
               echo 'selected';
              //  Verifica se o que veio do banco no caso de alteração é igual ao que veio na lista de fornecedores e se é imprime um selected nele para fica mostrando na caixinha
             }?>><?= $item->nome_fantasia?></option>
            <?php endforeach?>
          </select>
        <label for="nome_produto">Nome do Produto:
          </label>
          <input type="text" placeholder="Insira o Nome do Produto" name="nome_produto" value="<?= $model->nome_produto?>" required>
        <label for="peso">Peso(kg):
          </label>
          <input type="text" placeholder="Insira o peso do Produto" name="peso" value="<?= $model->peso?>" required>
        <label for="quantidade_estoque">Quantidade Estoque:
          </label>
          <input type="text" placeholder="Insira a Quantidade no Estoque" name="quantidade_estoque" value="<?= $model->quantidade_estoque?>" required>

        <div class="bot">
        <button type="submit">Cadastrar</button>
        </div>
      </form>


    </div>
  </section>

</body>
</html>