<?php
$base = __DIR__;
include $base . '\..\layout\menu.php';

?>
<html>

<head>

</head>

<body>
    <h1> Listar Produtos </h1>
    <hr />
    <?php if( isset($data['msg'])){ ?> 
<div class="alert alert-danger" role="alert"> Sucesso </div>
    <?php } ?>
    <p> <a href="/produto/cadastrar"> Adicionar Produto </a> </p>
    <table class="table">
        <thead>
            <th>Código</th>
            <th>Nome</th>
            <th>Marca</th>
            <th>Preço</th>
            <th>Ações</th>
        </thead>
        <tbody>
            <?php foreach ($data['produtos'] as $produto) { ?>
                <tr>
                    <td><?= $produto->getCodigo() ?> </td>
                    <td><?= $produto->getNome() ?> </td>
                    <td><?= $produto->getMarca() ?> </td>
                    <td><?= $produto->getPreco() ?> </td>
                    <td>
<a href="/produto/iniciarEditar/<?= $produto->getCodigo() ?>">
    EDITAR
    </a>
    <span><form action="/produto/deletar" method="post"> 
<input type="hidden" value="<?= $produto->getCodigo() ?>" name="codigo" />
        <input type="submit" value="X" />
     </form> 
    </span>
 </td>
        </tr>
            <?php } ?>
        </tbody>
    </table>



</body>

</html>