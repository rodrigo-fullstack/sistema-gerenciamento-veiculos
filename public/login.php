<?php

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

use Dotenv\Dotenv;

use Sgv\App\Core\BancoDeDados;

require_once('../vendor/autoload.php');

// header('Access-Control-Allow-Origin: *');

function usuarioNaoAutorizado(){
    http_response_code(401);
    die('Email ou senha incorretos...');
}

$dotenv = Dotenv::createImmutable('..\\');
$dotenv->load();

$conexao = new BancoDeDados();

$conexao->consulta('SELECT * FROM usuarios WHERE email = :email');

$email = strip_tags($_POST['email']);
$senha = strip_tags($_POST['senha']);

$conexao->vincular(':email', $email);

$usuario = $conexao->resultado();

if(!$usuario){
    usuarioNaoAutorizado();
}

// print $usuario['email'];
// print $usuario['senha'];

if(!password_verify($senha, $usuario['senha'])){
    usuarioNaoAutorizado();
}

$key = $_ENV['KEY'];
$payload = [
    'exp' => time() + 5,
    'iat' => time(),
    'email' => $email
];

$jwt = JWT::encode($payload, $key, 'HS256');
echo json_encode($jwt);

  