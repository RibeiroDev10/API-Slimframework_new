<?php

namespace App\Controllers;

use App\Exceptions\TestException;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

final class ExceptionController 
{
    public function test(Request $request, Response $response, array $args)
    {
        try {
            // Código...
            throw new TestException("Testando...");
            return $response->withJson([
            'msg' => 'ok'
            ]);
        } 
        catch(TestException $e)
        {
            return $response->withJson([
                'error' => TestException::class,
                'status' => 400,
                'code' => '003',
                'userMessage' => 'Testando apenas...',
                'developerMessage' => $e->getMessage()
            ], 400);
        }
        catch(\Exception | \Throwable $e)
        {
            return $response->withJson([
                'error' => \Exception::class,
                'status' => 500,
                'code' => '001',
                'userMessage' => 'Erro na aplicação, entre em contato com os desenvolvedores do sistema',
                'developerMessage' => $e->getMessage()
            ], 500); 
        }
        
    }
}