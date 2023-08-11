<?php

use function src\slimConfiguration;
use function src\basicAuth;
use function src\jwtAuth;

use App\Controllers\{

    ProdutoController,
    LojaController,
    AuthController,
    ExceptionController
};
use App\Middlewares\JwtDateTimeMiddleware;
use Tuupola\Middleware\JwtAuthentication;

$app = new \Slim\App(slimConfiguration());

// ==================================================================

$app->get('/exception_test', ExceptionController::class . ':test');

$app->post('/login', AuthController::class . ':login');
$app->get('/refresh_token', AuthController::class . ':refreshToken');

$app->get('/teste', function() { echo 'Oi!'; });

$app->group('', function () use ($app) {

    // LOJAS
    $app->get('/loja', LojaController::class . ':getLojas');
    $app->post('/loja', LojaController::class . ':insertLojas');
    $app->put('/loja', LojaController::class . ':updateLojas');
    $app->delete('/loja', LojaController::class . ':deleteLojas');

    // PRODUTOS
    $app->get('/produto', ProdutoController::class . ':getProdutos');
    $app->post('/produto', ProdutoController::class . ':insertProdutos');
    $app->put('/produto', ProdutoController::class . ':updateProdutos');
    $app->delete('/produto', ProdutoController::class . ':deleteProdutos');
});

// ==================================================================
$app->run();
