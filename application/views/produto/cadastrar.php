<?php
$base = __DIR__;
include $base .'\..\layout\menu.php';
//debug_print_backtrace();
?>
<form action="/produto/salvar" method="POST" class="form-control">
    <label> Nome Produto </label>
    <input type="text" name="nome_produto" class="form-control" />
    
    <label> Marca </label>
    <input type="text" name="marca" class="form-control" />
   
    <label> Preco </label>
    <input type="text" name="preco" class="form-control" />
    
    <input type="submit" value="Cadastrar" />
</form>