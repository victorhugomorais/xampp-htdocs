<?php 
require_once ("cabecalho.php"); 

?>

<!-- localização/explorador do site "inicio/contato" que irá aparecer -->

    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="index.php">Inicio</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Contato</strong></div>
        </div>
      </div>
    </div>  
<!-- fim do explorador do site "inicio/contato"  -->

<!-- inicio formulario -->
    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="h3 mb-3 text-black">Entre em contato</h2>
          </div>
          <div class="col-md-7">

            <form action="#" method="post">
              
              <div class="p-3 p-lg-5 border">
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_fname" class="text-black">Nome completo <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="git_nome" name="git_nome">
                  </div>
                  <!-- git = get in touch ou entre em contato -->
                  <!-- <div class="col-md-6">
                    <label for="c_lname" class="text-black">Last Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="c_lname" name="c_lname">
                  </div> -->
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_email" class="text-black">Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="git_email" name="git_email" placeholder="">
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_subject" class="text-black">Telefone </label>
                    <input type="text" class="form-control" id="git_telefone" name="git_telefone">
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_subject" class="text-black">Assunto </label>
                    <input type="text" class="form-control" id="git_assunto" name="git_assunto">
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_message" class="text-black"> Mensagem </label>
                    <textarea name="git_mensagem" id="git_mensagem" cols="30" rows="7" class="form-control"></textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-lg-12">
                    <input type="submit" id="btn-enviar-email" class="btn btn-primary btn-lg btn-block" value="Enviar mensagem">
                    <!-- <button type="submit" id="btn-enviar-email" class="btn btn-primary btn-lg btn-block" value="Enviar mensagem">Enviar mensagem </button> -->
                    <div class="col-md-12 text-center mt-3 text-info" id="div-mensagem"></div>
                    <!-- aba de enviando, enviado com sucesso ou erro ao enviar acima -->
                  </div>
                </div>
              </div>
            </form>
          </div>

<!-- fim formulario de contato -->

<!-- inicio aba de endereço das lojas -->
          <div class="col-md-5 ml-auto">

            <div class="p-4 border mb-3">
              <span class="d-block text-primary h6 text-uppercase">Cabo Frio</span>
              <p class="mb-0">Shopping Park Lagos, Cabo Frio, RJ, Brasil</p>
            </div>

            <div class="p-4 border mb-3">
              <span class="d-block text-primary h6 text-uppercase">Niterói</span>
              <p class="mb-0">Plaza Shopping, Niterói, RJ, Brasil</p>
            </div>

            <div class="p-4 border mb-3">
              <span class="d-block text-primary h6 text-uppercase">Rio de Janeiro</span>
              <p class="mb-0">Barra Shopping, Rio de Janeiro, RJ, Brasil</p>
            </div>
<!-- fim aba de endereço das lojas -->
          </div>
        </div>
      </div>
    </div>

<?php 
require_once ("rodape.php"); 
?>  

<script type="text/javascript">
    $('#btn-enviar-email').click(function(event){
        event.preventDefault();
        $('#div-mensagem').addClass('text-info')
        $('#div-mensagem').removeClass('text-danger')
        $('#div-mensagem').removeClass('text-success')
        $('#div-mensagem').text('Enviando')
        $.ajax({
            url:"enviar.php",//TA ENVIANDO PRO ENVIAR.PHP OS DADO
            method:"post",
            data: $('form').serialize(),
            dataType: "text",
            success: function(msg){
                if(msg.trim() === 'Enviado com sucesso'){
                  //este if acima compara a string com o echo no fim de enviar.php
                    $('#div-mensagem').removeClass('text-info')
                    $('#div-mensagem').addClass('text-success')
                    $('#div-mensagem').text(msg);
                    $('#email').val('');
                    $('#nome').val('');
                    $('#telefone').val('');
                    $('#mensagem').val('');

                 }else if(msg.trim() === 'Preencha o campo nome'){
                    
                    $('#div-mensagem').addClass('text-danger')
                    $('#div-mensagem').text(msg);
                 

                 }else if(msg.trim() === 'Preencha o campo email'){
                    
                    $('#div-mensagem').addClass('text-danger')
                    $('#div-mensagem').text(msg);
                 

                 }else if(msg.trim() === 'Preencha o campo telefone'){
                    
                    $('#div-mensagem').addClass('text-danger')
                    $('#div-mensagem').text(msg);
                 }

                 else if(msg.trim() === 'Preencha o campo assunto'){
                    
                    $('#div-mensagem').addClass('text-danger')
                    $('#div-mensagem').text(msg);
                 }

                 else if(msg.trim() === 'Preencha o campo mensagem'){
                    
                    $('#div-mensagem').addClass('text-danger')
                    $('#div-mensagem').text(msg);
                 }

                 else{
                    $('#div-mensagem').addClass('text-danger')
                    $('#div-mensagem').text('Deu erro ao Enviar o Formulário! Provavelmente seu servidor de hospedagem não está com permissão de envio habilitada ou você está em um servidor local!');
                    //$('#div-mensagem').text(msg);

                 }
            }
        })
    })
</script> 

<!-- teste de envio do formulario a partir da id do botao -->
<!-- <script type="text/javascript">
$('#btn-enviar-email').click(function(){
    alert('Executou')
})
</script> -->

<!-- testando o enviao do campo nome(apenas) ao clicar em enviar mensagem no formulario -->
<!-- <script>

$('#btn-enviar-email').click(function(event){
        event.preventDefault();
        $.ajax({
            url:"enviar.php",//TA ENVIANDO PRO ENVIAR.PHP OS DADO
            method:"post",
            data: $('form').serialize(),
            dataType: "text",
            success: function(msg){
                alert(msg)
            }
          }
        ) 
      }
    )
</script> -->