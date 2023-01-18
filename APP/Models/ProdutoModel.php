<?php

class ProdutoModel
{
  public $id_Produto, $id_Fornecedor, $nome_produto, $peso, $quantidade_estoque;

  public $rows;

  public $rows2;

  public function save()
  {
    include_once 'DAO/ProdutoDAO.php';

    $dao = new ProdutoDAO();
    if(empty($this->id_Produto))
    {
      $dao->insert($this);

    } else {
      $dao->update($this);
    }
  }


  public function getAllRows($paginas)
  {
    include_once 'DAO/ProdutoDAO.php';

    $dao = new ProdutoDAO();

    if(empty($paginas))
    {

      $this->rows = $dao->select();
    } else {
      $this->rows = $dao->selectmaisl($paginas);
    }
    
  }

  public function getAllForn()
  {
    include_once 'DAO/ProdutoDAO.php';

    $dao = new ProdutoDAO();

    $this->rows2 = $dao->selectfornecedores();

    // var_dump($this->rows2);
  }

  public function getById(int $id)
  {
    include_once 'DAO/ProdutoDAO.php';

    $dao = new ProdutoDAO();

    $obj = $dao->selectById($id);
    return ($obj) ? $obj : new ProdutoModel();
  }

  public function delete(array $deletar)
  {
    include_once 'DAO/ProdutoDAO.php';

    $dao = new ProdutoDAO();
    foreach($deletar as $id => $numb){
      $idforn = (int) $numb;
      $dao->delete($idforn);
    }
  }
}