<?php
include "conexao.php";

$marca = $_POST['marca'];
$modelo = $_POST["modelo"];
$ano=$_POST["ano"];
$cor=$_POST["cor"];
$num_registro=$_POST["num_registro"];

$sql = "INSERT INTO veiculos('marca', 'modelo', 'ano', 'cor', 'num_registro') 
VALUES ($marca, $modelo, $ano, $cor, $num_registro)";

$usuario = mysqli_query($connection, $sql);
