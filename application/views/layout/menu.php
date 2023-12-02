<?php
if (!isset($_SESSION))
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .navbar {
        background-color: #606060;
        padding: 10px;
    }

    .nav-link {
        color: #fff;
        margin-right: 15px;
        text-decoration: none;
    }

    .nav-link:hover {
        color: #aaa;
        /* Cor quando hover (passe o mouse) */
    }

    .active {
        font-weight: bold;
    }

    .justify-content-end {
        justify-content: flex-end;
    }
    </style>
</head>

<body>
    <ul class="navbar nav justify-content-end">

        <?php
        if (isset($_SESSION['usuario'])) {
            $user = $_SESSION['logado'];
            ?>

            <li class="nav-item">
                <a class="nav-link" href="/Produto/">Produtos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/usuario/">Usuarios</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/usuario/buscar">Buscar Usuário</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/home/index">Início</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/login/logout">logout</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page">
                    <?= $user ?>
                </a>
            </li>


            <?php
        } else {
            ?>
            <li class="nav-item">
                <a class="nav-link" href="/usuario/cadastrar">Crie a sua conta</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/login/">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/home/index">Início</a>
            </li>
            <?php
        }
        ?>
    </ul>
</body>

</html>