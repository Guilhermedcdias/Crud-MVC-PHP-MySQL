<?php

class ProdutoController
{
  public static function index() //usada para renderizar a listar produtos
  {
    include 'Models/ProdutoModel.php'; //incluindo classe dos produtos
    $model = new ProdutoModel(); // instanciando objeto
    $model-> getAllRows(isset($_GET['paginas']) ? $_GET['paginas'] : ""); //faz o select das informações do banco de dados
    
    include 'Views/modules/Produto/listar.php'; // inclui tela a ser renderizada com as informações
  }

  public static function form() // gera a tela de cadastro de produtos
  {
    include 'Models/ProdutoModel.php'; // inclui model dos produtos
    $model = new ProdutoModel(); // instacia o objeto
    if(isset($_GET['id'])) //se vier id não é cadastro mas sim alteração
    {
      $model = $model->getById((int) $_GET['id']); // chama as informações do produto que está sendo alterado
    }

    $forn = new ProdutoModel(); // instacia outro objeto para pegat informações do fornecedor
    $forn->getAllForn(); // chama metodo que faz select de todos os fornecedores para ser exibido no cadastro

    include 'Views/modules/Produto/cadastrar.php'; // include da tela do front que sera renderizada
  }
  public static function delete() // responsavel por fazer delete dos produtos
  {
    include 'Models/ProdutoModel.php'; //chama classe
    $model = new ProdutoModel(); //instancia
    $model->delete($_POST['deletar']); //chama metodo e manda os ids que serão deletados

    header("Location: /Produto"); // depois de deletado redireciona para listagem de produtos

  }

  public static function save() // classe que salva informações no bd
  {

    include 'Models/ProdutoModel.php'; //inclui model

    $model = new ProdutoModel(); //instancia objeto

    $model->id_Produto = $_POST['id']; //preenche objeto
    $model->id_Fornecedor = $_POST['id_Fornecedor'];
    $model->nome_produto = $_POST['nome_produto'];
    $model->peso = $_POST['peso'];
    $model->quantidade_estoque = $_POST['quantidade_estoque'];
    $model->save(); //chama metodo que salva no bd

    header("Location: /Produto"); //redireciona para a listagem de produtos
  }
}