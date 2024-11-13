<?php
use Rodrigo\MvcPhpPuro\Config\Config;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Livro</title>
</head>

<body>
    <main class="main-content">
        <div class="container">
            <h1 class="book-title">Adicionar Livro</h1>

            <!-- Formulário para Inserção dos Dados -->
            <form action="" class="form-book" method="POST">
                <fieldset class="input-row">
                    <label for="isbn" class="caption">ISBN Num: </label>
                    <input type="text" name="isbn" id="isbn">
                </fieldset>

                <fieldset class="input-row">
                    <label for="title" class="caption">Título do Livro: </label>
                    <input type="text" name="title" id="title">
                </fieldset>

                <fieldset class="input-row">
                    <label for="author" class="caption">Autor do Livro: </label>
                    <input type="text" name="author" id="author">
                </fieldset>

                <button type="submit">Adicionar Livro</button>

                <a href="<?= Config::BASE_URL?>books">Ver todos os livros</a>
            </form>
        </div>
    </main>
</body>

</html>