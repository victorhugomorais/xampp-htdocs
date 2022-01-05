<?php

//define('HOST','127.0.0.1');
define('HOST','localhos3312');
define('USUARIO', 'yachtclu02_add1');
define('SENHA','Alvo2021');
define('DB','yachtclubedaba02');

$conexao = mysqli_connect(HOST,USUARIO, SENHA, DB) or die ('Não foi possível conectar');

?>