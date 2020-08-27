<?php

# Configurações Gerais
require_once 'config.php';

# Configurações da Página
$titulo_pagina = "Administração | Contatos";
$link_ativo = 'contatos';
require_once 'includes/header-admin.php';

?>
    <!-- CONTEUDO -->
    <div class="jumbotron container p-5 mb-5">
        <h1 class="h2">Contatos</h1>
        <hr>
        <p class="lead mb-0">
            Confira abaixo todas as mensagens enviadas pelo formulário de contato do site.
        </p>
    </div>
    <div class="container">
        <table class="table table-striped">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">E-mail</th>
                <th scope="col" width="40%">Mensagem</th>
                <th scope="col">Data</th>
                <th scope="col" width="5%"></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>mark@gmail.com</td>
                <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus, iste. Odio ab dolorum consequuntur qui debitis temporibus eum nobis, at voluptas aperiam, ratione quaerat voluptate dicta delectus pariatur quasi id.</td>
                <td>12/04/2020 às 18h00</td>
                <td>
                    <a href="" class="btn btn-danger" title="Excluir">
                        <i class="far fa-trash-alt"></i>
                    </a>
                </td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Mark</td>
                <td>mark@gmail.com</td>
                <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus, iste. Odio ab dolorum consequuntur qui debitis temporibus eum nobis, at voluptas aperiam, ratione quaerat voluptate dicta delectus pariatur quasi id.</td>
                <td>12/04/2020 às 18h00</td>
                <td>
                    <a href="" class="btn btn-danger" title="Excluir">
                        <i class="far fa-trash-alt"></i>
                    </a>
                </td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Mark</td>
                <td>mark@gmail.com</td>
                <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus, iste. Odio ab dolorum consequuntur qui debitis temporibus eum nobis, at voluptas aperiam, ratione quaerat voluptate dicta delectus pariatur quasi id.</td>
                <td>12/04/2020 às 18h00</td>
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
    