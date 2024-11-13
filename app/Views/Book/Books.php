<?php
//Importando Constantes
use Rodrigo\MvcPhpPuro\Config\Config;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Livros</title>
</head>

<body>
    <main class="main-content">
        <div class="container">
            <h1 class="table-title">Todos os Livros</h1>

            <!-- Tabela exibindo todos os livros -->
            <table style="border: 3px solid #000;">
                <thead>
                    <!-- Cabeçalho da Tabela -->
                    <th>ID</th>
                    <th>ISBN</th>
                    <th>Título Livro</th>
                    <th>Autor</th>
                    <th>Data Adicionado</th>
                    <th colspan=3>Ações</th>

                </thead>

                <!-- Para cada livro em livros, exibe uma linha contendo todas as suas informações -->
                <?php foreach ($data['books'] as $book) : ?>

                <tr>
                    <!-- Dados $data -->
                    <td><?= $book['id'] ?></td>
                    <td><?= $book['isbn'] ?></td>
                    <td><?= $book['title'] ?></td>
                    <td><?= $book['author'] ?></td>
                    <td><?= $book['date_added'] ?></td>

                    <!-- Ações -->
                    <td>
                        <a href="<?= Config::BASE_URL?>book/delete/<?= $book['id'] ?>">Deletar</a>
                    </td>

                    <td>
                        <a href="<?= Config::BASE_URL?>book/update/<?= $book['id'] ?>">Alterar</a>
                    </td>

                    <td>
                        <a href="<?= Config::BASE_URL?>book/id/<?= $book['id']; ?>">Visualizar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>

            <a href="<?= Config::BASE_URL?>book/add">Cadastrar novo livro</a>
        </div>
    </main>
</body>

</html>