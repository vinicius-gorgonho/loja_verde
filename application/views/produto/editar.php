<?php
$base = __DIR__;
include $base .'\..\layout\menu.php'; 
 $produto = $data['produto'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="editar.css">
    <title>Alterar Produto</title>
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

    form {
        max-width: 400px;
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

    .alert {
        margin: 20px 0;
        padding: 15px;
        border-radius: 4px;
        text-align: center;
    }

    .alert-success {
        background-color: #d4edda;
        border-color: #c3e6cb;
        color: #155724;
    }

    img {
        width: 300px;
        height: auto;
    }
</style>

<body>
    <h1>Alterar Produto</h1>
    <?php if(isset($data["msg"])) { ?>
        <div class="alert alert-success" role="alert">Produto alterado com Sucesso</div>
    <?php } ?>

    <form class="form-control" method="POST" action="/produto/atualizar">
        <input type="hidden" value="<?= $produto->getCodigo() ?>" name="codigo" />
        <label class="label">Nome</label>
        <input type="text" value="<?= $produto->getNome() ?>" name="nome" class="form-control" />

        <label class="label">Marca</label>
        <input type="text" value="<?= $produto->getMarca() ?>" name="marca" class="form-control" />

        <label class="label">Preço</label>
        <input type="text" value="<?= $produto->getPreco() ?>" name="preco" class="form-control" />

        <label class="label">Imagem (Apenas URL da Imagem)</label>
        <input type="text" value="<?= $produto->getImagem() ?>" name="imagem" class="form-control" />

        <img src="<?= $produto->getImagem() ?>" alt="Sem imagem" />

        <div class="row" style="margin-top: 5px">
            <input type="submit" value="Alterar" class="btn btn-info" />
        </div>
    </form>
</body>

</html>
