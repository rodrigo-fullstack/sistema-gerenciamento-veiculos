<?php
use Sgv\App\Config\Config;
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="<?= Config::BASE_URL?>../app/Views/assets/css/main/main-container-table.css">
    <link rel="stylesheet" href="<?= Config::BASE_URL?>../app/Views/assets/css/root/root-table.css">
    <link rel="stylesheet" href="<?= Config::BASE_URL?>../app/Views/assets/css/table/table-container.css">
    <link rel="stylesheet" href="<?= Config::BASE_URL?>../app/Views/assets/css/table/title-content-table.css">
    <link rel="stylesheet" href="<?= Config::BASE_URL?>../app/Views/assets/css/table/button-table.css">
    <link rel="stylesheet" href="<?= Config::BASE_URL?>../app/Views/assets/css/table/table.css">

</head>
<body>

    <main class="main-content">
        <div class="table-container">
            <div class="title-content">
                <label for="title">Tabela dos Carros</label>
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

                <? foreach($data['veiculos'] as $veiculo) : ?>
                    <!-- Criar script depois para verificar quando não tem carro cadastrado -->
                    <tr>
                        <td><?= $veiculo['id'] ?></td>
                        <td><?= $veiculo['marca'] ?></td>
                        <td><?= $veiculo['modelo'] ?></td>
                        <td><?= $veiculo['ano'] ?></td>
                        <td><?= $veiculo['cor'] ?></td>
                        <td><?= $veiculo['num_reg']?></td>
                        <td class="btn">
                            <a class="btn-enter" href="<?= Config::BASE_URL ?>veiculo/alterar">
                            Editar
                            </a>
                        </td>
                        <td class="btn">
                            <a class="btn-enter" href="<?= Config::BASE_URL ?>veiculo/deletar">
                            Deletar
                            </a>
                        </td>
                    </tr>

                <? endforeach; ?>

                <!-- Tags Modelo
                <tr>
                    <td>1</td>
                    <td>Volkswagen</td>
                    <td>Gol</td>
                    <td>2020</td>
                    <td>Preto</td>
                    <td>449875269</td>
                    <td class="btn"><button class="btn-enter" type="submit">
                        Editar
                    </button></td>
                    <td class="btn"><button class="btn-enter" type="submit">
                        Deletar
                    </button></td>
                </tr>
                <tr>
                    <td>Fiat</td>
                    <td>Palio</td>
                    <td>2019</td>
                    <td>Branco</td>
                    <td>916317377</td>
                    <td class="btn"><button class="btn-enter" type="submit">
                        Editar
                    </button></td>
                    <td class="btn"><button class="btn-enter" type="submit">
                        Deletar
                    </button></td>
                </tr>
                <tr>
                    <td>Ford</td>
                    <td>Fiesta</td>
                    <td>2021</td>
                    <td>Vermelho</td>
                    <td>576230823</td>
                    <td class="btn"><button class="btn-enter" type="submit">
                        Editar
                    </button></td>
                    <td class="btn"><button class="btn-enter" type="submit">
                        Deletar
                    </button></td>
                </tr> -->
            </table>

            <div class="btn-container">
                <button class="button" type="submit">
                    Adicionar novo veículo
                </button>
            </div>
        </div>
    </main>

</body>
</html>