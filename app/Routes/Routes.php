<?php

namespace Rodrigo\MvcPhpPuro\Routes;

class Routes{
    const ROUTES = [
        //Rota para verificar todos os livros
        '' => ['controller' => 'BookController', 'method' => 'index'],

        //Também verifica todos os livros
        'books' => ['controller' => 'BookController', 'method' => 'allBooks'],

        //Acessa um livro pelo ID
        'book/id' => ['controller' => 'BookController', 'method' => 'bookById'],

        //Adiciona um livro através do formulário
        'book/add' => ['controller' => 'BookController', 'method' => 'addNewBook'],

        //Deleta um livro
        'book/delete' => ['controller' => 'BookController', 'method' => 'delete'],

        //Altera o livro
        'book/update' => ['controller' => 'BookController', 'method' => 'update']
    ];

}