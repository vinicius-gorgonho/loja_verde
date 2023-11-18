<?php
$base = __DIR__;
include $base .'\..\layout\menu.php'; 
 $produto = $data['produto'];
?>
<form class="form-control" method="POST" action="/produto/atualizar">
<input type="hidden" value="<?= $produto->getCodigo() ?>"
name="codigo"/>
    <label class="label"> Nome </label>
<input type="text" value="<?= $produto->getNome() ?>"
name="nome" class="form-control"/>
<label class="label"> Marca </label>
<input type="text" value="<?= $produto->getMarca() ?>"
name="marca" class="form-control" />
<label class="label"> Preço </label>
<input type="text" value="<?= $produto->getPreco() ?>"
name="preco" class="form-control" />
<div class="row" style="margin-top: 5px">
<input type="submit" value="Alterar" class="btn btn-info" />
</div>
</form>