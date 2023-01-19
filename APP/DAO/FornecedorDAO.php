<?php

class FornecedorDAO
{
  private $conexao;
  public function __construct() //contrutor que conecta com o banco de dados
  {
    $dsn = "mysql:host=localhost:3306;dbname=dropshippingproducts"; //endereço do banco e nome da base de dados

    $this->conexao = new PDO($dsn, 'root', ''); //conecta
  }


  public function insert(FornecedorModel $model) //create
  {
    $sql = "INSERT INTO fornecedor (nome_vendedor, email_vendedor, cnpj, razao_social, nome_fantasia, telefone, celular_vendedor) VALUES (?,?,?,?,?,?,?)"; //instrução Mysql
    $stmt = $this->conexao->prepare($sql); //termina de preparar as intruções mysql com as informações que vão ser inseridas
    $stmt->bindValue(1, $model->nome_vendedor); //preenchendo ? a ?
    $stmt->bindValue(2, $model->email_vendedor);
    $stmt->bindValue(3, $model->cnpj);
    $stmt->bindValue(4, $model->razao_social);
    $stmt->bindValue(5, $model->nome_fantasia);
    $stmt->bindValue(6, $model->telefone);
    $stmt->bindValue(7, $model->celular_vendedor);
    $stmt->execute(); //executa comando sql


  }

  public function update(FornecedorModel $model) //update
  {
    $sql = "UPDATE fornecedor SET nome_vendedor = ?, email_vendedor = ?, cnpj = ?, razao_social = ?, nome_fantasia = ?, telefone = ?, celular_vendedor = ? WHERE id_Fornecedor= ?"; //instrução Mysql
    $stmt = $this->conexao->prepare($sql); // começa a prepara-la pra executar
    $stmt->bindValue(1, $model->nome_vendedor); //troca interrogação a interrogação por informação do model
    $stmt->bindValue(2, $model->email_vendedor);
    $stmt->bindValue(3, $model->cnpj);
    $stmt->bindValue(4, $model->razao_social);
    $stmt->bindValue(5, $model->nome_fantasia);
    $stmt->bindValue(6, $model->telefone);
    $stmt->bindValue(7, $model->celular_vendedor);
    $stmt->bindValue(8, $model->id_Fornecedor);
    $stmt->execute();//executa comando
  }

  public function select() // read
  {
    $limite = 15; //logica para fazer paginação --limite de infos por pagina
    $pagina = 1; //pagina atual
    $inicio = ($pagina * $limite) - $limite; //logica que define a proxima pagina

    $sql = "SELECT * FROM fornecedor LIMIT $inicio, $limite"; // comando que pegas as infos de forma limitada pela lógica

    $stmt = $this->conexao->prepare($sql); //prepara a instrução sql
    $stmt->execute(); //executa

    return $stmt->fetchAll(PDO::FETCH_CLASS); // transforma em objeto para ser renderizada depois
  }
  public function selectmaisl($paginas) //read
  {
    $limite = 15; //logica para fazer paginação --limite de infos por pagina
    $inicio = ($paginas * $limite) - $limite; //logica que define a proxima pagina

    $sql = "SELECT * FROM fornecedor LIMIT $inicio, $limite"; // comando que pegas as infos de forma limitada pela lógica

    $stmt = $this->conexao->prepare($sql);//prepara a instrução sql
    $stmt->execute(); //executa o comando 

    $linhasDeRetorno = $stmt->fetchAll(PDO::FETCH_CLASS);// transforma em objeto para ser renderizada depois

    return (!empty($linhasDeRetorno)) ? $linhasDeRetorno : $this->select(); //operador ternario para verificar se o retorno de linhas é vazio, se for ele faz um select normal sem limitação de paginas pois o numero de informações fica em uma pagina
     
  }

  public function selectById(int $id) //read one
  {
    include_once 'Models/FornecedorModel.php'; //inclui model se n foi incluido ainda

    $sql = "SELECT * FROM fornecedor WHERE id_Fornecedor= ?"; //instrução sql

    $stmt = $this->conexao->prepare($sql); //prepara a mesma para ser executada
    $stmt->bindValue(1, $id); // troca interrogação por informação
    $stmt->execute(); //executa

    return $stmt->fetchObject("FornecedorModel"); //retorna informação em forma de objeto do tipo Fornecedor
  }
  public function delete(int $id) //delete
  {
    $sql = "DELETE FROM fornecedor WHERE id_Fornecedor= ?"; //instrução sql

    $stmt = $this->conexao->prepare($sql); //prepara instrução
    $stmt->bindValue(1, $id); //troca ? por informação
    $stmt->execute(); //executa
  }

}