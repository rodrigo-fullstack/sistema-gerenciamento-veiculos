<?php
    use Sgv\App\Config\Config;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../app/Views/assets/css/main/main-content-login.css">
    <link rel="stylesheet" type="text/css" href="../app/Views/assets/css/login/login-container.css">
    <link rel="stylesheet" type="text/css" href="../app/Views/assets/css/root/root-login.css">
    <link rel="stylesheet" type="text/css" href="../app/Views/assets/css/login/input-row-login.css">
    <link rel="stylesheet" type="text/css" href="../app/Views/assets/css/login/button-login.css">
    <link rel="stylesheet" type="text/css" href="../app/Views/assets/css/login/title-content-login.css">
</head>
<body>
    <main class="main-content">
        <form method="post" class="login-container">
            <div class="title-content">
                <label for="title">Login</label>
            </div>
            <div class="input-row">
                <label class="subtitle-content" for="email">E-mail</label>
                <input type="text" id="email" name="email" placeholder="Digite seu e-mail">
            </div>

            <div class="input-row">
                <label class="subtitle-content" for="senha">Senha</label>
                <input type="text" id="senha" name="senha" placeholder="Digite sua senha">
            </div>

            <div class="btn-container">
                <button class="btn" type="submit">
                    Entrar
                </button>
            </div>
        </form>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        const form = document.querySelector('.login-container');

        axios.defaults.baseURL = 'http://localhost/sistema-gerenciamento-veiculos/public/';

        // Escutando o botão submit do formulário...
        form.addEventListener('submit', async (event) => {
            event.preventDefault();
            
            // Coleta os dados do formulário
            const formData = new FormData(event.target);
            // console.log(formData.get('email'))
            // console.log(formData.get('senha'))
            
            try{
                const {data} = await axios.post('login.php', formData);
                console.log('JSON Web Token: ' + data);

                sessionStorage.setItem('session', data);
                window.location.href = 'nav/';
            }catch(error){
                console.log(error);
                alert(error.response.data);
            }
        })
    </script>
</body>
</html>