<?php

namespace App\Controllers;

use App\DAO\MySQL\CodeeasyGerenciadorDeLojas\TokensDAO;
use App\DAO\MySQL\CodeeasyGerenciadorDeLojas\UsuariosDAO;
use App\Models\MySQL\CodeeasyGerenciadorDeLojas\TokenModel;
use DateTime;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Firebase\JWT\JWT;

final class AuthController
{
    public function login(Request $request, Response $response, array $args): Response
    {
        $data = $request->getParsedBody();

        $email = $data['email'];
        $senha = $data['senha'];
        $expire_date = $data['expire_date'];

        $usuarioDAO = new UsuariosDAO();
        $usuario = $usuarioDAO->getUserByEmail($email);

        if(is_null($usuario))
        {
            return $response->withStatus(401);
        }

        if(!password_verify($senha, $usuario->getSenha()))
        {
            return $response->withStatus(401);
        }

        $tokenPayload = [
            'sub' => $usuario->getId(),
            'name' => $usuario->getNome(),
            'email' => $usuario->getEmail(),
            'expired_at' => $expire_date
        ];

        $token = JWT::encode($tokenPayload, getenv('JWT_SECRET_KEY'));
        $refreshTokenPayload = [
            'email' => $usuario->getEmail(),
            'random' => uniqid()
        ];
        $refreshToken = JWT::encode($refreshTokenPayload, getenv('JWT_SECRET_KEY'));

        $tokenModel = new TokenModel();
        $tokenModel->setExpired_at($expire_date)
                   ->setRefresh_token($refreshToken)
                   ->setToken($token)
                   ->setUsuarios_id($usuario->getId());

        $tokenDAO = new TokensDAO();
        $tokenDAO->createToken($tokenModel);

        $response = $response->withJSON([
            "token" => $token,
            "refresh_token" => $refreshToken
        ]);

        return $response;
    }

    public function refreshToken(Request $request, Response $response, array $args) : Response
    {
        $token = $request->getAttribute('jwt');
        echo '<pre>';
        print_r($token);
        echo '<pre>';

        return $response;
    }
}