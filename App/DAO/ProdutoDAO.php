<?php
//a DAO executa o SQL junto como bd
class ProdutoDAO
{
    //armazena a conexão com o bd
    private $conexao;
    /*método construtor inicializa os atributos de um objeto (estabelece a conexão com o bd)
    * aceita parãmetros
    */
    function __construct() 
    {
        // DSN (Data Source Name) onde o servidor MySQL será encontrado (?)
        // (host) em qual porta o MySQL está operado e qual o nome do banco pretendido.
        $dsn = "mysql:host=localhost:3307;dbname=db_sistema";
        $user = "root";
        $pass = "etecjau";
        
        $this->conexao = new PDO($dsn, $user, $pass);
    }

    function insert(ProdutoModel $model) 
    {
        //os valores dos campos irão substituir os ?
        $sql = "INSERT INTO produto 
                (descricao, codigo, estoque, ativo, valor, id_categoria) 
                VALUES (?, ?, ?, ?, ?, ?)";

         $stmt = $this->conexao->prepare($sql);
        
        //binvalue recebe e troca os valores das variáveis "?" 
        //e a model pega o campo da tabela que queresmos substituir
        $stmt->bindValue(1, $model->descricao);
        $stmt->bindValue(2, $model->codigo);
        $stmt->bindValue(3, $model->estoque);
        $stmt->bindValue(4, $model->ativo);
        $stmt->bindValue(5, $model->valor);
        $stmt->bindValue(6, $model->id_categoria);
        
        //executa o SQL
        $stmt->execute();      
    }

    
    public function update(PessoaModel $model)
    {
        $sql = "UPDATE produto SET descricao=?, codigo=?, estoque=?, ativo=?, valor=?, id_categoria=? WHERE id=? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->descricao);
        $stmt->bindValue(2, $model->codigo);
        $stmt->bindValue(3, $model->estoque);
        $stmt->bindValue(4, $model->id);
        $stmt->bindValue(5, $model->ativo);
        $stmt->bindValue(6, $model->valor);
        $stmt->bindValue(7, $model->id_categoria);
        $stmt->execute();
    }


    public function select()
    {
        $sql = "SELECT * FROM produto ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);        
    }

    public function selectById(int $id)
    {
        $sql = "SELECT * FROM produto WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject("ProdutoModel"); 
    }

    public function delete(int $id)
    {
        $sql = "DELETE FROM produto WHERE id = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }
}