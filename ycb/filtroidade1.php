<?php

     $ageMin = $_POST['ageMin'];
    
     $ageMax = $_POST['ageMax'];

    // echo $ageMin;

     //echo $ageMax;
     
     echo"<script language='javascript'> window.location='tabelaNSocio.php?ageMin=".$ageMin."&ageMax=".$ageMax."' </script>";

?>