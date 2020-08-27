<?php

# Configurações Gerais
require_once 'config.php';

# Configurações da Página
$titulo_pagina = "Administração | Time";
$link_ativo = 'time';
require_once 'includes/header-admin.php';

?>

    <!-- CONTEUDO -->
    <div class="jumbotron container p-5 mb-5">
        <h1 class="h2 float-left">Time</h1>
        <a href="adicionar.html" class="btn btn-success float-right">
            Novo Colaborador
        </a>
        <div class="clearfix"></div>
        <hr>
        <p class="lead mb-0">
            Confira abaixo todos os colaboradores cadastrados no time da sua empresa.
        </p>
    </div>
    <div class="container">
        <table class="table table-striped">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Foto</th>
                <th scope="col">Nome completo</th>
                <th scope="col">Cargo</th>
                <th scope="col" width="40%">Minicurrículo</th>
                <th scope="col">Ativo?</th>
                <th scope="col" width="10%" colspan="2"></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td><img src="http://placehold.it/100x100" class="img-responsive"></td>
                <td>Mark Otto</td>
                <td>General Manager</td>
                <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro sapiente enim pariatur soluta, quia quisquam inventore dolorem illo aspernatur eius repellat dignissimos voluptatibus provident ea numquam ab cum delectus explicabo.</td>
                <td>Sim</td>
                <td>
                    <a href="editar.html" class="btn btn-primary" title="Editar">
                        <i class="far fa-edit"></i>
                    </a>
                </td>
                <td>
                    <a href="" class="btn btn-danger" title="Excluir">
                        <i class="far fa-trash-alt"></i>
                    </a>
                </td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td><img src="http://placehold.it/100x100" class="img-responsive"></td>
                <td>Mark Otto</td>
                <td>General Manager</td>
                <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro sapiente enim pariatur soluta, quia quisquam inventore dolorem illo aspernatur eius repellat dignissimos voluptatibus provident ea numquam ab cum delectus explicabo.</td>
                <td>Sim</td>
                <td>
                    <a href="editar.html" class="btn btn-primary" title="Editar">
                        <i class="far fa-edit"></i>
                    </a>
                </td>
                <td>
                    <a href="" class="btn btn-danger" title="Excluir">
                        <i class="far fa-trash-alt"></i>
                    </a>
                </td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td><img src="http://placehold.it/100x100" class="img-responsive"></td>
                <td>Mark Otto</td>
                <td>General Manager</td>
                <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro sapiente enim pariatur soluta, quia quisquam inventore dolorem illo aspernatur eius repellat dignissimos voluptatibus provident ea numquam ab cum delectus explicabo.</td>
                <td>Sim</td>
                <td>
                    <a href="editar.html" class="btn btn-primary" title="Editar">
                        <i class="far fa-edit"></i>
                    </a>
                </td>
                <td>
                    <a href="" class="btn btn-danger" title="Excluir">
                        <i class="far fa-trash-alt"></i>
                    </a>
                </td>
              </tr>
            </tbody>
          </table>
    </div>
    

<?php require_once 'includes/footer-admin.php'; ?>