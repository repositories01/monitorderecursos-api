<?php

require '../init.php';

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\App;
use App\Controller\HomeController;


// $app = new App;
$configuration = [
    'settings' => [
        'displayErrorDetails' => true,
    ],
];
$c = new \Slim\Container($configuration);
$app = new \Slim\App($c);

$app->get('/', HomeController::class . ':index');
$app->post('/home/cadastro', HomeController::class . ':salvar');
$app->get('/home/editar/{id}', HomeController::class . ':editar');
$app->put('/home/cadastro/{id}', HomeController::class . ':atualizar');
$app->delete('/home/deletar/{id}', HomeController::class . ':deletar');





$app->run();
