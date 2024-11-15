
<?php 
    use Sgv\App\Config\Config;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?= $title; ?> </title>

    <!-- Seria possível criar uma requisição HTTP com uma rota para os estilos? -->
    <link rel="stylesheet" href="<?= Config::BASE_URL?>../app/Views/assets/css/root/root-form.css">
    <link rel="stylesheet" href="<?= Config::BASE_URL?>../app/Views/assets/css/main/main-content-form.css">
    <link rel="stylesheet" href="<?= Config::BASE_URL?>../app/Views/assets/css/form/form-container.css">
    <link rel="stylesheet" href="<?= Config::BASE_URL?>../app/Views/assets/css/form/input-row.css">
    <link rel="stylesheet" href="<?= Config::BASE_URL?>../app/Views/assets/css/form/title-content.css">
    <link rel="stylesheet" href="<?= Config::BASE_URL?>../app/Views/assets/css/form/button-form.css">
    <link rel="stylesheet" href="<?= Config::BASE_URL?>../app/Views/assets/css/btn-index.css">
</head>
<body>
    <main class="main-content">
        <form method="POST" class="form-container">
            <div class="title-content">
                <label for="title">Cadastre seu veículo</label>
            </div>
            <div class="input-row">
                <label class="subtitle-content" for="marca">Marca</label>
                <input type="text" id="marca" name="marca" placeholder="Digite a marca do veículo">
            </div>

            <div class="input-row">
                <label class="subtitle-content" for="modelo">Modelo</label>
                <input type="text" id="modelo" name="modelo" placeholder="Digite o modelo do veículo">
            </div>
            <div class="input-row">
                <label class="subtitle-content" for="ano">Ano</label>
                <input type="text" id="ano" name="ano" placeholder="Digite o ano do veículo">
            </div>
            <div class="input-row">
                <label class="subtitle-content" for="cor">Cor</label>
                <input type="text" id="cor" name="cor" placeholder="Digite a cor do veículo">
            </div>
            <div class="input-row">
                <label class="subtitle-content" for="num_reg">Número do Registro</label>
                <input type="text" id="num_reg" name="num_reg" placeholder="Digite o número de registro do veículo">
            </div>

            <div class="btn-container">
                <button class="btn" type="submit">
                    Enviar
                </button>
            </div>
        </form>
    </main>
    <a class="btn-index" href="<?= Config::BASE_URL?>">Início</a>
</body>
</html>
