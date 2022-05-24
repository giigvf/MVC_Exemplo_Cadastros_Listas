<?php

class CategoriaController
{
    public static function index()
    {
        include'View/modules/categoria/ListaCategoria.php';
    }

    public static function form()
    {
        include 'View/modules/categoria/FormCategoria.php';
    }

    public static function save()
    {
        include 'Model/CategoriaModel.php';
        $categoria = new CategoriaModel();
        $categoria->id = $_POST['id'];
        $categoria->descricao = $_POST['descricao'];
        $categoria->save();
        header("Location: /categoria");
    }
    
    /**
     * Método para tratar a rota delete. 
     */
    public static function delete()
    {
        $model = new CategoriaModel();

        $model->delete( (int) $_GET['id'] ); // Enviando a variável $_GET como inteiro para o método delete

        header("Location: /categoria"); // redirecionando o usuário para outra rota.
    }
}
