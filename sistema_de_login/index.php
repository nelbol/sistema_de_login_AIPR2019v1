<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css">
        <title>Sistema de Login TNX Systems</title>
    </head>
<body class="bg-dark">
    <main class="container mt-4">
    <!-- Conteúdo Principal -->

    <section class="row">
            <div class="col-lg-4 offset-lg-4" id="alerta">
                <div class="alert alert-success text-center">
                 <strong id="resultado">
                    Maravilhoso mundo sem o Sublime!
                 </strong>
                </div>
            </div>
    </section>

    

    <!-- Formulário de login -->
    <section class="row">
        <div class="col-lg-4 offset-lg-4 bg-light rounded" id="caixaLogin">
            <h2 class="text-center mt 2">Entrada no sistema</h2>
            <form action="#" id="formLogin" class="p-2">

                <div class="form-group">
                    <input type="text" name="nomeUsuário" id="nomeUsuário" class="form-control"
                    placeholder="Nome do usuário" required>
                </div>

                <div class="form-group">
                    <input type="password" name="senhaUsuário"
                    id="senhaUsuário" class="form-control"
                    placeholder="Senha" required>
                </div>

                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="lembrar" 
                        id="lembrar" class="custom-control-input">
                        
                        <label for="lembrar" class="custom-control-label">
                            Lembrar de mim.
                        </label>
                        <a href="#" id="btnEsqueci" class="float-right">
                            Esqueci a senha!
                        </a>
                    </div>
                </div>

                <div class="form-group">
                    <input type="submit" value="::Entrar::"
                    name="btnEntrar" id="btnEntrar"
                    class="btn btn-primary btn-block">
                </div>

                <div class="form-group">
                   <p class="center">Novo usuário?
                       <a href="#" id="btnCadastrar">Cadastre-se aqui.</a>
                   </p>
                </div>
                
            </form>
        </div>
    </section>

    </main>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.15.0/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>