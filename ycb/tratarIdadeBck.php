<?php 
require_once("conexao.php");    

          $query123 = $pdo->query('SELECT idade_dependentes from lista');

          $resultt = $query123->fetchAll(PDO:: FETCH_ASSOC);

          //isto printa bem os arrays resultt
          // echo "<pre>";
          // print_r($resultt);
          // echo "<pre>";


$contador = 0;


// Expressão regular para numero de 1 a 100
$expressao = '/99|[1-9]?[0-9]/';

$testtt = '99, 50 e 30 / 50 ; 35';
// $nVezes = preg_match_all( $expressao, $testtt);
// echo "$nVezes";
// echo "tam:" . count($resultt); //resulta no numero de linhas da lista

             for($i = 0; $i < count($resultt) ; $i++){


                echo "indice" . $i . "\n\n\n\n";



                // print_r($resultt[$i]);
                //  $resultt7 = var_dump($resultt[$i]);

// echo "aqui é o var_dump $resultt7";


// Retorna a quantidade de vezes que a expressão existir no texto
// $nVezes = preg_match_all( $expressao, $resultt[$i]->idade_dependentes);
$nVezes = preg_match_all( $expressao, $resultt[$i]["idade_dependentes"]);

$contador = $contador + $nVezes;

echo "Contador: $contador ";

            }


          ?>