<?php
class CategoriaDAO
{
    private $conexao;

    function __contruct()
    {
        $dsn = "mysql:host=localhost:3307;dbname=db_sistema";
        $user = "root";
        $pass = "etecjau";

        $this->conexao = new PDO($dsn. $user, $pass);
    }

    function insert(CategoriaModel $model)
    {
        $sql = "INSERT INTO pessoa
        (descricao)
        VALUES (?)";

        $stmt = $this->conexao->prepare($sql);

        $stmt->binvalue(1, $model->descricao);

        $stmt->execute();
    }
    public function update(CategoriaModel $model)
    {
        $sql = "UPDATE categoria SET descricao=? WHERE id=? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->binValue(1, $model->id);
        $stmt->binValue(2, $model->descricao);

        $stmt->execute();
    }

    public function select()
    {
        $sql = "SELECT * FROM categoria ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);        
    }

    public function selectById(int $id)
    {
        $sql = "SELECT * FROM categoria WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject("CategoriaModel"); 
    }

    public function delete(int $id)
    {
        $sql = "DELETE FROM pessoa WHERE id = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }
}