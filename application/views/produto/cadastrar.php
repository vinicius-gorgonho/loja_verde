<?php
$base = __DIR__;
include $base .'\..\layout\menu.php'; 
//debug_print_backtrace();
 ?>
<form action="/produto/salvar" method="POST">
    <label> Nome Produto </label>
    <input type="text" name="nome_produto" />
    <label> Marcar </label>
    <input type="text" name="marca" />
    <input type="submit" value="Cadastrar" />
</form>