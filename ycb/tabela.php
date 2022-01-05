<?php

require_once('conexao.php');
// require_once('config.php');
// require_once('loginPhp/verifica_login.php');
require_once('loginPhp/cabecalho.php');
//require_once('pesquisa.php');

// require_once('tratarIdade.php');
// require_once('tratarIdadeN.php');

if(@$_GET['txtBuscar'] != '' ){

    $buscar = $_GET['txtBuscar'];

    $consulta = "SELECT * FROM lista where n_titulo LIKE '%$buscar%' or nome_titular LIKE '%$buscar%' or idade_titular LIKE '%$buscar%' or email LIKE '%$buscar%' or data LIKE '%$buscar%' 
    or nome_dependentes LIKE '%$buscar%'
    or idade_dependentes LIKE '%$buscar%'";

}else if(@$_GET['ageMin'] != '' && @$_GET['ageMax'] != ''){
    
    $ageMin = $_GET['ageMin'];

    $ageMax = $_GET['ageMax'];   

    $consulta = "SELECT * FROM lista where idade_titular >= '$ageMin' and idade_titular <= '$ageMax'" ;

}else if(@$_GET['titulo'] != ''){
    
  $titulo = $_GET['titulo'];

  $consulta = "SELECT * FROM lista where n_titulo  LIKE '$titulo%'" ;

}else{

    $consulta = "SELECT * FROM lista";//18
   //$consulta = "SELECT COUNT(*) FROM `lista`";//2
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
    <form id="form-buscar" method="post" class="">
      <input type="text" id='search' name="search" class="form-control border-0" placeholder="Pesquisar" list="lista-pesquisa" autocomplete="off" onchange="location = this.value;">
    </form>
    <div style="" class="row site-search-icon text-left" >
        
    <div class="col-1">
      <p>    Idade: </p>

    </div>

        <div class="col-1">
          <form action="filtro.php" method="post" class="">
              <input type="hidden" value="11" id='ageMin' name="ageMin">
              <input type="hidden" value="20" id='ageMax' name="ageMax">

              <button type="submit"> 11-20 </button>
          </form>
        </div>

        <div class="col-1">
          <form action="filtro.php" method="post" class="">
              <input type="hidden" value="21" id='ageMin' name="ageMin">
              <input type="hidden" value="30" id='ageMax' name="ageMax">
              <button type="submit"> 21-30 </button>
          </form>
        </div>

        <div class="col-1">
          <form action="filtro.php" method="post" class="">
              <input type="hidden" value="31" id='ageMin' name="ageMin">
              <input type="hidden" value="40" id='ageMax' name="ageMax">
              <button type="submit"> 31-40 </button>
          </form>
        </div>

        <div class="col-1">
          <form action="filtro.php" method="post" class="">
              <input type="hidden" value="41" id='ageMin' name="ageMin">
              <input type="hidden" value="50" id='ageMax' name="ageMax">
              <button type="submit"> 41-50 </button>
          </form>
        </div>

        <div class="col-1">
          <form action="filtro.php" method="post" class="">
              <input type="hidden" value="51" id='ageMin' name="ageMin">
              <input type="hidden" value="60" id='ageMax' name="ageMax">
              <button type="submit"> 51-60 </button>
          </form>
        </div>

        <div class="col-1">
          <form action="filtro.php" method="post" class="">
              <input type="hidden" value="61" id='ageMin' name="ageMin">
              <input type="hidden" value="80" id='ageMax' name="ageMax">
              <button type="submit"> 61-80 </button>
          </form>
        </div>

        

        <p>

<!-- apagando itens duplicados no banco de dados -->



<!-- $query123 = $pdo->query('DELETE a FROM lista AS a, lista AS b WHERE a.nome_titular=b.nome_titular AND a.id < b.id;'); -->
<!-- DELETE a FROM lista AS a, lista AS b WHERE a.nome_titular=b.nome_titular AND a.id < b.id; -->


 
        Total da lista de <strong>sócios</strong>: 
          <?php 
          $query123 = $pdo->query('DELETE a FROM lista AS a, lista AS b WHERE a.nome_titular=b.nome_titular AND a.id < b.id;');

          

          $query123 = $pdo->query('SELECT * from lista');

          $resultt = $query123->fetchAll(PDO:: FETCH_ASSOC);

          echo count($resultt);
          ?>
 <br>
 Filtros do <strong>sócios</strong>:
 <br>
Registros de 11 a 20 anos:  
          <?php 

          $query123 = $pdo->query('SELECT * from lista WHERE (idade_titular>=11 AND idade_titular<=20)');

          $resultt = $query123->fetchAll(PDO:: FETCH_ASSOC);

          echo count($resultt);
          ?>
 <br>
Registros de 21 a 30 anos:  
          <?php 

          $query123 = $pdo->query('SELECT * from lista WHERE (idade_titular>=21 AND idade_titular<=30)');

          $resultt = $query123->fetchAll(PDO:: FETCH_ASSOC);

          echo count($resultt);
          ?>
           <br>
Registros de 31 a 40 anos:  
          <?php 

          $query123 = $pdo->query('SELECT * from lista WHERE (idade_titular>=31 AND idade_titular<=40)');

          $resultt = $query123->fetchAll(PDO:: FETCH_ASSOC);

          echo count($resultt);
          ?>
           <br>
Registros de 41 a 50 anos:  
          <?php 

          $query123 = $pdo->query('SELECT * from lista WHERE (idade_titular>=41 AND idade_titular<=50)');

          $resultt = $query123->fetchAll(PDO:: FETCH_ASSOC);

          echo count($resultt);
          ?>
           <br>
Registros de 51 a 60 anos:  
          <?php 

          $query123 = $pdo->query('SELECT * from lista WHERE (idade_titular>=51 AND idade_titular<=60)');

          $resultt = $query123->fetchAll(PDO:: FETCH_ASSOC);

          echo count($resultt);
          ?>
           <br>
Registros de acima de 61 anos:  
          <?php 

          $query123 = $pdo->query('SELECT * from lista WHERE (idade_titular>=61)');

          $resultt = $query123->fetchAll(PDO:: FETCH_ASSOC);

          echo count($resultt);
          ?>
<br>
<br>
Total de <strong>sócios</strong> + <strong> não sócios</strong>:

      <?php 

          $query123 = $pdo->query('SELECT * from lista');

          $resultt = $query123->fetchAll(PDO:: FETCH_ASSOC);

          $query123 = $pdo->query('SELECT * from tentativas');

          $resultt1 = $query123->fetchAll(PDO:: FETCH_ASSOC);

          $resultt2 = count($resultt1) + count($resultt);

          echo $resultt2;
$aux4 = $resultt2;
          ?>

          <br>
<br>
Número de <strong>dependentes</strong> dos <strong>sócios</strong>:  

          <?php 
          
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
          $aux1 = $contador;
echo $contador;

          ?>

          <!-- total convidados -->
<!-- <br>

<br>
Número de <strong>dependentes</strong> de <strong>sócios</strong> + <strong>convidados</strong> dos <strong>não sócios</strong>:  

<?php 

$query123 = $pdo->query('SELECT idade_dependentes from tentativas');

$resultt = $query123->fetchAll(PDO:: FETCH_ASSOC);

$contador = 0;

// Expressão regular para numero de 1 a 100
$expressao = '/99|[1-9]?[0-9]/';


   for($i = 0; $i < count($resultt) ; $i++){

$nVezes = preg_match_all( $expressao, $resultt[$i]["idade_dependentes"]);

$contador = $contador + $nVezes;

// echo "Contador: $contador ";

  }
$aux2 = $contador;
$aux3 = $aux1 + $aux2;
// echo $aux3; 
?> -->

<!-- total de socios e seus dependentes, não socios e seu convidados-->
<!-- <br>

<br>
Número de <strong>sócios</strong> + <strong>dependentes</strong> de <strong>sócios</strong> + <strong>não sócios</strong> + <strong>convidados</strong> dos <strong>não sócios</strong>:  

<?php 

// echo ($aux3 + $aux4);

?> -->


















        </p>





        
        <div style='position: absolute; display:none;' class="col-1 col-12 rounded-sm" id='result'>                      
        </div>
    </div>
        
<table class="table ">
    <thead class="thead-dark">
        <tr>
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

      if (this.value.length > 3) {
        $.ajax({
          url: "listar-produtos-pesquisa.php",
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

      } else if (this.value.length == 3) {
        $.ajax({
          url: "listar-titulo.php",
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