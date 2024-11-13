<?php

namespace Rodrigo\MvcPhpPuro\Core;

//Gerencia a forma com a qual o usuário utiliza a aplicação
class Controller{

    //Controller será executado do public

    //Carregar modelo do BD
    //Realiza a conexão com o BD através da instância do modelo, no caso Book.php
    /**
     * Resumo de loadModel
     * @param mixed $model (deve ser nesse caso Book)
     * @return object
     */
    protected function loadModel ($model){
        //Realiza a importação
        require_once __DIR__ . '/../Models/' . $model . '.php';

        // Corrigindo problemas de instanciação
        $namespaceModel = "Rodrigo\\MvcPhpPuro\\Models\\{$model}";
        //Instancia o objeto Book
        return new $namespaceModel;
    }

    //Renderiza a parte visual (view)
    /**
     * Resumo de renderView
     * @param mixed $viewPath (caminho do arquivo da view)
     * @param mixed $data (dados que virão acompanhados da view)
     * @param mixed $title (título opcional)
     * @return void
     */
    protected function renderView($viewPath, $data = [], $title = "Book Store"){

        //Divide o array em variáveis
        extract($data);

        //Inclui o layout básico
        require_once '..\src\Views\layout.php';
    }
}