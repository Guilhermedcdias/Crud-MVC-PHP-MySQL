<?php

include 'Controllers/FornecedorControllers.php';
include 'Controllers/ProdutoControllers.php';

// Pega rotas da url
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Switch que redireciona para cada rota do controller
switch($url){
  case '/':
    FornecedorController::index();
  break;
  case '/Fornecedor':
    FornecedorController::index();
  break;
  case '/Fornecedor/listar':
    FornecedorController::index();
  break;
  case '/Fornecedor/cadastrar':
    FornecedorController::form();
  break;
  case '/Fornecedor/cadastrar/save':
    FornecedorController::save();
  break;
  case '/Fornecedor/delete':
    FornecedorController::delete();
  break;
  case '/Produto':
    ProdutoController::index();
  break;
  case '/Produto/listar':
    ProdutoController::index();
  break;
  case '/Produto/cadastrar':
    ProdutoController::form();
  break;
  case '/Produto/cadastrar/save':
    ProdutoController::save();
  break;
  case '/Produto/delete':
    ProdutoController::delete();
  break;
  default:
    echo "Error 404 - Page Not Found";
  break;

};