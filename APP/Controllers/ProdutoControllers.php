<?php

class ProdutoController
{
  public static function index()
  {
    include 'Models/ProdutoModel.php';
    $model = new ProdutoModel();
    $model-> getAllRows(isset($_GET['paginas']) ? $_GET['paginas'] : "");
    
    include 'Views/modules/Produto/listar.php';
  }

  public static function form()
  {
    include 'Models/ProdutoModel.php';
    $model = new ProdutoModel();
    if(isset($_GET['id']))
    {
      $model = $model->getById((int) $_GET['id']);
    }

    $forn = new ProdutoModel();
    $forn->getAllForn();

    include 'Views/modules/Produto/cadastrar.php';
  }
  public static function delete()
  {
    include 'Models/ProdutoModel.php';
    $model = new ProdutoModel();
    $model->delete($_POST['deletar']);

    header("Location: /Produto");

  }

  public static function save()
  {

    include 'Models/ProdutoModel.php';

    $model = new ProdutoModel();

    $model->id_Produto = $_POST['id'];
    $model->id_Fornecedor = $_POST['id_Fornecedor'];
    $model->nome_produto = $_POST['nome_produto'];
    $model->peso = $_POST['peso'];
    $model->quantidade_estoque = $_POST['quantidade_estoque'];
    $model->save();

    header("Location: /Produto");
  }
}