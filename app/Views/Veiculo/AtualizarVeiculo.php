<?php
    use Sgv\App\Config\Config;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><? $title; ?></title>

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
                <input type="text" id="marca" name="marca" placeholder="<?= $veiculo['marca']?>">
            </div>

            <div class="input-row">
                <label class="subtitle-content" for="modelo">Modelo</label>
                <input type="text" id="modelo" name="modelo" placeholder="<?=$veiculo['modelo']?>">
            </div>
            <div class="input-row">
                <label class="subtitle-content" for="ano">Ano</label>
                <input type="text" id="ano" name="ano" placeholder="<?=$veiculo['ano']?>">
            </div>
            <div class="input-row">
                <label class="subtitle-content" for="cor">Cor</label>
                <input type="text" id="cor" name="cor" placeholder="<?=$veiculo['cor']?>">
            </div>
            <div class="input-row">
                <label class="subtitle-content" for="num_reg">Número do Registro</label>
                <input type="text" id="num_reg" name="num_reg" placeholder="<?=$veiculo['num_reg']?>">
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