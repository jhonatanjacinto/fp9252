 <?php 
 
 $lista_membros = get_membros(true); 
 
 ?>

 <!-- ABOUT -->
     <section id="about" data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row">

                    <div class="col-md-offset-3 col-md-6 col-sm-12">
                         <div class="section-title">
                              <h1>Nosso time</h1>
                         </div>
                    </div>

                    <?php foreach ($lista_membros as $indice => $membro) : ?>
                         <?php if ($indice % 2 == 0) : ?>
                              <div class="col-md-4 col-sm-4">
                                   <div class="team-thumb">
                                        <img src="<?= get_imagem_url( $membro['foto'] ) ?>" class="img-responsive" alt="<?= $membro['nome'] ?>">
                                        <div class="team-info team-thumb-up">
                                             <h2><?= $membro['nome'] ?></h2>
                                             <small><?= $membro['cargo'] ?></small>
                                             <p><?= $membro['minicurriculo'] ?></p>
                                        </div>
                                   </div>
                              </div>
                         <?php else : ?>
                              <div class="col-md-4 col-sm-4">
                                   <div class="team-thumb">
                                        <div class="team-info team-thumb-down">
                                             <h2><?= $membro['nome'] ?></h2>
                                             <small><?= $membro['cargo'] ?></small>
                                             <p><?= $membro['minicurriculo'] ?></p>
                                        </div>
                                        <img src="<?= get_imagem_url( $membro['foto'] ) ?>" class="img-responsive" alt="<?= $membro['nome'] ?>">
                                   </div>
                              </div>
                         <?php endif; ?>
                    <?php endforeach; ?>

                    
               </div>
          </div>
     </section>