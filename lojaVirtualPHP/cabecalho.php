<?php require_once("config.php");
require_once("conexao.php");
@session_start();
$id_usuario = @$_SESSION['id_usuario'];


//VERIFICAR TOTAIS DO CARRINHO
$res = $pdo->query("SELECT * from carrinho where id_usuario = '$id_usuario' and id_venda = 0 order by id asc");
$dados = $res->fetchAll(PDO::FETCH_ASSOC);
$linhas = count($dados);

if($linhas == 0){
  $linhas = 0;
  $total = 0;
}

$total;
for ($i=0; $i < count($dados); $i++) { 
 foreach ($dados[$i] as $key => $value) {
 }

$combo = $dados[$i]['combo'];
$id_produto = $dados[$i]['id_produto'];
 $quantidade = $dados[$i]['quantidade'];

 if($combo == 'Sim'){
   $res_p = $pdo->query("SELECT * from combos where id = '$id_produto' ");
 }else{
  $res_p = $pdo->query("SELECT * from produtos where id = '$id_produto' ");
 }
 
 $dados_p = $res_p->fetchAll(PDO::FETCH_ASSOC);

 if($combo == 'Sim'){ 
  $promocao = ""; 
  $pasta = "combos";
 }else{
  $promocao = @$dados_p[0]['promocao']; 
  $pasta = "produtos";
 }

 if($promocao == 'Sim'){
  $queryp = $pdo->query("SELECT * FROM promocoes where id_produto = '$id_produto' ");
  $resp = $queryp->fetchAll(PDO::FETCH_ASSOC);
  $valor = $resp[0]['valor'];

}else{
  $valor = @$dados_p[0]['valor'];
}


$total_item = $valor * $quantidade;
@$total = @$total + $total_item;

}

@$total_c = number_format(@$total, 2, ',', '.');

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <title> <?php $Gnome_loja ?> </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <!-- Css Hugo Cursos Styles -->
  <!-- <link rel="stylesheet" href="cssH/bootstrap.min.css" type="text/css"> -->
      <!-- <link rel="stylesheet" href="cssH/font-awesome.min.css" type="text/css"> -->
     <link rel="stylesheet" href="cssH/style.css" type="text/css"> 
     <!-- <link rel="stylesheet" href="meucss/style.css" type="text/css">  -->
     <!-- é o style q muda a aba "produto.php" -->
   <!-- <link rel="stylesheet" href="cssH/elegant-icons.css" type="text/css"> -->
    <!-- <link rel="stylesheet" href="cssH/nice-select.css" type="text/css"> -->
    <!-- <link rel="stylesheet" href="cssH/jquery-ui.min.css" type="text/css"> -->
    <!-- <link rel="stylesheet" href="cssH/owl.carousel.min.css" type="text/css"> -->
    <!-- <link rel="stylesheet" href="cssH/slicknav.min.css" type="text/css">  -->
    

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">


    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="css/meustyle.css">

    <script src="https://use.fontawesome.com/9dc0b7b458.js"></script>
    
  </head>
  <body>
  
  <div class="site-wrap">
    <header class="site-navbar" role="banner">
      <div class="site-navbar-top">
        <div class="container">
          <div class="row align-items-center">

            <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
              <form action="lista-produtos.php" class="site-block-top-search">
                <span class="icon icon-search2"></span>
                <input type="text" name="txtBuscar" class="form-control border-0" placeholder="Procurar produto">
              </form>
            </div>

            <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
              <div class="site-logo">
                <a href="index.php" class="js-logo-clone"><?php echo $Gnome_loja ?></a>
              </div>
            </div>

            <div class="col-6 col-md-4 order-3 order-md-3 text-right">
              <div class="site-top-icons">
                <ul>
                <?php 
                     if(@$_SESSION['id_usuario'] == null || @$_SESSION['nivel_usuario'] != 'Cliente'){
                 ?>
                <li><a href="sistema/index.php"><span class="icon icon-person">Login</span> </a></li>
            <?php }else{ ?>
                <a href="sistema/painel-cliente"><span class="icon icon-person"></span> Painel</a>
            <?php } ?>

                  <!-- <li><a href="sistema/index.php"><span class="icon icon-person"></span></a></li> -->
                  <!-- <li>
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
  <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
</svg>
</li> -->
                  <li><a href="#"><span class="icon icon-heart-o"></span></a></li>
                  <li>
                    <a href="carrinho.php" class="site-cart">

                      <span class=""> R$ <?php echo $total_c . " " ?></span>
                      <span class="icon icon-shopping_cart"></span>
                      <span class="count"> <?php echo $linhas ?> </span>
                    </a>
                  </li> 
                  <li class="d-inline-block d-md-none ml-md-0"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a></li>
                </ul>
              </div> 
            </div>

          </div>
        </div>
      </div> 
      <nav class="site-navigation text-right text-md-center" role="navigation">
        <div class="container">
          <ul class="site-menu js-clone-nav d-none d-md-block">
            <li class=" active">
              <a href="index.php">Inicio</a>
              <!-- <ul class="dropdown">
                <li><a href="#" ><span class="risca">Menu One</span></a></li>
                <li><a href="#"><span class="risca">Menu Two</span></a></li>
                <li><a href="#"><span class="risca">Menu Three</span></a></li>
                <li class="has-children">
                  <a href="#"><span class="risca">Sub Menu</span></a>
                  <ul class="dropdown">
                    <li><a href="#">Menu One</a></li>
                    <li><a href="#">Menu Two</a></li>
                    <li><a href="#">Menu Three</a></li>
                  </ul>
                </li>
              </ul> -->
            </li>
            <!-- class="has-childen" coloca uma setinha para baixo para avisar sobre um submenu -->
            <li class="">
              <a href="about.php">Sobre</a>
              <!-- <ul class="dropdown">
                <li><a href="#"><span class="risca">Menu One</span></a></li>
                <li><a href="#"><span class="risca">Menu Two</span></a></li>
                <li><a href="#"><span class="risca">Menu Three</span></a></li>
              </ul> -->
            </li>
            <!-- <li><a href="produtos.php">Produtos</a></li> -->
            <li><a href="categorias.php">Produtos</a></li>
            <li><a href="combos.php">Combos</a></li>
            <li><a href="blog.php">Blog</a></li>
            <li><a href="contact.php">Contato</a></li>
          </ul>
        </div>
      </nav>
    </header>