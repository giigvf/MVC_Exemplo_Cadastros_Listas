<?php

    class ProdutoModel
    {
        public $id, $descricao, $codigo, $estoque, $ativo, $valor, $id_categoria;
    
        public $rows;
    
        public function save()
        {
            $dao = new ProdutoDAO(); 
    
            if(empty($this->id))
            {
                $dao->insert($this);
    
            } else {
    
                $dao->update($this); 
            }        
        }


    public function getAllRows()
    {      
        $dao = new ProdutoDAO();

        $this->rows = $dao->select();
    }

    public function getById(int $id)
    {
        $dao = new ProdutoDAO();

        $obj = $dao->selectById($id); 
        return ($obj) ? $obj : new ProdutoModel();

    }

    public function delete(int $id)
    {
        $dao = new ProdutoDAO();

        $dao->delete($id);
    }
}