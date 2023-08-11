<?php

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\DAO\MySQL\CodeeasyGerenciadorDeLojas\LojasDAO;
use App\Models\MySQL\CodeeasyGerenciadorDeLojas\LojaModel;

final class LojaController
{
    public function getLojas(Request $request, Response $response, array $args)
    {
        $lojasDAO = new LojasDAO();
        $lojas = $lojasDAO->getAllLojas(); // query do bd
        $response = $response->withJSON($lojas);

        return $response; // retorno a resposta em JSON quando acesso a rota /loja método getLojas
    }

    public function insertLojas(Request $request, Response $response, array $args)
    {
        // PEGANDO DADOS DO REQUEST DO USUARIO
        $data = $request->getParsedBody();

        // INSTANCIANDO OS OBJETOS - MODEL, CONEXAO COM BD E QUERYS.
        $lojasDAO = new LojasDAO();
        $loja = new LojaModel();

        // TRABALHANDO OS DADOS NO MODELO CRIADO (LOJA MODEL)
        // TIPA OS MÉTODOS SETTERS COMO "LojaModel" 
        // NOS MÉTODOS SETTERS "return $this" PARA RETORNAR ELE MESMO
        // E ASSIM CONSEGUIRMOS UTILIZAR UM MÉTODO ATRÁS DO OUTRO
        $loja->setNome($data['nome'])
             ->setTelefone($data['telefone'])
             ->setEndereco($data['endereco']);

        // ENVIANDO OS DADOS DO MODELO PARA O DAO QUE,
        // CONTEM A CONEXÃO COM O BD E O PODER DE FAZER AS QUERYS
        $lojasDAO->insertLojas($loja);

        $response = $response->withJSON([
            'message' => 'Loja inserida com sucesso!'
        ]);

        return $response;
    }

    public function updateLojas(Request $request, Response $response, array $args)
    {
        $response = $response->withJson([
            'message' => 'Hello World!'
        ]);

        return $response;
    }

    public function deleteLojas(Request $request, Response $response, array $args)
    {
        $response = $response->withJson([
            'message' => 'Hello World!'
        ]);

        return $response;
    }
}
