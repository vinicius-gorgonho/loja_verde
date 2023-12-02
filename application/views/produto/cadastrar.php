<?php
$base = __DIR__;
include $base .'\..\layout\menu.php'; 
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cadastrar.css">
    <title>Cadastrar Produto</title>
</head>
<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    h1 {
        color: #333;
        text-align: center;
    }

    .alert {
        margin: 20px 0;
        padding: 15px;
        border-radius: 4px;
        text-align: center; /* Centraliza o texto */
    }

    .alert-success {
        background-color: #d4edda;
        border-color: #c3e6cb;
        color: #155724;
    }

    form {
        max-width: 500px; /* Ajuste da largura máxima */
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    label {
        display: block;
        margin-bottom: 8px;
        color: #333;
    }

    input {
        width: 100%;
        padding: 8px;
        margin-bottom: 15px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    input[type="submit"] {
        background-color: #007bff;
        color: #fff;
        cursor: pointer;
    }

    .row {
        margin-top: 5px;
    }
</style>

<body>
    <?php if (isset($data["cdpr"])) { ?>
        <div class="alert alert-success" role="alert">Produto Cadastrado com Sucesso</div>
    <?php } ?>
    <form action="/produto/salvar" method="POST" class="form-control">
        <h1>Cadastrar Produto</h1>

        <label>Nome Produto</label>
        <input type="text" name="nome_produto" class="form-control" required />

        <label>Marca</label>
        <input type="text" name="marca" class="form-control" required />

        <label>Preço</label>
        <input type="text" name="preco" class="form-control" required />

        <label>Imagem (Apenas URL da Imagem)</label>
        <input type="text" name="imagem" class="form-control" /><br>

        <div class="row">
            <input type="submit" value="Cadastrar" class="btn btn-info" />
        </div>
    </form>
</body>

</html>
