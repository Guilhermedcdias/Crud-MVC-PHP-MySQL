<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CADASTRO DE FORNECEDOR</title>
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
  <section id="cadastrar_fornecedor">
    <div class="caixa">
      <form action="/Fornecedor/cadastrar/save" method="post">
        <input type="hidden" name="id" value="<?= $model->id_Fornecedor?>">
        <label for="nome">Nome:
          </label>
          <input type="text" placeholder="Insira o Nome" name="nome" value="<?= $model->nome_vendedor?>" required>
        <label for="email">Email:
          </label>
          <input type="email" placeholder="Insira o Email" name="email" value="<?= $model->email_vendedor?>" required>
        <label for="cnpj">CNPJ:
          </label>
          <input type="number" placeholder="Insira o CNPJ -- Somente Números" name="cnpj" value="<?= $model->cnpj?>" required>
        <label for="razao">Razão Social:
          </label>
          <input type="text" placeholder="Insira a Razão Social" name="razao" value="<?= $model->razao_social?>" required>
        <label for="nome_fantasia">Nome Fantasia:
          </label>
          <input type="text" placeholder="Insira o Nome Fantasia" name="nome_fantasia" value="<?= $model->nome_fantasia?>" required>
        <label for="tel">Tel:
          </label>
          <input type="tel" placeholder="Insira o Número de Telefone" name="tel" value="<?= $model->telefone?>" required>
        <label for="cel">Cel:
          </label>
          <input type="tel" placeholder="Insira o Número de Celular" name="cel" value="<?= $model->celular_vendedor?>" required>
        <div class="bot">
        <button type="submit">Cadastrar</button>
        </div>
      </form>


    </div>
  </section>

</body>
</html>