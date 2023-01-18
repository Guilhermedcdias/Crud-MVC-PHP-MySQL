<?php

class ProdutoDAO
{
  private $conexao;
  public function __construct()
  {
    $dsn = "mysql:host=localhost:3306;dbname=dropshippingproducts";

    $this->conexao = new PDO($dsn, 'root', '');
  }


  public function insert(ProdutoModel $model)
  {
    $sql = "INSERT INTO produto (id_Fornecedor, nome_produto, peso, quantidade_estoque) VALUES (?,?,?,?)";
    $stmt = $this->conexao->prepare($sql);
    $stmt->bindValue(1, $model->id_Fornecedor);
    $stmt->bindValue(2, $model->nome_produto);
    $stmt->bindValue(3, $model->peso);
    $stmt->bindValue(4, $model->quantidade_estoque);
    $stmt->execute();


  }

  public function update(ProdutoModel $model)
  {
    $sql = "UPDATE produto SET id_Fornecedor = ?, nome_produto = ?, peso = ?, quantidade_estoque = ? WHERE id_Produto = ?";
    $stmt = $this->conexao->prepare($sql);
    $stmt->bindValue(1, $model->id_Fornecedor);
    $stmt->bindValue(2, $model->nome_produto);
    $stmt->bindValue(3, $model->peso);
    $stmt->bindValue(4, $model->quantidade_estoque);
    $stmt->bindValue(5, $model->id_Produto);
    $stmt->execute();
  }

  public function select()
  {
    $limite = 12;
    $pagina = 1;
    $inicio = ($pagina * $limite) - $limite;

    $sql = "SELECT * FROM produto p inner join fornecedor f on f.id_Fornecedor = p.id_Fornecedor LIMIT $inicio, $limite";

    $stmt = $this->conexao->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_CLASS);
  }
  public function selectmaisl($paginas)
  {
    $limite = 12;
    $inicio = ($paginas * $limite) - $limite;

    $sql = "SELECT * FROM produto p inner join fornecedor f on f.id_Fornecedor = p.id_Fornecedor LIMIT $inicio, $limite";

    $stmt = $this->conexao->prepare($sql);
    $stmt->execute();

    $linhasDeRetorno = $stmt->fetchAll(PDO::FETCH_CLASS);

    return (!empty($linhasDeRetorno)) ? $linhasDeRetorno : $this->select();
     
  }

  public function selectById(int $id)
  {
    include_once 'Models/ProdutoModel.php';

    $sql = "SELECT * FROM produto WHERE id_Fornecedor= ?";

    $stmt = $this->conexao->prepare($sql);
    $stmt->bindValue(1, $id);
    $stmt->execute();

    return $stmt->fetchObject("ProdutoModel");
  }
  public function delete(int $id)
  {
    $sql = "DELETE FROM produto WHERE id_Produto= ?";

    $stmt = $this->conexao->prepare($sql);
    $stmt->bindValue(1, $id);
    $stmt->execute();
  }

  public function selectfornecedores()
  {

    $sql = "SELECT * FROM fornecedor";

    $stmt = $this->conexao->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_CLASS);
  }

}