<?php 

# Configurações Gerais
require_once "config.php";

# Configurações da Página
$titulo_pagina = "Agência Criativa";
require_once "includes/header-site.php";

?>

     <!-- FEATURE -->
     <section id="home" data-stellar-background-ratio="0.5">
          <div class="overlay"></div>
          <div class="container">
               <div class="row">

                    <div class="col-md-offset-3 col-md-6 col-sm-12">
                         <div class="home-info">
                              <h3>Sites e Apps Profissionais</h3>
                              <h1>Nós gerenciamos sua presença digital</h1>
                              <form action="" method="get" class="online-form">
                                   <input type="email" name="email" class="form-control" placeholder="Digite seu e-mail" required>
                                   <button type="submit" class="form-control">Cadastrar</button>
                              </form>
                         </div>
                    </div>

               </div>
          </div>
     </section>


     <!-- FEATURE -->
     <section id="feature" data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row">

                    <div class="col-md-12 col-sm-12">
                         <div class="section-title">
                              <h1>Nossos serviços</h1>
                         </div>
                    </div>

                    <div class="col-md-6 col-sm-6">
                         <ul class="nav nav-tabs" role="tablist">
                              <li class="active"><a href="#tab01" aria-controls="tab01" role="tab" data-toggle="tab">Sites</a></li>
                              <li><a href="#tab02" aria-controls="tab02" role="tab" data-toggle="tab">Apps</a></li>
                              <li><a href="#tab03" aria-controls="tab03" role="tab" data-toggle="tab">Suporte</a></li>
                         </ul>

                         <div class="tab-content">
                              <div class="tab-pane active" id="tab01" role="tabpanel">
                                   <div class="tab-pane-item">
                                        <h2>Design Minimalista</h2>
                                        <p>Nam feugiat a ante sollicitudin luctus. Quisque eget placerat massa. Ut quis ligula ornare, pellentesque velit eget, vestibulum est. Donec pretium tristique elit eget sodales. Pellentesque posuere.</p>
                                        <h2>Facilidade de uso</h2>
                                        <p>Aliquam massa massa, consectetur non mattis fringilla, sodales ac turpis. Morbi ac felis sagittis, faucibus mauris vitae, placerat mauris.</p>
                                   </div>
                              </div>


                              <div class="tab-pane" id="tab02" role="tabpanel">
                                   <div class="tab-pane-item">
                                        <h2>Compatibilidade entre Browsers</h2>
                                        <p>Nam maximus elit a metus luctus, a faucibus magna mattis. Ut malesuada viverra iaculis. Nunc euismod sit amet neque a tincidunt.</p>
                                        <h2>User Friendly</h2>
                                        <p>Maecenas maximus velit lorem, quis pharetra turpis fringilla id. Vestibulum tempor facilisis efficitur. Sed nec nisi sit amet nibh pellentesque elementum.</p>
                                        <h2>HTML5 & CSS3</h2>
                                        <p>In viverra ipsum ornare sapien rhoncus ullamcorper. Vivamus vitae risus ac mi vehicula sagittis. Nulla dictum magna sit amet pharetra aliquam.</p>
                                   </div>
                              </div>

                              <div class="tab-pane" id="tab03" role="tabpanel">
                                   <div class="tab-pane-item">
                                        <h2>Suporte rápido</h2>
                                        <p>Mauris rutrum est at fringilla pulvinar. Nam ligula urna, lobortis non scelerisque vel, molestie eu massa. Nullam mattis elit at tortor accumsan.</p>
                                        <h2>Gerenciamento profissional</h2>
                                        <p>Quisque ullamcorper sem quis sapien cursus efficitur. Sed id sodales ipsum. Morbi eleifend tempus erat sit amet vehicula. Nulla at posuere tellus, non mattis erat. Nulla id massa gravida.</p>
                                   </div>
                              </div>
                         </div>

                    </div>

                    <div class="col-md-6 col-sm-6">
                         <div class="feature-image">
                              <img src="assets/images/feature-mockup.png" class="img-responsive" alt="Thin Laptop">                             
                         </div>
                    </div>

               </div>
          </div>
     </section>


     <!-- ABOUT -->
     <section id="about" data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row">

                    <div class="col-md-offset-3 col-md-6 col-sm-12">
                         <div class="section-title">
                              <h1>Nosso time</h1>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-4">
                         <div class="team-thumb">
                              <img src="assets/images/team-image1.jpg" class="img-responsive" alt="André Oliveira">
                              <div class="team-info team-thumb-up">
                                   <h2>André Oliveira</h2>
                                   <small>Diretor de Arte</small>
                                   <p>Lorem ipsum dolor sit amet, consectetur adipisicing eiusmod tempor incididunt ut labore et dolore magna.</p>
                              </div>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-4">
                         <div class="team-thumb">
                              <div class="team-info team-thumb-down">
                                   <h2>Fabiana Marques</h2>
                                   <small>Gerente Sênior</small>
                                   <p>Lorem ipsum dolor sit amet, consectetur adipisicing eiusmod tempor incididunt ut labore et dolore magna.</p>
                              </div>
                              <img src="assets/images/team-image2.jpg" class="img-responsive" alt="Fabiana Marques">
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-4">
                         <div class="team-thumb">
                              <img src="assets/images/team-image3.jpg" class="img-responsive" alt="Daniel Gomes">
                              <div class="team-info team-thumb-up">
                                   <h2>Daniel Gomes</h2>
                                   <small>CEO / Fundador</small>
                                   <p>Lorem ipsum dolor sit amet, consectetur adipisicing eiusmod tempor incididunt ut labore et dolore magna.</p>
                              </div>
                         </div>
                    </div>
                    
               </div>
          </div>
     </section>


     <!-- TESTIMONIAL -->
     <section id="testimonial" data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row">

                    <div class="col-md-6 col-sm-12">
                         <div class="testimonial-image"></div>
                    </div>

                    <div class="col-md-6 col-sm-12">
                         <div class="testimonial-info">
                              
                              <div class="section-title">
                                   <h1>O que dizem sobre nós</h1>
                              </div>

                              <div class="owl-carousel owl-theme">
                                   <div class="item">
                                        <h3>Vestibulum tempor facilisis efficitur. Sed nec nisi sit amet nibh pellentesque elementum. In viverra ipsum ornare sapien rhoncus ullamcorper.</h3>
                                        <div class="testimonial-item">
                                             <img src="assets/images/tst-image1.jpg" class="img-responsive" alt="Miguel">
                                             <h4>Miguel</h4>
                                        </div>
                                   </div>

                                   <div class="item">
                                        <h3>Donec pretium tristique elit eget sodales. Pellentesque posuere, nunc id interdum venenatis, leo odio cursus sapien, ac malesuada nisl libero eget urna.</h3>
                                        <div class="testimonial-item">
                                             <img src="assets/images/tst-image2.jpg" class="img-responsive" alt="Sofia">
                                             <h4>Sofia</h4>
                                        </div>
                                   </div>

                                   <div class="item">
                                        <h3>Lorem ipsum dolor sit amet, consectetur adipisicing eiusmod tempor incididunt ut labore et dolore magna.</h3>
                                        <div class="testimonial-item">
                                             <img src="assets/images/tst-image3.jpg" class="img-responsive" alt="Bárbara">
                                             <h4>Bárbara</h4>
                                        </div>
                                   </div>
                              </div>

                         </div>
                    </div>
                    
               </div>
          </div>
     </section>  


     <!-- CONTACT -->
     <section id="contact" data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row">

                    <div class="col-md-offset-1 col-md-10 col-sm-12">
                         <form id="contact-form" role="form" action="#contact" method="post">
                              <div class="section-title">
                                   <h1>Diga oi pra gente</h1>
                              </div>

                              <div class="col-md-4 col-sm-4">
                                   <input type="text" class="form-control" placeholder="* Nome completo" name="nomeCompleto">
                              </div>
                              <div class="col-md-4 col-sm-4">
                                   <input type="email" class="form-control" placeholder="* E-mail" name="email">
                              </div>
                              <div class="col-md-4 col-sm-4">
                                   <input type="submit" class="form-control" value="Enviar">
                              </div>
                              <div class="col-md-12 col-sm-12">
                                   <textarea class="form-control" rows="8" placeholder="* Sua mensagem" name="mensagem"></textarea>
                              </div>
                         </form>
                    </div>

               </div>
          </div>
     </section>       

<?php require_once "includes/footer-site.php"; ?>