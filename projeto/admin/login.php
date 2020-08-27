<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caeland&trade; | Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400');
        body { font-family: 'Open Sans', sans-serif; }
        .navbar-brand { font-weight: bold; }
    </style>
</head>
<body>
    <!-- TOPO LOGIN ADMIN -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark p-3">
        <span class="navbar-brand mb-0 h1">Caeland&trade;</span> <span class="navbar-text">Área Restrita | Login</span>
    </nav>

    <div class="container my-5">
        <form method="POST" action="" class="card mx-auto w-50">
            <div class="card-header p-5 text-center">
                <h3 class="h2 mb-0">Área Restrita</h3>
                <span>Utilize o formulário abaixo para acessar a Área Administrativa.</span>
            </div>

            <div class="card-body p-5">
                <div class="form-group">
                    <label>* Usuario:</label>
                    <input type="email" name="usuario" placeholder="usuario@email.com.br" class="form-control" />
                </div>
                <div class="form-group">
                    <label>* Senha:</label>
                    <input type="password" name="senha" placeholder="*****" class="form-control" />
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-lg">
                        Entrar
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- RODAPÉ DO ADMIN -->
    <footer class="container mt-3">
        <hr>
        <p>Copyright &copy; 2020 Caeland - Todos os direitos reservados.</p>
    </footer>
    
</body>
</html>