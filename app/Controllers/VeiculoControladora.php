<?php
namespace Sgv\App\Controllers;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Dotenv\Dotenv;
use Sgv\App\Core\Controladora;
use Sgv\App\Config\Config;
use Throwable;

//Controlador específico dos livros
class VeiculoControladora extends Controladora{
    // Método para abrir o login do usuário...
    public function login(){

        $this->renderizarView('login');
    }

    // Método para abrir o início da aplicação
    public function nav(){ 

        $this->renderizarView('index');
    }

    //Exibe todos os veiculos
    public function todosVeiculos(){
        //Carrega o modelo com o método da classe herdada
        $veiculoModel = $this->carregarModel("Veiculo");

        //Extrai todos os veiculos da tabela através do método get do VeiculoModel
        $veiculos = $veiculoModel->pegarTodosVeiculos();

        //Renderiza a view de todos os Veiculos (Veiculos.php)
        $this->renderizarView('Veiculo/Veiculos', ['veiculos' => $veiculos], 'Visualizar Todos Veículos'); //Envia também os dados obtidos através do método pegarTodosVeiculos

    }

    //Cadastra um veiculo novo
    public function cadastrarNovoVeiculo(){
        //Se receber um método POST do servidor
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            //Carrega o modelo do Livro
            $veiculoModel = $this->carregarModel("Veiculo");

            //Adiciona um livro
            $veiculoModel -> cadastrarVeiculo(
                $_POST['marca'],
                $_POST['modelo'],
                $_POST['ano'],
                $_POST['cor'],
                $_POST['num_reg']
            );

            //Redireciona para a página de Todos os Livros
            header('Location: ' . Config::BASE_URL . '');
        }
        //Se não receber é para exibir a view
        $this->renderizarView('Veiculo/CadastrarVeiculo', [], 'Cadastro de Veículos');
    }

    //Deletar pelo Id
    public function deletar($id){
        $veiculoModel = $this->carregarModel("Veiculo");

        $veiculoModel->deletarPeloId($id);

        header("Location: " . Config::BASE_URL . '');
    }


    public function veiculoPeloId($id){
        $veiculoModel = $this->carregarModel("Veiculo");

        $veiculo = $veiculoModel->pegarVeiculoPeloId($id);

        $this->renderizarView('Veiculo/Veiculo', ['veiculo' => $veiculo], $veiculo['marca'] . $veiculo['modelo']);
    }

    //Alterar livro
    //Por algum motivo id está sendo enviado como string
    public function atualizar($id){
        //Carrega o modelo do Livro
        $veiculoModel = $this->carregarModel("Veiculo");

        if($_SERVER['REQUEST_METHOD'] == "POST"){

            //Altera os dados do livro
            $veiculoModel->update(
                $id,
                $_POST['marca'],
                $_POST['modelo'],
                $_POST['ano'],
                $_POST['cor'],
                $_POST['num_reg']
            );

            // Redireciona a página para Todos os Livros
            header("Location: " . Config::BASE_URL . '');
        }
        // Retorna livro com o ID
        $veiculo = $veiculoModel->pegarVeiculoPeloId($id);

        // Renderiza view com o livro requisitado
        $this->renderizarView('Veiculo/AtualizarVeiculo', ['veiculo' => $veiculo]);
    }

    public function sair(){
        session_start();
        session_destroy();

        header('Location: ' . Config::BASE_URL . '');
    }
}