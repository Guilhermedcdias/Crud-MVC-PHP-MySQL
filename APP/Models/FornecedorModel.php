<?php

class FornecedorModel
{
  public $id_Fornecedor, $nome_vendedor, $email_vendedor, $cnpj, $razao_social, $nome_fantasia, $telefone, $celular_vendedor; //variaveis da classe

  public $rows; // guarda infos do banco

  public function save() //salva no banco
  {
    include 'DAO/FornecedorDAO.php'; //chama o crud

    $dao = new FornecedorDAO(); //instacia ele
    if(empty($this->id_Fornecedor)) //se não tem id na info ele faz insert
    {
      $dao->insert($this);//faz insert

    } else {
      $dao->update($this); // se tem ele faz update
    }
  }


  public function getAllRows($paginas) //faz select de todas as linhas
  {
    include 'DAO/FornecedorDAO.php'; // chama Crud

    $dao = new FornecedorDAO(); // instacia crud

    if(empty($paginas)) //se está vazia 
    {

      $this->rows = $dao->select(); //faz select simples
    } else {
      $this->rows = $dao->selectmaisl($paginas); //faz select para proximas paginas
    }
    
  }

  public function getById(int $id) // select por id
  {
    include 'DAO/FornecedorDAO.php'; //include do crud

    $dao = new FornecedorDAO(); //instancia crud

    $obj = $dao->selectById($id); //chama select do crud
    return ($obj) ? $obj : new FornecedorModel(); //retorna se tiver obj o obj, se não um fornecedor novo é criado sem nada
  }

  public function delete(array $deletar) //delete por ai
  {
    include 'DAO/FornecedorDAO.php'; //include do crud

    $dao = new FornecedorDAO(); //instacia o objeto
    // var_dump($deletar);
    // exit;
    foreach($deletar as $id => $numb){ //percorre cada id e exclui individual ou em massa, dependendo da quantidade
      $idforn = (int) $numb; //transforma em int
      $dao->delete($idforn); //chama metodo com o id para ser excluido
    }
  }
}