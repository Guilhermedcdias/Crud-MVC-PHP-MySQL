<?php

class FornecedorController
{

  // Função que renderiza a pagina de listar os fornecedores
  public static function index()
  {
    include 'Models/FornecedorModel.php'; // Incluindo Model do fornecedor para poder instaciar o objeto
    $model = new FornecedorModel(); //instanciando o objeto
    $model-> getAllRows(isset($_GET['paginas']) ? $_GET['paginas'] : ""); //utilizando função criada dentro da classe para pegar as linhas de dados do banco de dados ja divididas por marcação de pagina.
    
    include 'Views/modules/Fornecedor/listar.php'; // incluindo a view do que renderizará as informações
  }
// função que renderiza a pagina de cadastro de fornecedores e também a de alteração de informações dos mesmos
  public static function form()
  {
    include 'Models/FornecedorModel.php';
    $model = new FornecedorModel();
    if(isset($_GET['id'])) // se tiver id sendo mandado pelo get significa que está sendo alterado o usuario
    {
      $model = $model->getById((int) $_GET['id']); //pega somente o usuario que está sendo alterado para mostrando no front
    }

    include 'Views/modules/Fornecedor/cadastrar.php'; //view que renderiza tudo
  }

  //função que faz a deleção de usuario
  public static function delete()
  {
    include 'Models/FornecedorModel.php'; //include do model
    $model = new FornecedorModel(); //instancia o model
    $model->delete($_POST['deletar']); //chama metodo do model que exclui

    header("Location: /Fornecedor"); // apos excluir redireciona o usuario para a tela de listar os fornecedores

  }
//cria fornecedores no banco de dados
  public static function save()
  {

    include 'Models/FornecedorModel.php'; //inclui classe que vai ser instanciada

    $model = new FornecedorModel(); // instacia o objeto

    $model->id_Fornecedor = $_POST['id']; //preenchendo o objeto com as informações que vão pro banco de dados
    $model->nome_vendedor = $_POST['nome'];
    $model->email_vendedor = $_POST['email'];
    $model->cnpj = $_POST['cnpj'];
    $model->razao_social = $_POST['razao'];
    $model->nome_fantasia = $_POST['nome_fantasia'];
    $model->telefone = $_POST['tel'];
    $model->celular_vendedor = $_POST['cel'];
    $model->save(); // executa função que continua o salvamento

    header("Location: /Fornecedor"); // depois de salvo redireciona para o listar usuarios
  }
}