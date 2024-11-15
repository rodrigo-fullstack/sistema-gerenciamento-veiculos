<?php
declare(strict_types=1);

//Conectando com Autoload do PHP
require_once __DIR__ . '/../vendor/autoload.php' ;

use Sgv\App\Config\Config;
use Sgv\App\Core\BancoDeDados;
use Sgv\App\Core\Controladora;
use Sgv\App\Core\App;

$app = new App();

// Ok
// $bd = new BancoDeDados();

// $bd = new BancoDeDados();

// $bd->consulta('SELECT * FROM veiculos');
// $bd->executar();
// var_dump($bd->resultados());

// $contr = new Controladora();

// Ok
// $veiculoModel = $contr->carregarModel('Veiculo');
// var_dump($veiculoModel->pegarTodosVeiculos());

//Exibe quantidade de registros
// $db->query("SELECT * FROM book");
// echo $db->execute();

// Dados exemplo;
// $isbn = '0111';
// $title = 'Novo Título';
// $author = 'Novo Autor';
// $date_added = date("dmYhms");// Tratar depois erro de data
// Não pode especificar data no PHP pois o SQL está fazendo isso automaticamente com a definição do atributo date_added;

// Modelo de inserção no BD
// $db->query("INSERT INTO `book` (`isbn`, `title`, `author`)
// VALUES (:isbn, :title, :author)");

//Vincula os parâmetros a seus devidos valores
//Isso é importante para evitar SQL Injection, ou seja, está totalmente relacionado com a segurança da informação
// $db->bind(':isbn', $isbn);
// $db->bind(':title', $title);
// $db->bind(':author', $author);

// echo $db->execute();


// Pega o primeiro resultado $linha = $db->result();

//Percorre as linhas da tabela e as exibe
// for( $i = 1; $i <= 5; $i++ ){
//     $db->query("SELECT * FROM `book` WHERE id = :id");

//     //As que não possuem id retorna bool(false);
//     $db->bind(':id', $i);

//     $linha = $db->result();

//     //Exibindo as linhas
//     var_dump($linha); echo "<br> \n";
// }

// $db->query("SELECT * FROM `book`");

// $db->execute();

// $linhas = $db->results();

// var_dump($linhas);



// $book = new Book();

// echo 'Exibindo a partir do BookModel: <br> ' . PHP_EOL;

// var_dump($book->getAllBooks());

// var_dump($book->getBookById(3));

// echo '<br>Deletando a partir do Id no BookModel: <br>';

// $book->deleteById(1);

// $book->update(3, "0777", "MUNDO FANTÁSTICO", "hog-wizard");

// $book->addBook('0999', "Meu Amigãozão", "Joaquina Francisca");



//Uso do PDO: p rimeiro prepara (query), depois vincula (bind) por último executa