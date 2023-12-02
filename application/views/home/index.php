<?php
$base = __DIR__;
include $base . '\..\layout\menu.php';
//debug_print_backtrace();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listando Produtos</title>
</head>

<body>
    <h1>Bem-Vindo</h1>

    <?php
    if (isset($data["msg-valido"])) {
    ?>
        <div class="alert alert-success" role="alert">Sucesso ao autenticar</div>
    <?php } ?>
    <style>
    .card-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        margin: 20px; /* Adicione margem para dar espaço entre os cards */
    }

    .card {
        width: calc(20% - 10px); /* 33.33% de largura para cada card com 20px de espaço entre eles */
        margin-bottom: 10px;
    }
</style>

<?php
if (isset($data['produtos'])) { ?>
    <div class="card-container">
        <?php foreach ($data['produtos'] as $produto) { ?>
            <div class="card">
                <img class="card-img-top" src="<?= $produto->getImagem() ?>" alt="Imagem produto">
                <div class="card-body">
                    <h5 class="card-title">Nome: <?= $produto->getNome() ?></h5>
                </div>
                <div class="card-body">
                    <p class="card-text">Marca: <?= $produto->getMarca() ?></p>
                    <p class="card-text">Preço: R$ &nbsp; <?= $produto->getPreco() ?>.00</p>
                </div>
            </div>
        <?php } ?>
    </div>
<?php } else { ?>
    <tr>
        <td colspan="4">Nenhum produto cadastrado</td>
    </tr>
<?php } ?>
</body>

</html>