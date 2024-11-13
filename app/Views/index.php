<?php
    use Rodrigo\MvcPhpPuro\Config\Config;
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
        <a href="<?=Config::BASE_URL?>books" class="nav-link">
            Ver livros
        </a>

        <a href="<?=Config::BASE_URL?>book/add">
            Cadastrar novo livro
        </a>
    </nav>
</body>

</html>