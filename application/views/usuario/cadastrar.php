<?php
$base = __DIR__;
include $base .'\..\layout\menu.php'; 
//debug_print_backtrace();
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cadastrar.css">
    <title>Cadastrar Usuário</title>
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
            text-align: center; /* Adicione esta linha para centralizar o texto */
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
        }

        .alert {
            text-align: center; /* Centraliza o texto */
            margin: 20px 0;
            padding: 15px;
            border-radius: 4px;
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
        }
    </style>
</head>

<body>

<?php 
    if(isset($data["msg-cadastrado"])){
?>
<div class="alert alert-success" role="alert"> Usuário Cadastrado com Sucesso</div>
  <?php } ?>
<form action="/usuario/salvar" method="POST" class="form-control">

        <label>Nome do Usuário:</label>
        <input type="text" name="nome_usuario" class="form-control" required />

        <label>CPF:</label>
        <input type="text" name="cpf" class="form-control" required />

        <label>E-mail:</label>
        <input type="text" name="email" class="form-control" required />

        <label>Senha:</label>
        <input type="password" name="senha" class="form-control" required />

        <input type="submit" value="Cadastrar" class="form-control" />
    </div>
    </form>
</body>

</html>
