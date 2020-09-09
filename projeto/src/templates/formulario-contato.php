<?php

$msg = null;

use PHPMailer\PHPMailer\PHPMailer;

try 
{
     if (isset($_POST['cadastrar_contato']))
     {
          $nome = filter_var($_POST['nomeCompleto'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
          $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
          $mensagem = filter_var($_POST['mensagem'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);

          if (!$nome) {
               throw new Exception('Nome é obrigatório!');
          }

          if (!$mensagem) {
               throw new Exception('Mensagem é obrigatório!');
          }

          if ($email === false) {
               throw new Exception('E-mail fornecido é inválido!');
          }

          if (!cadastrar_contato($nome, $email, $mensagem)) {
               throw new Exception('Não foi possível cadastrar sua mensagem de contato na base de dados!');
          }

          $mail = new PHPMailer();
          $mail->isSMTP();
          $mail->Host = 'smtp.umbler.com';
          $mail->SMTPAuth = true;
          $mail->Username = 'EMAIL_DE_ENVIO_AQUI';
          $mail->Password = 'SENHA_EMAIL_ENVIO_AQUI';
          $mail->SMTPSecure = '';
          $mail->SMTPAutoTLS = false;
          $mail->Port = 587;
          $mail->setFrom('no-reply@caeland.com', 'Caeland - No Reply');
          $mail->addAddress('contato@caeland.com', 'Caeland');
          $mail->Subject = "Novo Contato - Caeland";
          $mail->Body = "
          Nova mensagem enviada pelo site da Caeland:
          Nome: $nome
          E-mail: $email
          Mensagem: $mensagem
          ";

          if (!$mail->send()) {
               throw new Exception($mail->ErrorInfo);
          }

          $msg = array(
               'classe' => 'alert-success',
               'mensagem' => 'Contato enviado com sucesso!'
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
<!-- CONTACT -->
<section id="contact" data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row">

                    <div class="col-md-offset-1 col-md-10 col-sm-12">
                         <form id="contact-form" role="form" action="#contact" method="post">
                              <div class="section-title">
                                   <h1>Diga oi pra gente</h1>
                              </div>

                              <?php include "templates/alert-mensagens.php"; ?>

                              <div class="col-md-4 col-sm-4">
                                   <input type="text" class="form-control" placeholder="* Nome completo" name="nomeCompleto">
                              </div>
                              <div class="col-md-4 col-sm-4">
                                   <input type="email" class="form-control" placeholder="* E-mail" name="email">
                              </div>
                              <div class="col-md-4 col-sm-4">
                                   <input type="submit" class="form-control" name="cadastrar_contato" value="Enviar">
                              </div>
                              <div class="col-md-12 col-sm-12">
                                   <textarea class="form-control" rows="8" placeholder="* Sua mensagem" name="mensagem"></textarea>
                              </div>
                         </form>
                    </div>

               </div>
          </div>
     </section>   