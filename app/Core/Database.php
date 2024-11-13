<?php
declare(strict_types=1);

//Definindo namespace para o models
namespace Rodrigo\MvcPhpPuro\Core;

//Importando classe de Configuração
use Rodrigo\MvcPhpPuro\Config\Config;

//É necessário fazer import do PDO
use PDO;
use PDOException;

class Database{
    //Definindo propriedades privadas com valores do BD capturados de config.php
    private string $host = Config::DB_HOST;
    private string $user = Config::DB_USER;
    private string $passwd = Config::DB_PASS;
    private string $dbname = Config::DB_NAME;
    private string $dbport = Config::DB_PORT;


    private $dbh; //Manipulador do BD
    private $stmt; //Script SQL
    private $error; //Mensagem de Erro


    //Construtores inicializam as instâncias da classe: Iniciar conexão com BD
    public function __construct(){

        //Data Source Name, nome que será fornecido no PDO
        $dsn = "mysql:host={$this->host};dbname={$this->dbname};port={$this->dbport}";
        // echo "DSN = ($dsn)";

        //PDO somente funciona com namespaces se for utilizado
        $options = [
            //Mantém a conexão do BD constante, não precisando fazer a todo momento que for instanciado
            PDO::ATTR_PERSISTENT,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION //Se houver algum erro, exibe uma exceção
        ];

        //Tenta fazer uma conexão ao BD pelo PDO
        try{
            $this->dbh = new PDO($dsn, $this-> user, $this-> passwd, $options);
            // echo "Conexão com PDO ao {$this-> dbname}";
        } catch(PDOException $e){
            //Caso ocorra um erro o exibe...
            $this-> error = $e-> getMessage();
            echo $this-> error;
        }

    }

    //Prepara consulta SQL
    public function query($sql){
        //Mantém a consulta armazenada através do dbh (PDO) com o método prepare
        $this->stmt = $this->dbh->prepare($sql);
    }

    public function execute(){
        return $this->stmt->execute();
    }

    //Captura todos os resultados em um array associativo
    public function results(){
        //Fetch All retorna os resultados restantes de uma consulta
        //Não é muito aconselhável utilizar devido a problemas de desempenho
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //Captura um único resultado no array associativo
    public function result(){
        //Pode ser importante para coletar pelo id
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);

    }

    public function bind($param, $value){
        $this->stmt->bindValue($param, $value);
    }
}