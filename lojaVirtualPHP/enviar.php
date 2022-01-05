<?php 

require_once ("conexao.php"); 

$Edestinatario = $Gemail; //pra onde vai ser enviado o email, Gemail está declarado no arquivo config.php


//variaveis do formulario
$Enome = $_POST['git_nome'];//ok1

$Eemail_cliente = $_POST['git_email'];//ok2

$Etelefone = $_POST['git_telefone'];//ok3

$Emensagem = $_POST['git_mensagem'];//ok4

$Eassunto =$Gnome_loja ." ". $_POST['git_assunto'];


//validação para não deixar campos do formulario em branco
if($Enome ==""){
    echo 'Preencha o campo nome';
    exit();
}

if($Eemail_cliente ==""){
    echo 'Preencha o campo email';
    exit();
}

if($Etelefone ==""){
    echo 'Preencha o campo telefone';
    exit();
}

if($Eassunto ==""){
    echo 'Preencha o campo assunto';
    exit();
}

if($Emensagem ==""){
    echo 'Preencha o campo mensagem';
    exit();
}


//$mensagem é o campo principal do email, é o corpo do email, e pode ser estruturado com html também, caso queira!
$mensagem = utf8_decode('Nome: '.$Enome.'\n\r'.
'Email: '.$Eemail_cliente . '\n\r' .
'Telefone: '.$Etelefone . '\n\r' . 
'Mensagem: '.$Emensagem . '\n\r'
);

$cabecalhos = "From: ".$Eemail_cliente;

mail($Edestinatario, $Eassunto, $mensagem, $cabecalhos);

echo 'Enviado com sucesso';

//ENVIAR PARA O BANCO DE DADOS O EMAIL E NOME DOS CAMPOS
$res = $pdo->query("SELECT * FROM emails where email = '$Eemail_cliente' "); 
$dados = $res->fetchAll(PDO::FETCH_ASSOC);
if(@count($dados) == 0){
	$res = $pdo->prepare("INSERT into emails (nome, email,telefone, ativo) values (:nome, :email, :telefone, :ativo)");
	$res->bindValue(":nome", $Enome);
	$res->bindValue(":email", $Eemail_cliente);
    $res->bindValue(":telefone", $Etelefone);
	$res->bindValue(":ativo", "Sim");
	$res->execute();
}

echo $_POST['email'];

?>