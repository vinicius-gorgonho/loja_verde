<?php
$base = __DIR__;
include $base . '\..\layout\menu.php';
?>

<!DOCTYPE html>
<html lang="en">
    <link rel="stylesheet" href="index.css">
<title>Lista de Usuários</title>
<head>
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

<form action="/usuario/buscar" method="GET" style="margin-bottom: 20px;">
    <label for="search">Buscar Usuário:</label>
    <input type="text" id="search" name="search" placeholder="Digite o nome do usuário">
    <input type="submit" value="Buscar" class="acao-botao-azul">
</form>


    <h1>Lista de Usuários</h1>
    <?php if (isset($data['msg'])) { ?>
        <div class="alert alert-danger" role="alert">Usuário removido com Sucesso</div>
    <?php } ?>
    <p><a href="/usuario/cadastrar" class="acao-botao-azul">Adicionar Usuário</a></p>
    <table>
        <thead>
            <th>Código</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>E-mail</th>
            <th>Ações</th>
        </thead>
        <tbody>
            <?php foreach ($data['usuarios'] as $usuario) { ?>
                <tr>
                    <td><?= $usuario->getCodigo() ?></td>
                    <td><?= $usuario->getNome() ?></td>
                    <td><?= $usuario->getCpf() ?></td>
                    <td><?= $usuario->getEmail() ?></td>
                    <td>
                        <a href="/usuario/iniciarEditar/<?= $usuario->getCodigo() ?>" class="acao-botao-azul">Editar Usuário</a>
                        <form action="/usuario/deletar" method="post" style="display: inline;">
                            <input type="hidden" value="<?= $usuario->getCodigo() ?>" name="codigo" />
                            <input type="submit" value="Excluir Usuário" class="acao-botao-azul" />
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>
