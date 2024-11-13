<?php

declare(strict_types=1);

namespace Rodrigo\MvcPhpPuro\Models;
use Rodrigo\MvcPhpPuro\Core\Database;


class Book{
    //Armazena a conexão com o BD
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    //Exibindo todos os livros...
    public function getAllBooks(){

        //Executa consultas a partir do BD no model
        $this->db->query('SELECT * from book');

        $this->db->execute();

        //É mal utilizar o método results pois está baseado no fetchAll, é melhor criar um único método que vai possuir um for para percorrer os registros evitando problemas de desempenho.
        return $this->db->results();
    }

    //Retornando livro pelo Id...
    //Por algum motivo o ID está sendo enviado como string
    public function getBookById($id){

        //Cuidado com queries erradas...
        $this->db->query( "SELECT * FROM book WHERE id = :id" );

        // Evitando SQL Injection pelo bind
        $this->db->bind(':id', $id);

        return $this->db->result();
    }

    public function addBook($isbn, $title, $author){
        $this->db->query("INSERT INTO book(isbn, title, author)
        VALUES (:isbn, :title, :author)");

        $this->db->bind(':isbn', $isbn);
        $this->db->bind(':title', $title);
        $this->db->bind(':author', $author);

        $this->db->execute();
    }

    //Como coleta os parâmetros de uma função como array?
    public function update($id, string $isbn, string $title, string $author){
        $this->db->query("UPDATE book SET isbn = :isbn, title = :title, author = :author WHERE id = :id");

        $this->db->bind(':id', $id);
        $this->db->bind(':isbn', $isbn);
        $this->db->bind(':title', $title);
        $this->db->bind(':author', $author);

        $this->db->execute();
    }


    //Deletando pelo Id...
    public function deleteById(int $id){

        //Cuidado com queries erradas...
        $this->db->query( "DELETE FROM book WHERE id = :id" );

        // Evitando SQL Injection pelo bind
        $this->db->bind(':id', $id);

        $this->db->execute();
    }
}