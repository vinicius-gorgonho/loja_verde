<?php
    $base = __DIR__;
    include $base . '\..\layout\menu.php';
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login de Usuário</title>
    <style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    h2 {
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
         if (isset($data["msg-invalido"])) {
    ?>
        <div class="alert alert-danger" role="alert"> Credenciais inválidas. Tente novamente. </div>
    <?php }elseif(isset($data["msg-logout"])){?>
        <div class="alert alert-danger" role="alert"> Deslogado com sucesso! </div>
    <?php } ?>

    <h2>Login de Usuário</h2>
    
    <form action="/login/autenticar_login" method="POST">
        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required>
        <br>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required>
        <br>

        <input type="submit" value="Entrar">
    </form>
</body>

</html>
