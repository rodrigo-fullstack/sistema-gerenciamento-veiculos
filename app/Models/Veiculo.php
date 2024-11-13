<?php
namespace Sgv\App\Models;
use Sgv\App\Core\BancoDeDados;


class Veiculo{
    //Armazena a conexão com o BD
    private $bd;

    public function __construct(){
        $this->bd = new BancoDeDados();
    }

    //Exibindo todos os livros...
    public function pegarTodosVeiculos(){

        //Executa consultas a partir do BD no model
        $this->bd->consulta('SELECT * from veiculos');

        $this->bd->executar();

        //É mal utilizar o método results pois está baseado no fetchAll, é melhor criar um único método que vai possuir um for para percorrer os registros evitando problemas de desempenho.
        return $this->bd->resultados();
    }

    //Retornando livro pelo Id...
    //Por algum motivo o ID está sendo enviado como string
    public function pegarVeiculoPeloId($id){

        //Cuidado com queries erradas...
        $this->bd->consulta( "SELECT * FROM veiculos WHERE id = :id" );

        // Evitando SQL Injection pelo bind
        $this->bd->vincular(':id', $id);

        return $this->bd->resultado();
    }

    public function cadastrarVeiculo($marca, $modelo, $ano, $cor, $num_reg){
        $this->bd->consulta("INSERT INTO veiculos(
        marca, 
        modelo, 
        ano, 
        cor, 
        num_reg) 

        VALUES (
        :marca,
        :modelo,
        :ano,
        :cor, 
        :num_reg)");

        $this->bd->vincular(':marca', $marca);
        $this->bd->vincular(':modelo', $modelo);
        $this->bd->vincular(':ano', $ano);
        $this->bd->vincular(':cor', $cor);
        $this->bd->vincular(':num_reg', $num_reg);

        $this->bd->executar();
    }

    //Como coleta os parâmetros de uma função como array?
    public function atualizarVeiculo($id, $marca, $modelo, $ano, $cor, $num_reg){
        $this->bd->consulta("UPDATE veiculos SET marca = :marca, modelo = :modelo, ano = :ano, cor = :cor, num_reg = :num_reg WHERE id = :id");

        $this->bd->vincular(':id', $id);
        $this->bd->vincular(':marca', $marca);
        $this->bd->vincular(':modelo', $modelo);
        $this->bd->vincular(':ano', $ano);
        $this->bd->vincular(':cor', $cor);
        $this->bd->vincular(':num_reg', $num_reg);

        $this->bd->executar();
    }


    //Deletando pelo Id...
    public function deletarPeloId($id){

        //Cuidado com queries erradas...
        $this->bd->consulta( "DELETE FROM veiculos WHERE id = :id" );

        // Evitando SQL Injection pelo bind
        $this->bd->vincular(':id', $id);

        $this->bd->executar();
    }
}