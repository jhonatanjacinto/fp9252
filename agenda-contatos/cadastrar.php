<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda - Cadastrar Contato</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand" href="index.php">
                <i class="far fa-calendar-check"></i>
                Agenda
                <span class="navbar-text"> / Cadastrar Contato</span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Alterna navegação">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Lista de Contatos</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="cadastrar.php">Cadastrar Contato</a>
                    </li>
                </ul>
            </div>
        </nav>
        <hr>

        <div class="alert alert-danger">
            Não foi possível cadastrar o contato
        </div>

        <div class="alert alert-success">
            Cadastro realizado com sucesso
        </div>

        <form class="card" method="POST">
            <div class="row p-3">
                <div class="form-group col-12">
                    <label>* Nome:</label>
                    <input type="text" name="nome_contato" class="form-control" placeholder="Digite o nome do contato..." />
                </div>
                <div class="form-group col-md-6">
                    <label>* E-mail:</label>
                    <input type="email" name="email_contato" class="form-control" placeholder="Digite o e-mail do contato..." />
                </div>
                <div class="form-group col-md-6">
                    <label>* Telefone:</label>
                    <input type="tel" name="tel_contato" class="form-control" placeholder="Digite o telefone do contato..." />
                </div>
                <div class="form-group col-12">
                    <button name="cadastrar_contato" class="btn btn-success">
                        Cadastrar
                    </button>
                </div>
            </div>
        </form>

        <hr>
        <footer>
            &copy; Agenda - Todos os direitos reservados.
        </footer>
    </div>
</body>

</html>