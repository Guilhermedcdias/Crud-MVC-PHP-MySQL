<?php

class FornecedorDAO
{
  private $conexao;
  public function __construct()
  {
    $dsn = "mysql:host=localhost:3306;dbname=dropshippingproducts";

    $this->conexao = new PDO($dsn, 'root', '');
  }


  public function insert(FornecedorModel $model)
  {
    $sql = "INSERT INTO fornecedor (nome_vendedor, email_vendedor, cnpj, razao_social, nome_fantasia, telefone, celular_vendedor) VALUES (?,?,?,?,?,?,?)";
    $stmt = $this->conexao->prepare($sql);
    $stmt->bindValue(1, $model->nome_vendedor);
    $stmt->bindValue(2, $model->email_vendedor);
    $stmt->bindValue(3, $model->cnpj);
    $stmt->bindValue(4, $model->razao_social);
    $stmt->bindValue(5, $model->nome_fantasia);
    $stmt->bindValue(6, $model->telefone);
    $stmt->bindValue(7, $model->celular_vendedor);
    $stmt->execute();


  }

  public function update(FornecedorModel $model)
  {
    $sql = "UPDATE fornecedor SET nome_vendedor = ?, email_vendedor = ?, cnpj = ?, razao_social = ?, nome_fantasia = ?, telefone = ?, celular_vendedor = ? WHERE id_Fornecedor= ?";
    $stmt = $this->conexao->prepare($sql);
    $stmt->bindValue(1, $model->nome_vendedor);
    $stmt->bindValue(2, $model->email_vendedor);
    $stmt->bindValue(3, $model->cnpj);
    $stmt->bindValue(4, $model->razao_social);
    $stmt->bindValue(5, $model->nome_fantasia);
    $stmt->bindValue(6, $model->telefone);
    $stmt->bindValue(7, $model->celular_vendedor);
    $stmt->bindValue(8, $model->id_Fornecedor);
    $stmt->execute();
  }

  public function select()
  {
    $limite = 15;
    $pagina = 1;
    $inicio = ($pagina * $limite) - $limite;

    $sql = "SELECT * FROM fornecedor LIMIT $inicio, $limite";

    $stmt = $this->conexao->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_CLASS);
  }
  public function selectmaisl($paginas)
  {
    $limite = 15;
    $inicio = ($paginas * $limite) - $limite;

    $sql = "SELECT * FROM fornecedor LIMIT $inicio, $limite";

    $stmt = $this->conexao->prepare($sql);
    $stmt->execute();

    $linhasDeRetorno = $stmt->fetchAll(PDO::FETCH_CLASS);

    return (!empty($linhasDeRetorno)) ? $linhasDeRetorno : $this->select();
     
  }

  public function selectById(int $id)
  {
    include_once 'Models/FornecedorModel.php';

    $sql = "SELECT * FROM fornecedor WHERE id_Fornecedor= ?";

    $stmt = $this->conexao->prepare($sql);
    $stmt->bindValue(1, $id);
    $stmt->execute();

    return $stmt->fetchObject("FornecedorModel");
  }
  public function delete(int $id)
  {
    $sql = "DELETE FROM fornecedor WHERE id_Fornecedor= ?";

    $stmt = $this->conexao->prepare($sql);
    $stmt->bindValue(1, $id);
    $stmt->execute();
  }

}