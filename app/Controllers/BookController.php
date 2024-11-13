<?php
declare(strict_types=1);

namespace Rodrigo\MvcPhpPuro\Controllers;
use Rodrigo\MvcPhpPuro\Core\Controller;
use Rodrigo\MvcPhpPuro\Config\Config;

//Controlador específico dos livros
class BookController extends Controller{
    public function index(){
        $this->renderView('index');
    }

    //Exibe todos os livros
    public function allBooks(){
        //Carrega o modelo com o método da classe herdada
        $bookModel = $this->loadModel("Book");

        //Extrai todos os livros da tabela através do método get do bookModel
        $books = $bookModel->getAllBooks();

        //Renderiza a view de todos os livros (Books.php)
        $this->renderView('Book/Books', ['books' => $books]); //Envia também os dados obtidos através do método getAllBooks

    }

    //Cadastra um livro novo
    public function addNewBook(){
        //Se receber um método POST do servidor
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            //Carrega o modelo do Livro
            $bookModel = $this->loadModel("Book");

            //Adiciona um livro
            $bookModel -> addBook(
                $_POST['isbn'],
                $_POST['title'],
                $_POST['author']
            );

            //Redireciona para a página de Todos os Livros
            header('Location: ' . Config::BASE_URL . 'books');
        }
        //Se não receber é para exibir a view
        $this->renderView('Book/AddBook');
    }

    //Deletar pelo Id
    public function delete(int $id){
        $bookModel = $this->loadModel("Book");

        $bookModel->deleteById($id);

        header("Location: " . Config::BASE_URL . 'books');
    }


    public function bookById(int $id){
        $bookModel = $this->loadModel('Book');

        $book = $bookModel->getBookById($id);

        $this->renderView('Book/Book', ['book' => $book], $book['title']);
    }

    //Alterar livro
    //Por algum motivo id está sendo enviado como string
    public function update($id){
        //Carrega o modelo do Livro
        $bookModel = $this->loadModel("Book");

        if($_SERVER['REQUEST_METHOD'] == "POST"){

            //Altera os dados do livro
            $bookModel->update(
                $id,
                $_POST['isbn'],
                $_POST['title'],
                $_POST['author']
            );

            // Redireciona a página para Todos os Livros
            header("Location: " . Config::BASE_URL . "books");
        }
        // Retorna livro com o ID
        $book = $bookModel->getBookById($id);

        // Renderiza view com o livro requisitado
        $this->renderView('Book/UpdateBook', ['book' => $book]);
    }
}