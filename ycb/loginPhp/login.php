<?php
session_start();
include ('../conexao.php');

//digitou algo no formulário? se não volta pro index.php
if(empty($_POST['usuario']) || empty($_POST['senha']) ) {

    header('Location: index.php');
    exit();
}


$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$query = " SELECT usuario
from usuario 
where usuario = '$usuario'
and senha = '$senha' " ;

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);

//echo $row; exit;

// if($row == 1){
//     $_SESSION['usuario'] = $usuario;
//     header('Location: ../tabela.php');
//     exit();
// }else{
//     $_SESSION['nao_autenticado'] = true;
//     header('Location: index.php');
//     exit();
// }
