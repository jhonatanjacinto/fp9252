<?php 

$lista_servicos = get_servicos(true); 

?>
<!-- SERVIÇOS -->
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

                              <?php foreach ($lista_servicos as $indice => $servico) : ?>
                                   <li class="<?= $indice == 0 ? 'active' : null ?>">
                                        <a href="#tab0<?= $indice ?>" aria-controls="tab0<?= $indice ?>" role="tab" data-toggle="tab">
                                             <?= $servico['nome_servico'] ?>
                                        </a>
                                   </li>
                              <?php endforeach; ?>

                              <!-- <li><a href="#tab02" aria-controls="tab02" role="tab" data-toggle="tab">Apps</a></li>
                              <li><a href="#tab03" aria-controls="tab03" role="tab" data-toggle="tab">Suporte</a></li> -->
                         </ul>

                         <div class="tab-content">

                              <?php foreach ($lista_servicos as $indice => $servico) : ?>
                                   <div class="tab-pane <?= $indice == 0 ? 'active' : null ?>" id="tab0<?= $indice ?>" role="tabpanel">
                                        <div class="tab-pane-item">
                                        <?= str_replace(PHP_EOL, '<br>', $servico['texto_servico']) ?>
                                        </div>
                                   </div>
                              <?php endforeach; ?>

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