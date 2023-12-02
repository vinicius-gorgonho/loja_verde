<?php
$base = __DIR__;
include $base . '\..\layout\menu.php';


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Lista de Produtos</title>
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
    }

    .alert-danger {
        background-color: #f8d7da;
        border-color: #f5c6cb;
        color: #721c24;
        text-align: center;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #007bff;
        color: #fff;
    }

    .acao-botao-azul {
        background-color: #007bff;
        color: #fff;
        padding: 5px 10px;
        text-decoration: none;
        display: inline-block;
        border: none;
        cursor: pointer;
        font-weight: bold;
        margin-right: 10px;
        transition: background-color 0.3s;
    }

    .acao-botao-azul:hover {
        background-color: #0056b3;
    }
</style>
<body>
    <h1>Lista de Produtos</h1>
    <?php if (isset($data['msg-deletar'])) { ?>
        <div class="alert alert-danger" role="alert">Produto deletado com sucesso</div>
    <?php } ?>
    <p><a href="/produto/cadastrar" class="acao-botao-azul">Adicionar Produto</a></p>
    <table>
        <thead>
            <th>Código</th>
            <th>Nome</th>
            <th>Marca</th>
            <th>Preço</th>
            <th>Imagem</th>
            <th>Ações</th>
        </thead>
        <tbody>
            <?php foreach ($data['produtos'] as $produto) { ?>
                <tr>
                    <td><?= $produto->getCodigo() ?></td>
                    <td><?= $produto->getNome() ?></td>
                    <td><?= $produto->getMarca() ?></td>
                    <td><?= $produto->getPreco() ?></td>
                    <td><img src="<?= $produto->getImagem() ?>" alt="Sem imagem" style="width: 150px;  height: auto"></td>
                    <td>
                        <a href="/produto/iniciarEditar/<?= $produto->getCodigo() ?>" class="acao-botao-azul">Editar</a>
                        <form action="/produto/deletar" method="POST" style="display: inline;">
                            <input type="hidden" value="<?= $produto->getCodigo() ?>" name="codigo" />
                            <input type="submit" value="Excluir" class="acao-botao-azul" />
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>
