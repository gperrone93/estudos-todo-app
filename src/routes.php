<?php
use core\Router;

$router = new Router();

$router->get('/', 'TodoController@index');
$router->post('/todo', 'TodoController@create');
$router->get('/todo/excluir/{id}', 'TodoController@excluir');