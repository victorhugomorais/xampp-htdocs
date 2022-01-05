<?php 
require_once("conexao.php");    

          $query123 = $pdo->query('SELECT idade_dependentes from lista');

          $resultt = $query123->fetchAll(PDO:: FETCH_ASSOC);

$contador = 0;

// Expressão regular para numero de 1 a 100
$expressao = '/99|[1-9]?[0-9]/';


             for($i = 0; $i < count($resultt) ; $i++){

$nVezes = preg_match_all( $expressao, $resultt[$i]["idade_dependentes"]);

$contador = $contador + $nVezes;
         
	// echo "Contador: $contador ";

            }


          ?>