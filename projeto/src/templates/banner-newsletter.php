<?php

$msg = null;

try 
{
     if (isset($_POST['cadastrar_email']))
     {
          $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
          if ($email === false) {
               throw new Exception('E-mail fornecido é inválido!');
          }

          if (!cadastrar_email_newsletter($email)) {
               throw new Exception('Não foi possível cadastrar o e-mail na base de dados!');
          }

          $msg = array(
               'classe' => 'alert-success',
               'mensagem' => 'E-mail cadastrado com sucesso!'
          );
     }
}
catch(Exception $erro)
{
     $msg = array(
          'classe' => 'alert-danger',
          'mensagem' => $erro->getMessage()
     );
}

?>
<!-- NEWSLETTER -->
<section id="home" data-stellar-background-ratio="0.5">
     <div class="overlay"></div>
     <div class="container">
          <div class="row">

               <div class="col-md-offset-3 col-md-6 col-sm-12">
                    <div class="home-info">
                         <h3>Sites e Apps Profissionais</h3>
                         <h1>Nós gerenciamos sua presença digital</h1>
                         <form action="" method="POST" class="online-form">

                              <?php include 'templates/alert-mensagens.php'; ?>

                              <input type="email" name="email" class="form-control" placeholder="Digite seu e-mail" required>
                              <button type="submit" name="cadastrar_email" class="form-control">Cadastrar</button>
                         </form>
                    </div>
               </div>

          </div>
     </div>
</section>