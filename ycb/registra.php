<?php

    // print_r($_POST['n_titulo']);
    
    // print_r($_POST['nome_titular']);
    
    // print_r($_POST['idade_titular']);
    
    // print_r($_POST['celular']);
    
    // print_r($_POST['nome_dependentes']);

    // print_r($_POST['idade_dependentes']);

    // print_r($_POST['email']);

    require_once('config.php');

    $ntitulo = $_POST['n_titulo'];
    $nometitular = $_POST['nome_titular'] ;
    $idadetitular = $_POST['idade_titular'] ;
    $cel = $_POST['celular'] ;
    $nomedependentes = $_POST['nome_dependentes'] ;
    $idadedependentes = $_POST['idade_dependentes'] ;
    $email = $_POST['email'] ;
    $genero = $_POST['genero_cliente'];

    $val_titulo = mysqli_query($conexao,"SELECT * FROM titulos where titulo = '".$_POST['n_titulo']."'"); 
    $val_dados_titulo = $val_titulo->fetch_array();

    $val_registro = mysqli_query($conexao,"SELECT * FROM lista where n_titulo = '".$_POST['n_titulo']."'"); 
    $val_dados_registro = $val_registro->fetch_array();

        //$today = date('Y-m-d');
        $today = date('Y-m-d');

    if($val_dados_titulo == null){
        
        $result1 = mysqli_query($conexao,"INSERT INTO tentativas(
            n_titulo, 
            nome_titular,
            idade_titular,
            celular,
            nome_dependentes,
            idade_dependentes,
            email,
            data
        ) VALUES (
            '$ntitulo',
            '$nometitular',
            '$idadetitular' ,
            '$cel',
            '$nomedependentes',
            '$idadedependentes',
            '$email',
            '$today')" 
        );
        echo 'Titulo inexistente';
		exit();
    }

    if($val_dados_registro != null){
        echo 'Titulo já registrado para o evento!';
        exit();
    }
    


    $result = mysqli_query($conexao,"INSERT INTO lista(
            n_titulo, 
            nome_titular,
            idade_titular,
            celular,
            nome_dependentes,
            idade_dependentes,
            email,
            data
        ) VALUES (
            '$ntitulo',
            '$nometitular',
            '$idadetitular' ,
            '$cel',
            '$nomedependentes',
            '$idadedependentes',
            '$email',
            '$today')" 
        );

    echo 'Cadastrado com sucesso!';
?>