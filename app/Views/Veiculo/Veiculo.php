<?php
use Sgv\App\Config\Config;

require 'auth.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>

    <link rel="stylesheet" href="<?= Config::BASE_URL?>../app/Views/assets/css/root/root-table.css">
    <link rel="stylesheet" href="<?= Config::BASE_URL?>../app/Views/assets/css/main/main-container-table.css">
    <link rel="stylesheet" href="<?= Config::BASE_URL?>../app/Views/assets/css/table/table-container.css">
    <link rel="stylesheet" href="<?= Config::BASE_URL?>../app/Views/assets/css/table/title-content-table.css">
    <link rel="stylesheet" href="<?= Config::BASE_URL?>../app/Views/assets/css/table/button-table.css">
    <link rel="stylesheet" href="<?= Config::BASE_URL?>../app/Views/assets/css/table/table.css">
    <link rel="stylesheet" href="<?= Config::BASE_URL?>../app/Views/assets/css/btn-index.css">
</head>
<body>
<main class="main-content">
    <div class="table-container">
        <div class="title-content">
            <label for="title">Tabela dos Veículos</label>
        </div>
        <table>
            <tr>
                <th>ID</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Ano</th>
                <th>Cor</th>
                <th>Número de Registro</th>
            </tr>

            <tr>
                <td><?= $veiculo['id'] ?></td>
                <td><?= $veiculo['marca'] ?></td>
                <td><?= $veiculo['modelo'] ?></td>
                <td><?= $veiculo['ano'] ?></td>
                <td><?= $veiculo['cor'] ?></td>
                <td><?= $veiculo['num_reg']?></td>
                <td class="btn">
                    <a class="btn-enter" href="<?= Config::BASE_URL ?>veiculo/atualizar/<?= $veiculo['id']; ?>">
                    Editar
                    </a>
                </td>
                <td class="btn">
                    <a class="btn-enter" href="<?= Config::BASE_URL ?>veiculo/deletar/<?= $veiculo['id']; ?>">
                    Deletar
                    </a>
                </td>

                <td class="btn">
                    <a class="btn-enter" href="<?= Config::BASE_URL ?>veiculo/id/<?= $veiculo['id']; ?>">
                    Visualizar
                    </a>
                </td>
            </tr>

        </table>

        <div class="btn-container">
            <a class="button" href="<?= Config::BASE_URL ?>veiculos" style="display:block">
                Ver todos veículos
            </a>
        </div>

    </div>

    <a href="<?= Config::BASE_URL?>" class="button btn-index">Início</a>
</body>
</html>