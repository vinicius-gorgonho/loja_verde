<?php
$base = __DIR__;
include $base . '\..\layout\menu.php';
//debug_print_backtrace();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
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
</head>

<body>
    <h1>Bem-Vindo</h1>
    <hr />
    <p>Lista de produtos</p>
    <?php
    if (isset($data["msg-valido"])) {
        ?>
        <div class="alert alert-success" role="alert">Sucesso ao autenticar</div>
    <?php } ?>
    <table class="table">
        <thead>
            <th>Nome</th>
            <th>Marca</th>
            <th>Preço</th>
            <th>Imagem</th>
        </thead>
        <tbody>

            <?php
            if (isset($data['produtos']))
                foreach ($data['produtos'] as $produto) { ?>
                    <tr>
                        <td>
                            <?= $produto->getNome() ?>
                        </td>
                        <td>
                            <?= $produto->getMarca() ?>
                        </td>
                        <td>R$:&nbsp;
                            <?= $produto->getPreco() ?>.00
                        </td>
                        <td><img src="<?= $produto->getImagem() ?>" alt="Sem imagem"></td>
                    </tr>
                <?php }
            else { ?>
                <tr>
                    <td colspan="4">Nenhum produto cadastrado</td>
                </tr>
            <?php }
                ?>
        </tbody>
    </table>
</body>

</html>