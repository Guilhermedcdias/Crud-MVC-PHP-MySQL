<?php

class FornecedorController
{
  public static function index()
  {
    include 'Models/FornecedorModel.php';
    $model = new FornecedorModel();
    $model-> getAllRows(isset($_GET['paginas']) ? $_GET['paginas'] : "");
    
    include 'Views/modules/Fornecedor/listar.php';
  }

  public static function form()
  {
    include 'Models/FornecedorModel.php';
    $model = new FornecedorModel();
    if(isset($_GET['id']))
    {
      $model = $model->getById((int) $_GET['id']);
    }

    include 'Views/modules/Fornecedor/cadastrar.php';
  }
  public static function delete()
  {
    include 'Models/FornecedorModel.php';
    $model = new FornecedorModel();
    $model->delete($_POST['deletar']);

    header("Location: /Fornecedor");

  }

  public static function save()
  {

    include 'Models/FornecedorModel.php';

    $model = new FornecedorModel();

    $model->id_Fornecedor = $_POST['id'];
    $model->nome_vendedor = $_POST['nome'];
    $model->email_vendedor = $_POST['email'];
    $model->cnpj = $_POST['cnpj'];
    $model->razao_social = $_POST['razao'];
    $model->nome_fantasia = $_POST['nome_fantasia'];
    $model->telefone = $_POST['tel'];
    $model->celular_vendedor = $_POST['cel'];
    $model->save();

    header("Location: /Fornecedor");
  }
}