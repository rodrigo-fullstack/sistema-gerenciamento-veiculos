<?php
declare(strict_types=1);

//Definindo namespace para o models
namespace Sgv\App\Core;

//Importando classe de Configuração
use Sgv\App\Config\Config;

//É necessário fazer import do PDO
use PDO;
use PDOException;

// Criando classe básica para fazer operações no BD
class BancoDeDados{

    //Definindo propriedades privadas com valores do BD capturados de config.php
    private string $servidorBd = Config::DB_HOST;
    private string $usuarioBd = Config::DB_USER;
    private string $senhaBd = Config::DB_PASS;
    private string $nomeBd = Config::DB_NAME;
    private string $portaBd = Config::DB_PORT;


    private $mbd; //Manipulador do BD
    private $sql; //Script SQL
    private $erro; //Mensagem de Erro


    //Construtores inicializam as instâncias da classe: Iniciar conexão com BD
    public function __construct(){

        //Data Source Name, nome que será fornecido no PDO para conexão
        $dsn = "mysql:host={$this->servidorBd};dbname={$this->nomeBd};port={$this->portaBd}";
        // echo "DSN = ($dsn)";

        //PDO somente funciona com namespaces se for utilizado
        $options = [
            //Mantém a conexão do BD constante, não precisando fazer a todo momento que for instanciado
            PDO::ATTR_PERSISTENT,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION //Se houver algum erro, exibe uma exceção
        ];

        //Tenta fazer uma conexão ao BD pelo PDO
        try{
            $this->mbd = new PDO($dsn, $this-> usuarioBd, $this-> senhaBd, $options);
            // echo "Conexão com PDO ao {$this-> dbname}";
        } catch(PDOException $e){
            //Caso ocorra um erro o exibe...
            $this-> erro = $e-> getMessage();
            echo $this-> erro;
        }

    }

    //Prepara consulta SQL
    public function consulta($sql){
        //Mantém a consulta armazenada através do dbh (PDO) com o método prepare
        $this->sql = $this->mbd->prepare($sql);
    }

    // Executa a consulta SQL preparada
    public function executar(){
        return $this->sql->execute();
    }

    //Captura todos os resultados em um array associativo
    public function resultados(){
        //Fetch All retorna os resultados restantes de uma consulta
        //Não é muito aconselhável utilizar devido a problemas de desempenho
        return $this->sql->fetchAll(PDO::FETCH_ASSOC);
    }

    //Captura um único resultado no array associativo
    public function resultado(){
        //Pode ser importante para coletar pelo id
        $this->executar();
        return $this->sql->fetch(PDO::FETCH_ASSOC);

    }

    // Vincula um atributo a um valor, importante para evitar problemas de SQL injection no servidor
    public function vincular($param, $value){
        $this->sql->bindValue($param, $value);
    }
}