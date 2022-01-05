<?php

session_start();
//unset($_SESSION['NOMEDASESSAO']);
session_destroy();
header('Location: index.php');
exit();

?>