<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produtos</title>
    <style>
        label, input { display: block;}
    </style>
</head>
<body>
    <form action="/produto/save" method="post">
        <fieldset>
            <legend>Cadastro de Produto</legend>
            <label for="descricao">Descrição:</label>
            <input name="descricao" id="descricao" type="text" />

            <label for="codigo">Código:</label>
            <input name="codigo" id="codigo" type="text" />

            <label for="id_categoria">ID_Categoria:</label>
            <input name="id_categoria" id="id_categoria" type="number" />

            <label for="estoque">Estoque:</label>
            <input name="estoque" id="estoque" type="number" />

            <label for="ativo">Ativo:</label>
            <input name="ativo" id="ativo" type="radio" />

            <label for="valor">Valor:</label>
            <input name="valor" id="valor" type="number" />


            <button type="submit">Enviar</button>

        </fieldset>
    </form>    
</body>
</html>