
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Réveillon ycb 2021</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>
<body class="bg">

    <header style='overflow-x: hidden !important;'>

        <div class="container-fluid padding-xx">

            <div class="container d-flex">

                <div class="logo col-12 ">
                    
                    <div class="logo" style="margin-top: 4%;">
                        
                            <center>
                                <img src="images/mtAxe.png" class="img2"  alt="">
                                
                                <img src="images/Veleiro.png" class="img2"  alt="">
                            </center>
                        
                    </div>
               
                </div>

        </div>

        <!-- copy up -->

        <div class="container spacing" >

            <div class="row">

                <div class="col">
                            <!--  width - 75% normal - 100% media  -->
                                <center><img src="images/reveillon.png" style="width: 75%; margin-top: -9%;" class="img1" alt=""></center>
                
                            
                </div>

            </div>

        </div>


                <div class="container text-light ">
                    
                    <div class="content">

                        <div class="row g-3 text text-left">

                            <form method="post" id="cadastroCliente">

                                <div class="col-12">
                                    <label for="nTitulo" class="form-label">Nº do Título:</label>
                                    <input type="number" class="form-control" name="n_titulo" id="nTitulo" placeholder="Número do títular">
                                </div>

                                <div class="col-md-12 ">
                                    <label for="nomeCliente" class="form-label">Nome Associado Titular</label>
                                    <input type="text" name="nome_titular" class="form-control" id="nomeCliente" placeholder="Digite nome completo do associado" require>
                                </div>

                                <br>
                                <div class="col-md-12 ">
                                    <label for="generoCliente" class="form-label">Gênero Associado Titular</label>
                                    <select name="genero_cliente">
                                        <option value="">  </option>                                
                                        <option value="Masculino"> Masculino </option>
                                        <option value="Feminino"> Feminino </option>
</select>
                                </div>

                                <div class="col-12">
                                    <label for="inputAddress" class="form-label">Idade Associado Titular
                                    </label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="Idade Associado" name="idade_titular">
                                </div>

                                <div class="col-md-12">
                                    <label for="emailassociado" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Digite seu email">
                                </div>

                                <div class="col-12">
                                    <label for="telefoneCliente" class="form-label">Celular/Whats App</label>
                                    <input type="text" name="celular" class="form-control telefone-mask" id="telefoneCliente" placeholder="Digite seu telefone">
                                </div>

                                <!-- <div class="col-md-12">
                                    <label for="dependente" class="form-label">Possui dependetes?</label>
                                    <select id="dependente" name="dependente" class="form-select" >
                                        <option selected>Sim, mas não irei levar para a festa</option>
                                        <option selected>Sim e irei levar para a festa</option>
                                        <option selected>Não</option>
                                    </select>
                                </div> -->

                                <!-- <div class="col-md-12">
                                    <label for="nDep" class="form-label">Quantos dependentes?</label>
                                    <input type="number" class="form-control" id="nDep" placeholder="Informe o número de dependentes">
                                </div> -->

                                <div class="col-lg-12 mt-4">
                                    <label for="" class="form-label">Nome dos dependentes: </label>
                                    <textarea class="form-control" name="nome_dependentes" id="nome_dependentes" cols="35"
                                        rows="5" placeholder="Nome dos dependentes"></textarea>
                                </div>

                                <div class="col-md-12">
                                    <label for="telnumber" class="form-label">Informe a idade dos dependentes:</label>
                                    <input type="text" name="idade_dependentes" class="form-control" id="idade_dependentes" placeholder="Informe a idade dos dependentes">
                                </div>

                                <!-- <div class="col-md-12">
                                    <label for="dependente" class="form-label">Pretende convidar alguém?</label>
                                    <select id="dependente" name="dependente" class="form-select">
                                        <option selected>Sim</option>
                                        <option selected>Não</option>
                                    </select>
                                </div> -->

                                <!-- <div class="col-md-12 ">
                                    <label for="qtddIngressos" class="form-label"> Quantidade de ingressos </label>
                                    <input type="number" name="qtddIngressos" class="form-control" id="qtddIngressos" placeholder="Digite aqui o número de ingressos">
                                </div> -->

                                <!-- <div class="col-lg-12 mt-4">
                                    <label for="descricaoCompositor" class="form-label">Nome dos convidados</label>
                                    <textarea class="form-control" name="descricaoCompositor" id="descricaoCompositor" cols="35"
                                        rows="5" placeholder="Nome dos convidados"></textarea>
                                </div> -->

                                <!-- MSG de verificação/envio de cadastro -->
                                <!-- <div class="col-md-12 text-center mt-3 text-info" id="msg-cliente"></div> -->

                                <!-- BTN ENVIAR / VOLTAR -->
                                <div class="col-md-12 mt-3">

                                    <button type="submit" id="submit" name="submit" class="form-control btn rounded " style="background: linear-gradient(to right, #e9b93e , #ffe475)!important; border-radius:50px!important;border: none;" > Finalizar cadastro </button>

                                    <div class="modal-footer justify-content-center">
                                        <p><a href="index.php" class="ml-2" style="color: #ffe475 ">Voltar</a></p>
                                    </div>
                                </div>

                            </form>
                        </div> <!-- FIM FORM CLIENTE -->
                    
                    </div>
                
                </div>



        </div>
            

    </header>
    

    
    <script>
        $('#cadastroCliente').submit(function(event){
            event.preventDefault();

            $.ajax({
                url:  "registra.php",
                method: "post",
                data: $('#cadastroCliente').serialize(),
                dataType: "text",
                success: function(result){
                    window.alert(result);
                },
            })
        })
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="js/app.js"></script>p
</body>
</html>