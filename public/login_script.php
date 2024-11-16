<?php

require '../app/Core/BancoDeDados.php';
require '../app/Config/Config.php';

use Sgv\App\Config\Config;
use Sgv\App\Core\BancoDeDados;

session_start();

$email = $_POST['email'];
$senha = $_POST['senha'];

$namespaceBd = "Sgv\\App\\Core\\BancoDeDados";
$banco_dados = new $namespaceBd;

$banco_dados->consulta('SELECT * FROM usuarios WHERE email = :email');

$banco_dados->vincular(':email', $email);

$banco_dados->executar();


$usuario = $banco_dados->resultado();

if(!$usuario || !password_verify($senha, $usuario['senha'])){
    http_response_code(401);
    die('Nome de usuário ou senha incorretos');
}

$_SESSION['id_usuario'] = $usuario['id_usuario'];
$_SESSION['email'] = $usuario['email'];
header('Location: nav/');


