<?php

namespace Sgv\App\Core;
use Sgv\App\Config\Config;

//Gerencia a forma com a qual o usuário utiliza a aplicação
class Controladora{

    //Controller será executado do public

    //Carregar modelo do BD
    //Realiza a conexão com o BD através da instância do modelo, no caso Book.php
    /**
     * Resumo de loadModel
     * @param mixed $model (deve ser nesse caso Veiculo)
     * @return object
     */
    protected function carregarModel($model){
        //Realiza a importação
        require_once '../app/Models/' . $model . '.php';
        // Corrigindo problemas de instanciação
        $model = "Sgv\\App\\Models\\{$model}";
        //Instancia o objeto Veiculo
        return new $model;
    }


    //Renderiza a parte visual (view)
    /**
     * Resumo de renderView
     * @param mixed $viewPath (caminho do arquivo da view)
     * @param mixed $data (dados que virão acompanhados da view)
     * @param mixed $title (título opcional)
     * @return void
     */
    protected function renderizarView($viewPath, $data = [], $title = "SGV"){

        //Divide o array em variáveis
        extract($data);

        //Inclui o layout básico
        require_once '..\app\Views\layout.php';
    }
}