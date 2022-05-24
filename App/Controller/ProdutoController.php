<?php

//a classe controller é responsável por mostrar o que o usuário quer, mostrando-lhe uma view, por exemplo
class ProdutoController 
{
    //index devolve uma view
    public static function index() 
    {
        include 'View/modules/Produto/ListaProdutos.php';
    }

    //view com o formulário de produto
    public static function form()
    {
        include 'View/modules/Produto/FormProduto.php';
    }

    //salva no bd o arquivo da model
    public static function save() {

        include 'Model/ProdutoModel.php';

        //os novos valores digitados pelo usuário no formulário estão sendo pegos para serem armazenados no bd
        $produto = new ProdutoModel();
        $produto->descricao = $_POST['descricao'];
        $produto->codigo = $_POST['codigo'];
        $produto->estoque = $_POST['estoque'];
        $produto->valor = $_POST['valor'];
        $produto->ativo = $_POST['ativo'];
        $produto->id_fornecedor = $_POST['id_categoria'];

        //chamamento do método ave da model que é responsável por chamar a DAO para salvar no bd
        $produto->save();

        //redireciona o usuário para outra página
        header("Location: /produto");
    }
    
    public static function delete()
    {
        $model = new ProdutoModel();

        $model->delete( (int) $_GET['id'] );

        header("Location: /produto");
    }
}