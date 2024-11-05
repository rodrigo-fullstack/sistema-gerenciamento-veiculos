<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <main class="main-content">
        <form action="script_cadastro.php" method="post">
            <div class="input-row">
                <label for="marca">Marca</label>
                <input type="text" id="marca" name="marca">
            </div>

            <div class="input-row">
                <label for="modelo">Modelo</label>
                <input type="text" id="modelo" name="modelo">
            </div>
            <div class="input-row">
                <label for="ano">Ano</label>
                <input type="text" id="ano" name="ano">
            </div>
            <div class="input-row">
                <label for="cor">Cor</label>
                <input type="text" id="cor" name="cor">
            </div>
            <div class="input-row">
                <label for="num_registro">Numero do Registro</label>
                <input type="text" id="num_registro" name="num_registro">
            </div>

            <div class="btn-container">
                <button class="btn" type="submit">
                    Enviar
                </button>
            </div>
        </form>
    </main>
</body>
</html>