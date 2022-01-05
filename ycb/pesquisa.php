<?php
if(@$_GET['txtBuscar'] != '' ){

    $buscar = $_GET['txtBuscar'];

    $consulta = "SELECT * FROM lista where n_titulo LIKE '%$buscar%' or nome_titular LIKE '%$buscar%' or idade_titular LIKE '%$buscar%' or email LIKE '%$buscar%' or data LIKE '%$buscar%'";

}else{

    $consulta = "SELECT * FROM lista";

}
$con = $conexao->query($consulta) or die($conexao->error);

?>
