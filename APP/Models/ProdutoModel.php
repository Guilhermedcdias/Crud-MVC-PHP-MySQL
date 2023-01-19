<?php

class ProdutoModel
{
  public $id_Produto, $id_Fornecedor, $nome_produto, $peso, $quantidade_estoque; //variaveis da classe

  public $rows; // linha que guarda infos do banco

  public $rows2; //guarda infos de outra tabela do banco

  public function save() //insert or update
  {
    include_once 'DAO/ProdutoDAO.php';

    $dao = new ProdutoDAO();
    if(empty($this->id_Produto)) //se id ta vazio insert se não
    {
      $dao->insert($this);

    } else {
      $dao->update($this); //update
    }
  }


  public function getAllRows($paginas) //pega infos do banco
  {
    include_once 'DAO/ProdutoDAO.php';

    $dao = new ProdutoDAO(); //instancia classe

    if(empty($paginas)) //se n tem pagina ainda
    {

      $this->rows = $dao->select(); //chama pagina 1
    } else {
      $this->rows = $dao->selectmaisl($paginas); //se tem chama as posteriores
    }
    
  }

  public function getAllForn() //pega fornecedores
  {
    include_once 'DAO/ProdutoDAO.php';

    $dao = new ProdutoDAO(); //instancia objeto

    $this->rows2 = $dao->selectfornecedores(); //guarda fornecedores na variavel

    // var_dump($this->rows2);
  }

  public function getById(int $id) //pega pelo id
  {
    include_once 'DAO/ProdutoDAO.php';

    $dao = new ProdutoDAO(); //instancia classe em obj

    $obj = $dao->selectById($id); //faz o select especifico
    return ($obj) ? $obj : new ProdutoModel(); // se encontra o objeto, retorna, se não, cria um novo;
  }

  public function delete(array $deletar) //delete por id
  {
    include_once 'DAO/ProdutoDAO.php';

    $dao = new ProdutoDAO();
    foreach($deletar as $id => $numb){ //percorre cada id
      $idforn = (int) $numb; //transforma em numero inteiro
      $dao->delete($idforn); // faz o delete um por um
    }
  }
}