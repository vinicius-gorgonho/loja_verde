<?php

namespace Application\utils\getMenus;

function getMenus()
{
    if (isset($_SESSION['logado']) && $_SESSION['logado']) {
        return [
            'Produtos' => '/produto/',
            'Usuarios' => '/usuario/',
            'Buscar Usuário' => '/usuario/buscar',
            'Início' => '/home/index',
            'Logout' => '/login/logout'
        ];
    } else {
        return [
            'Crie a sua conta' => '/usuario/cadastrar',
            'Login' => 'login/'
        ];
    }
}
?>