<?php
use Sgv\App\Config\Config;

session_start();

if(!isset($_SESSION['id_usuario']) || !isset($_SESSION['email'])){
    echo 'Usuário Sem Autorização... ';
    header("Location: " . Config::BASE_URL . '');
}