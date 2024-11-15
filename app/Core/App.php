<?php

namespace Sgv\App\Core;

use Sgv\App\Routes\Rotas;
// use Rodrigo\MvcPhpPuro\Controllers;


class App{
    protected $controladora = 'VeiculoControladora';

    protected $metodoControladora = 'inicio';

    protected $parametrosURL = [];

    //Inicializa o aplicativo
    public function __construct(){
        //Retorna a url separada
        $partesDaUrl = $this->analisarUrl();

        //Se a parte da url estiver definida:
        if( isset($partesDaUrl[0] ) ){
            //Pega a parte 1 da url
            $rota = $partesDaUrl[0];
        }

        //Se a parte 2 da url também estiver definida:
        if( isset($partesDaUrl[1] ) ){
            //Pega a parte 1 da url e concatena separado por / a parte 2
            $rota = $partesDaUrl[0] . '/' . $partesDaUrl[1];
        }

        //Verifica se a rota existe
        if(isset( Rotas::ROTAS[$rota] )){

            //Determina o nome da controladora a partir da classe Routes que possui o atributo constante ROUTES, acessando no array a propriedade da rota com o seu devido controller
            $this->controladora = Rotas::ROTAS[$rota]['controladora'];

            // Determina o método da rota no mesmo sentido do de cima, acessando o método de acordo com a rota
            $this->metodoControladora = Rotas::ROTAS[$rota]['metodo'];


            //Divide os parâmetros da url, fica com o restante da url, ou seja, seus parâmetros
            $this->parametrosURL = array_slice($partesDaUrl, 2);
        }
        //Se não fazer parte das rotas
        else{
            //Exibe erro 404 de não ter encontrado a rota
            echo '404 - ROTA NÃO ENCONTRADA';
            return;
        }

        //Importa o arquivo da controladora de acordo com o nome da controladora, nesse caso será BookController.php
        // $caminhoController = $_SERVER['DOCUMENT_ROOT'] . '/loja-livros/src/Controllers/' . $this->controller . '.php';

        // Acessa o diretório atual, volta um diretório e acessa o controller
        $caminhoControladora = __DIR__ . '/../Controllers/' . $this->controladora . '.php';

        // Para resolver problema de instanciação de classes
        $controladora = "Sgv\\App\\Controllers\\{$this->controladora}";

        require_once $caminhoControladora;

        // Inicia a controladora importada
        $this->controladora = new $controladora;

        // Chamada dos métodos da Controladora VeiculoControladora
        // Função realizada chamada das funções com parâmetros n
        // Callback pode ser o nome da função ou pode ser um array determinando no primeiro elemento o objeto e no segundo elemento o método
        // Args são os parãmetros que são levados com a função
        call_user_func_array([$this->controladora, $this->metodoControladora], $this->parametrosURL);
    }

    //Divide a URL para o roteamento
    private function analisarUrl(){
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