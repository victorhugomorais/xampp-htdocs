<?php

require_once('config.php');
require_once('loginPhp/verifica_login.php');
require_once('loginPhp/cabecalho.php');

if(@$_GET['txtBuscar'] != '' ){

    $buscar = $_GET['txtBuscar'];

    $consulta = "SELECT * FROM tentativas where n_titulo LIKE '%$buscar%' or nome_titular LIKE '%$buscar%' or idade_titular LIKE '%$buscar%' or email LIKE '%$buscar%' or data LIKE '%$buscar%' ";

}else{

    $consulta = "SELECT * FROM tentativas";

}
$con = $conexao->query($consulta) or die($conexao->error);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
</head>
<body>

    <div style="position: relative;" class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left" >

        <form id="form-buscar" method="post" class="">
            <input type="text" id='search' name="search" class="form-control border-0" placeholder="Pesquisar" list="lista-pesquisa" autocomplete="off" onchange="location = this.value;">
        </form>

        <div style='position: absolute; display:none;' class="col-2 col-12 rounded-sm" id='result'>                      
        </div>
    </div>
                    
<table class="table ">
    <thead class="thead-dark">
        <tr>
            <td>ID</td>
            <td>Numero do título</td>
            <td>Nome do titular</td>
            <td>Idade do titular</td>
            <td>Celular </td>
            <td>Nomes do dependentes</td>
            <td>Idade dos dependentes</td>
            <td>Email</td>
            <td> Data </td>
        </tr>
    </thead>
<?php 
while ($dados = $con->fetch_array()) {  ?>
    <tr>
        <td> <?php echo $dados['id'] ?> </td>
        <td> <?php echo $dados['n_titulo'] ?> </td>
        <td> <?php echo $dados['nome_titular'] ?> </td>
        <td> <?php echo $dados['idade_titular'] ?> </td>
        <td> <?php echo $dados['celular'] ?> </td>
        <td> <?php echo $dados['nome_dependentes'] ?> </td>
        <td> <?php echo $dados['idade_dependentes'] ?> </td>
        <td> <?php echo $dados['email'] ?> </td>
        <td> <?php echo $dados['data'] ?> </td>
    </tr>

<?php } ?>

</table>

<script type="text/javascript">
  $(document).ready(function() {
    $("#search").keyup(function() {
      event.preventDefault();

      if (this.value.length > 1) {
        $.ajax({
          url: "listar-produtos-pesquisa1.php",
          method: "post",
          data: $('form').serialize(),
          dataType: "text",
          success: function(mensagem) {

            $('#result').css({
              'display': 'block'
            });
            $('#result').html(mensagem);

          },

        })

        $("#lista-pesquisa").val($("#lista-pesquisa option:first").val());

      } else {
        $('#result').css({
          'display': 'none'
        });
      }

    });
    $(window).scroll(function() {
      $("#result").css({
        'display': 'none'
      });
    });
  })

</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>