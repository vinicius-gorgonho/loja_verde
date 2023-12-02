<?php

// Inclua o seu autoload ou qualquer configuração necessária
require_once 'autoload.php';

// Crie uma instância do roteador
$router = new Router();

// Adicione suas rotas aqui
$router->get('/', 'HomeController@index');
$router->get('/usuario', 'UsuarioController@index');
$router->get('/usuario/cadastrar', 'UsuarioController@cadastrar');
$router->post('/usuario/salvar', 'UsuarioController@salvar');

// ... outras rotas ...

// Adicione a nova rota de busca
$router->get('/usuario/buscar', 'UsuarioController@buscar');

// Execute o roteador para lidar com a solicitação atual
$router->dispatch();
