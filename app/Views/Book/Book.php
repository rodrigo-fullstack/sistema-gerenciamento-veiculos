<?php
    use Rodrigo\MvcPhpPuro\Config\Config;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livro <?= $book['id'] ?></title>
</head>

<body>

    <main class="main-content">
        <div class="container">
            <h1 class="book-id-title"><?= $book['title'] ?> </h1>

            <ul>
                <li>ID: <?= $book['id'] ?></li>
                <li>ISBN: <?= $book['isbn'] ?></li>
                <li>Título do Livro: <?= $book['title'] ?></li>
                <li>Autor do Livro: <?= $book['author'] ?></li>
                <li>Data Adicionado: <?= $book['date_added'] ?></li>
            </ul>

            <a href="<?= Config::BASE_URL ?>books">Ver todos os livros</a>
        </div>
    </main>

</body>

</html>