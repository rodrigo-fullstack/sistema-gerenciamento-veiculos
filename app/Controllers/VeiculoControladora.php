<?php
namespace Sgv\App\Controllers;
use Sgv\App\Core\Controladora;
use Sgv\App\Config\Config;

//Controlador específico dos livros
class VeiculoControladora extends Controladora{
    public function index(){
        $this->renderizarView('index');
    }

    //Exibe todos os livros
    public function todosVeiculos(){
        //Carrega o modelo com o método da classe herdada
        $veiculoModel = $this->carregarModel("Veiculo");

        //Extrai todos os livros da tabela através do método get do bookModel
        $veiculos = $veiculoModel->pegarTodosVeiculos();

        //Renderiza a view de todos os livros (Books.php)
        $this->renderizarView('Veiculo/Veiculos', ['veiculos' => $veiculos]); //Envia também os dados obtidos através do método getAllBooks

    }

    //Cadastra um livro novo
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
        $this->renderizarView('Veiculo/CadastrarVeiculo');
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
        $veiculoModel = $this->carregarModel("Book");

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
}