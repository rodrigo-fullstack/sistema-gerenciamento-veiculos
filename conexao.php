<?php

$server="localhost";
$user="root";
$passwd="";
$db="sistema-gerenciamento-veiculos";
if(
    mysqli_connect($server, $user, $passwd, $db)
    ){
        echo "conectou";
    }
echo 'Hello world';

