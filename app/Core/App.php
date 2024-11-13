<?php

namespace Rodrigo\MvcPhpPuro\Core;

use Rodrigo\MvcPhpPuro\Routes\Routes;
// use Rodrigo\MvcPhpPuro\Controllers;


class App{
    protected $controller = 'BookController';

    protected $method = 'index';

    protected $params = [];

    //Inicializa o aplicativo
    public function __construct(){
        //Retorna a url separada
        $urlParts = $this->parseUrl();

        //Se a parte da url estiver definida:
        if( isset($urlParts[0] ) ){
            //Pega a parte 1 da url
            $route = $urlParts[0];
        }

        //Se a parte 2 da url também estiver definida:
        if( isset($urlParts[1] ) ){
            //Pega a parte 1 da url e concatena separado por / a parte 2
            $route = $urlParts[0] . '/' . $urlParts[1];
        }

        //Verifica se a rota existe
        if(isset( Routes::ROUTES[$route] )){

            //Determina o nome da controladora a partir da classe Routes que possui o atributo constante ROUTES. acessando no array a propriedade da rota com o seu devido controller
            $this->controller = Routes::ROUTES[$route]['controller'];

            // Determina o método da rota no mesmo sentido do de cima, acessando o método de acordo com a rota
            $this->method = Routes::ROUTES[$route]['method'];


            //Divide os parâmetros da url, fica com o restante da url, ou seja, seus parâmetros
            $this->params = array_slice($urlParts, 2);
        }
        //Se não fazer parte das rotas
        else{
            //Exibe erro 404 de não ter encontrado a rota
            echo '404 - ROUTE NOT FOUND';
            return;
        }

        //Importa o arquivo da controladora de acordo com o nome da controladora, nesse caso será BookController.php
        // $caminhoController = $_SERVER['DOCUMENT_ROOT'] . '/loja-livros/src/Controllers/' . $this->controller . '.php';

        // Acessa o diretório atual, volta um diretório e acessa o controller
        $caminhoController = __DIR__ . '/../Controllers/' . $this->controller . '.php';

        // Para resolver problema de instanciação de classes
        $namespaceController = "Rodrigo\\MvcPhpPuro\\Controllers\\{$this->controller}";

        require_once $caminhoController;

        // Inicia a controladora importada
        $this->controller = new $namespaceController;

        // Chamada dos métodos da Controladora BookController
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    //Divide a URL para o roteamento
    private function parseUrl(){
        //Verifica se 'url' está definida no método get (.htaccess realiza a transformação automaticamente)
        if( isset( $_GET['url'] ) ){

            return explode('/',
            //Remove todas as / da url, depois filtra a url com o parâmetro FILTER_SANITIZE_URL para sanitizar a URL e por último separa tudo em um array através da /
             filter_var( rtrim($_GET['url'], '/' ), FILTER_SANITIZE_URL ) );
        }
        //Retorna vazio se url não for definida no GET
        return [''];
    }
}