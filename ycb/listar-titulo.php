<?php

    $buscar = $_POST['search'];

    echo'<datalist id="lista-pesquisa">';

    echo'<option style="padding:0px 6px;" value="tabela.php?titulo='.$_POST['search'].'" selected> Pesquisar "'.$_POST['search'].'" </option>';

    echo'</datalist>';

?>