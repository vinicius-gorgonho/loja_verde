<?php

    $base = __DIR__;
    include $base . '\..layout\menu.php';


?>

<form action="/produto/salvar" method="POST">
    <label>Nome Produto</label>
        <input type="text" name="nome_produto"/>
    <label>Marca</label>
        <input type="text" name="marca"/>
        <input type="submit" value="cadastrar"/>

</form>