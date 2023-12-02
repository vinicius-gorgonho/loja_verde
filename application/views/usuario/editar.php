<?php
$base = __DIR__;
include $base . '\..\layout\menu.php';
$usuario = $data['usuario'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="editar.css">
    <title>Alterar Usuário</title>
</head>

<body>
    <h1>Alterar Usuário</h1>
    <a href="/usuario/" class="btn btn-info">Voltar</a>
    <?php 
        if(isset($data["msg-editarUsuario"])){
    ?>
    <div class="alert alert-success" role="alert">Usuário editado com sucesso</div>
    <?php } ?>

    <form class="form-control" method="POST" action="/usuario/atualizar">
        <input type="hidden" value="<?= $usuario->getCodigo() ?>" name="codigo" />
        <label class="label">Nome</label>
        <input type="text" value="<?= $usuario->getNome() ?>" name="nome" class="form-control" />

        <label class="label">CPF</label>
        <input type="text" value="<?= $usuario->getCPF() ?>" name="cpf" class="form-control" />

        <label class="label">E-mail</label>
        <input type="email" value="<?= $usuario->getEmail() ?>" name="email" class="form-control" />

        <label class="label">Senha</label>
        <input type="password" value="<?= $usuario->getSenha() ?>" name="senha" class="form-control" />

        <div class="row" style="margin-top: 5px">
            <input type="submit" value="Alterar" class="btn btn-info" />
        </div>
    </form>
</body>

</html>

