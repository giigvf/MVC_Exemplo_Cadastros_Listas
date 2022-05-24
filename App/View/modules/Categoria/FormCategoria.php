<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Categoria</title>
    <style>
        label, input { display: block; }
    </style>
</head>
<body>
    <fieldset>
        <legend>Cadastro de Categoria</legend>

        <form method="post" action="/categoria/form/save">

            <input type="hidden" value="<?= $model->id ?>" name="id" />
            
            <label for="descricao">Descrição:</label>
            <input id="descricao" name="descricao" value="<?= $model->descricao ?>" type="text" />
            
            <button type="submit">Salvar</button>
        </form>
    </fieldset>

    
</body>
</html>