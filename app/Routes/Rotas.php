<?php

namespace Sgv\App\Routes;

class Rotas{
    const ROTAS = [
        '' => ['controladora' => 'VeiculoControladora', 'metodo' => 'inicio'],

        'login' => ['controladora' => 'VeiculoControladora', 'metodo' => 'login'],

        //Também verifica todos os livros
        'veiculos' => ['controladora' => 'VeiculoControladora', 'metodo' => 'todosVeiculos'],

        //Acessa um livro pelo ID
        'veiculo/id' => ['controladora' => 'VeiculoControladora', 'metodo' => 'veiculoPeloId'],

        //Adiciona um livro através do formulário
        'veiculo/cadastrar' => ['controladora' => 'VeiculoControladora', 'metodo' => 'cadastrarNovoVeiculo'],

        //Deleta um livro
        'veiculo/deletar' => ['controladora' => 'VeiculoControladora', 'metodo' => 'deletar'],

        //Altera o livro
        'veiculo/alterar' => ['controladora' => 'VeiculoControladora', 'metodo' => 'alterar'],

        'sair' => ['controladora' => 'VeiculoControladora', 'metodo' => 'sair']


    ];

}