<?php

$lista_depoimentos = get_depoimentos(true);

?>
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

                              <?php foreach ($lista_depoimentos as $depoimento) : ?>
                                   <div class="item">
                                        <h3><?= $depoimento['texto'] ?></h3>
                                        <div class="testimonial-item">
                                             <img src="<?= get_imagem_url( $depoimento['foto'] ) ?>" class="img-responsive" alt="<?= $depoimento['nome'] ?>">
                                             <h4><?= $depoimento['nome'] ?></h4>
                                        </div>
                                   </div>
                              <?php endforeach; ?>
                                   
                              </div>

                         </div>
                    </div>
                    
               </div>
          </div>
     </section>  