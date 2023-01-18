<?php

class FornecedorModel
{
  public $id_Fornecedor, $nome_vendedor, $email_vendedor, $cnpj, $razao_social, $nome_fantasia, $telefone, $celular_vendedor;

  public $rows;

  public function save()
  {
    include 'DAO/FornecedorDAO.php';

    $dao = new FornecedorDAO();
    if(empty($this->id_Fornecedor))
    {
      $dao->insert($this);

    } else {
      $dao->update($this);
    }
  }


  public function getAllRows($paginas)
  {
    include 'DAO/FornecedorDAO.php';

    $dao = new FornecedorDAO();

    if(empty($paginas))
    {

      $this->rows = $dao->select();
    } else {
      $this->rows = $dao->selectmaisl($paginas);
    }
    
  }

  public function getById(int $id)
  {
    include 'DAO/FornecedorDAO.php';

    $dao = new FornecedorDAO();

    $obj = $dao->selectById($id);
    return ($obj) ? $obj : new FornecedorModel();
  }

  public function delete(array $deletar)
  {
    include 'DAO/FornecedorDAO.php';

    $dao = new FornecedorDAO();
    // var_dump($deletar);
    // exit;
    foreach($deletar as $id => $numb){
      $idforn = (int) $numb;
      $dao->delete($idforn);
    }
  }
}