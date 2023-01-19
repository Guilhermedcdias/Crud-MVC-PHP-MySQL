<?php

class ProdutoDAO
{
  private $conexao; //armazena dados da conexão
  public function __construct() // construtor para, função de fazer a conexão com o bd
  {
    $dsn = "mysql:host=localhost:3306;dbname=dropshippingproducts"; //endereço do banco de dados e nome da base

    $this->conexao = new PDO($dsn, 'root', ''); //faz a conexão com o banco e armazena
  }


  public function insert(ProdutoModel $model) //create
  {
    $sql = "INSERT INTO produto (id_Fornecedor, nome_produto, peso, quantidade_estoque) VALUES (?,?,?,?)"; //instrução mysql
    $stmt = $this->conexao->prepare($sql); //prepara a instrução e conecta com o bd
    $stmt->bindValue(1, $model->id_Fornecedor); //troca interrogação por informação
    $stmt->bindValue(2, $model->nome_produto);
    $stmt->bindValue(3, $model->peso);
    $stmt->bindValue(4, $model->quantidade_estoque);
    $stmt->execute(); //executa o comando


  }

  public function update(ProdutoModel $model) //update
  {
    $sql = "UPDATE produto SET id_Fornecedor = ?, nome_produto = ?, peso = ?, quantidade_estoque = ? WHERE id_Produto = ?"; //instrução sql
    $stmt = $this->conexao->prepare($sql); // prepara a instrução
    $stmt->bindValue(1, $model->id_Fornecedor); //troca ? por informação
    $stmt->bindValue(2, $model->nome_produto);
    $stmt->bindValue(3, $model->peso);
    $stmt->bindValue(4, $model->quantidade_estoque);
    $stmt->bindValue(5, $model->id_Produto);
    $stmt->execute(); //executa a instrução mysql
  }

  public function select() //read
  {
    $limite = 12; //limite de infos por pag
    $pagina = 1; //pag atual
    $inicio = ($pagina * $limite) - $limite; //logica para a proxima pagina

    $sql = "SELECT * FROM produto p inner join fornecedor f on f.id_Fornecedor = p.id_Fornecedor LIMIT $inicio, $limite"; //instrução mysql

    $stmt = $this->conexao->prepare($sql);// prepara a instrução mysql
    $stmt->execute(); //executa a instrução

    return $stmt->fetchAll(PDO::FETCH_CLASS); //retorna a informação em forma de objeto para ser utilizada no front
  }
  public function selectmaisl($paginas) // read
  {
    $limite = 12; //limite por pagina
    $inicio = ($paginas * $limite) - $limite; //logica para a proxima pagina

    $sql = "SELECT * FROM produto p inner join fornecedor f on f.id_Fornecedor = p.id_Fornecedor LIMIT $inicio, $limite"; // instrução sql

    $stmt = $this->conexao->prepare($sql); //conecta e prepara o codigo para receber informação
    $stmt->execute(); //executa

    $linhasDeRetorno = $stmt->fetchAll(PDO::FETCH_CLASS); //retorna a informação em forma de objeto em uma variavel

    return (!empty($linhasDeRetorno)) ? $linhasDeRetorno : $this->select(); // operador ternario, se linhas não estão vazias, retorna as linhas, se estão executa o metodo de cima que retorna a primeira pagina da paginação
     
  }

  public function selectById(int $id) // read one
  {
    include_once 'Models/ProdutoModel.php'; //chama model se ainda não foi chamado

    $sql = "SELECT * FROM produto WHERE id_Fornecedor= ?"; //instrução mysql

    $stmt = $this->conexao->prepare($sql); // conecta com o banco e prepara a instrução
    $stmt->bindValue(1, $id);//? por informação
    $stmt->execute(); //executa codigo

    return $stmt->fetchObject("ProdutoModel"); //retorna objeto do tipo produto
  }
  public function delete(int $id) //delete
  {
    $sql = "DELETE FROM produto WHERE id_Produto= ?";//sql

    $stmt = $this->conexao->prepare($sql);//conecta e prepara
    $stmt->bindValue(1, $id); //? por informação
    $stmt->execute();//executa
  }

  public function selectfornecedores()
  {

    $sql = "SELECT * FROM fornecedor";

    $stmt = $this->conexao->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_CLASS);
  }

}