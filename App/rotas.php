<?php

include 'Controller/PessoaController.php';
include 'Controller/ProdutoController.php';
include 'Controller/CategoriaController.php';

// Para saber mais sobre a função parse_url: https://www.php.net/manual/pt_BR/function.parse-url.php
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Para saber mais estrutura switch, leia: https://www.php.net/manual/pt_BR/control-structures.switch.php
    switch($url)
    {
        case '/':
            echo "página inicial";
        break;
        
        default:
            echo "Erro 404";
        break;
        
    //pessoa
        case '/pessoa':
            PessoaController::index();
        break;
    
        case '/pessoa/form':
            PessoaController::form();
        break;
    
        case '/pessoa/form/save':
            PessoaController::save();
        break;
    
        case '/pessoa/delete':
            PessoaController::delete();
        break;

    //produto
         case '/produto':
            ProdutoController::index();
        break;

        case '/produto/form':
            ProdutoController::form();
        break;
    
        case '/pproduto/form/save':
            ProdutoController::save();
        break;
    
        case '/produto/delete':
            ProdutoController::delete();
        break;

    //categoria
    case '/categoria':
            CategoriaController::index();
        break;

        case '/categoria/form':
            CategoriaController::form();
        break;
    
        case '/categoria/form/save':
            CategoriaController::save();
        break;
    
        case '/categoria/delete':
            CategoriaController::delete();
        break;
    }