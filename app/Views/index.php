<?php
    use Sgv\App\Config\Config;
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
</head>

<body>
    <header>
        <h1>Bem-vindo ao site de gerenciamento de Veículos</h1>
        <p>Selecione a funcionalidade requisitada: </p>
    </header>

    <nav class="nav-selec">
        <a href="<?=Config::BASE_URL?>veiculos" class="nav-link">
            Ver veiculos
        </a>

        <a href="<?=Config::BASE_URL?>veiculo/cadastrar">
            Cadastrar novo Veiculo
        </a>
    </nav>
</body>

</html>