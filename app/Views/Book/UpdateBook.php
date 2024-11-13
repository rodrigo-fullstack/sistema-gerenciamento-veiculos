<?php
    use Rodrigo\MvcPhpPuro\Config\Config;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Livro</title>
</head>

<body>
    <main class="main-content">
        <div class="container">
            <h1 class="update-title">Alterar Livro</h1>

            <h2>ID: <?= $book['id'] ?></h2>

            <form class="form-book" method="POST">
                <fieldset class="input-row">
                    <label for="isbn" class="caption">ISBN Num: </label>
                    <input type="text" name="isbn" id="isbn" placeholder="<?= $book['isbn'] ?>">
                </fieldset>

                <fieldset class=" input-row">
                    <label for="title" class="caption">Título do Livro: </label>
                    <input type="text" name="title" id="title" placeholder="<?= $book['title'] ?>">
                </fieldset>

                <fieldset class="input-row">
                    <label for="author" class="caption">Autor do Livro: </label>
                    <input type="text" name="author" id="author" placeholder="<?= $book['author'] ?>">
                </fieldset>

                <button type="submit">Alterar</button>
            </form>

            <a href="<?= Config::BASE_URL?>books">Ver todos os livros</a>
        </div>
    </main>
</body>

</html>