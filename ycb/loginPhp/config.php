<?php 

// VARIAVEIS DO BANCO DE DADOS
$servidor = 'localhost';
$usuario = 'u871335263_admin';
$senha = '@AlvoemFoco123';
$banco = 'u871335263_lista';

$conexao = new mysqli($servidor,$usuario,$senha,$banco);

if($conexao -> connect_errno){
    echo "ERRO NA CONEXAO COM O SERVIDOR";
}

 ?>