<?php

session_start();
if (isset($_SESSION['nomeUsuario']))
    //Bloqueando usuários logados    
    header("location: profile.php");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css">
    <link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
    <title>Sistema de Login Sistemas TNX</title>
    <style>
        #caixaCadastro,
        #caixaRecuperarSenha,
        #alerta {
            display: none;
        }
    </style>
</head>

<body class="bg-dark">
    <main class="container mt-4">
        <!-- Conteúdo Principal -->

        <section class="row">
            <div class="col-lg-4 offset-lg-4" id="alerta">
                <div class="alert alert-success text-center">
                    <strong id="resultado"></strong>
                </div>
            </div>
        </section>

        <!-- Formulário de Login -->
        <section class="row mb-5">
            <div class="col-lg-4 offset-lg-4 bg-light rounded" id="caixaLogin">
                <h2 class="text-center mt-2">Entrada no sistema</h2>
                <form id="formLogin" class="p-2">

                    <div class="form-group">
                        <input type="text" name="nomeUsuario" 
                        id="nomeUsuario" class="form-control" 
                        placeholder="Nome do usuário" 
                        minlength="5" required 
                        value="<?php 
                        if(isset($_COOKIE['nomeUsuario']))  
                            echo $_COOKIE['nomeUsuario'];
                        ?>">
                    </div>

                    <div class="form-group">
                        <input type="password" name="senhaUsuario" 
                        id="senhaUsuario" class="form-control" 
                        placeholder="Senha" 
                        required minlength="6"
                        value="<?php 
                        if(isset($_COOKIE['senhaUsuario']))  
                            echo $_COOKIE['senhaUsuario'];
                        ?>">
                    </div>

                    <div class="form-group mt-5">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" 
                            name="lembrar" id="lembrar" 
                            class="custom-control-input" <?php 
                            if(isset($_COOKIE['nomeUsuario']))  
                                echo " checked";
                            ?>>

                            <label for="lembrar" class="custom-control-label">
                                Lembrar de mim.
                            </label>
                            <a href="#" id="btnEsqueci" class="float-right">
                                Esqueci a senha!
                            </a>
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="submit" value=":: Entrar ::" name="btnEntrar" id="btnEntrar" class="btn btn-primary btn-block">
                    </div>

                    <div class="form-group">
                        <p class="center">Novo usuário?
                            <a href="#" id="btnCadastrar">Cadastre-se aqui.</a>
                        </p>
                    </div>

                </form>
            </div>
        </section>

        <!-- Formulário de Cadastro -->
        <section class="row mb-5">
            <div class="col-lg-4 offset-lg-4 bg-light rounded" id="caixaCadastro">
                <h2 class="text-center">Cadastro de Usuário</h2>
                <form action="#" class="p-2" id="formCadastro">

                    <div class="form-group">
                        <input type="text" name="nomeCompleto" id="nomeCompleto" class="form-control" placeholder="Nome completo" required minlength="5">
                    </div>

                    <div class="form-group">
                        <input type="text" name="nomeUsuário" id="nomeUsuário" class="form-control" placeholder="Nome de Usuário" minlength="5" required>
                    </div>

                    <div class="form-group">
                        <input type="email" name="emailUsuário" id="emailUsuário" class="form-control" placeholder="E-mail de Usuário" required>
                    </div>

                    <div class="form-group">
                        <input type="url" name="urlAvatar" id="urlAvatar" 
                        class="form-control" 
                        placeholder="URL para imagem do seu perfil" required>
                    </div>

                    <div class="form-group">
                        <input type="password" name="senhaUsuário" id="senhaUsuário" class="form-control" placeholder="Digite sua senha" minlength="6" required>
                    </div>

                    <div class="form-group">
                        <input type="password" name="senhaConfirma" id="senhaConfirma" class="form-control" placeholder="Confirme a sua senha" required minlength="6">
                    </div>

                    <div class="form-group mt-5">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="concordar" id="concordar" class="custom-control-input">
                            <label for="concordar" class="custom-control-label">
                                Eu concordo com os
                                <a href="#"> termos e condições.</a>
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="submit" value=":: Cadastrar ::" class="btn btn-primary btn-block" id="btnRegistrar">
                    </div>

                    <div class="form-group">
                        <p class="text-center">
                            Já cadastrado?
                            <a href="#" id="btnJáCadastrado">
                                Entrar aqui.
                            </a>
                        </p>
                    </div>
                </form>
            </div>
        </section>

        <!-- Formulário de recuperação de senha -->
        <section class="row mb-5">
            <div class="col-lg-4 offset-lg-4 bg-light rounded" id="caixaRecuperarSenha">
                <h2 class="text-center">Gerar nova senha</h2>
                <form action="#" id="formSenha">

                    <div class="form-group">
                        <small class="text-muted">
                            Para gerar uma nova senha, digite seu e-mail
                            e receba as instruções.
                        </small>
                    </div>

                    <div class="form-group">
                        <input type="email" name="emailSenha" id="emailSenha" class="form-control" placeholder="E-mail" required>
                    </div>

                    <div class="form-group">
                        <input type="submit" value=":: Enviar e-mail ::" id="btnEnviarEmail" class="btn btn-primary btn-block">
                    </div>

                    <div class="form-group float-right">
                        <a href="#" id="btnVoltar">Voltar</a>
                    </div>
                </form>
            </div>
        </section>

    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.15.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>



    <script>
        /* jQuery */
        $(function() {
            //Front-end

            //Preparação dos dados para envio para o back-end
            //Envio dos dados do formulário de login
            $('#btnEntrar').click(function(e) {
                let formLogin = document.querySelector("#formLogin");
                if (formLogin.checkValidity()) {
                    e.preventDefault(); //Não recarregar a página
                    $.ajax({
                        url: 'recebe.php',
                        method: 'post',
                        data: $('#formLogin').serialize() + '&action=login',
                        success: function(resposta) {
                            $('#alerta').show();
                            $('#resultado').html(resposta);
                            if (resposta === "ok") {
                                //Redirecinamento
                                window.location = "profile.php";
                            }
                        }
                    });
                }
            });

            //Formulário de Cadastro de usuário
            $('#btnRegistrar').click(function(e) {
                let formCadastro = document.querySelector("#formCadastro");
                if (formCadastro.checkValidity()) {
                    e.preventDefault(); //Sem recarregar o formulário
                    $.ajax({
                        url: 'recebe.php',
                        method: 'post',
                        data: $('#formCadastro').serialize() + '&action=cadastro',
                        success: function(resposta) {
                            $('#alerta').show();
                            $('#resultado').html(resposta);
                        }
                    });
                }
            });

            //Formulário para mudar de senha
            $('#btnEnviarEmail').click(function(e) {
                let formSenha = document.querySelector('#formSenha');
                if (formSenha.checkValidity()) {
                    e.preventDefault(); //Não recarregar a página
                    $.ajax({
                        url: 'recebe.php',
                        method: 'post',
                        data: $('#formSenha').serialize() + '&action=senha',
                        success: function(resposta) {
                            $('#alerta').show();
                            $('#resultado').html(resposta);
                        }
                    });
                }
            });




            //Trocar da Tela de Login para Recuperar Senha
            $("#btnEsqueci").click(function() {
                $("#caixaLogin").hide();
                $("#caixaRecuperarSenha").show();
            });

            //Voltar para a tela de Login
            $("#btnVoltar").click(function() {
                $("#caixaLogin").show();
                $("#caixaRecuperarSenha").hide();
            });

            //Trocar de tela de Login para cadastro de usuário
            $('#btnCadastrar').click(function() {
                $("#caixaLogin").hide();
                $("#caixaCadastro").show();
            });

            //Voltar para a tela de Login
            $('#btnJáCadastrado').click(function() {
                $("#caixaLogin").show(); //mostrar
                $("#caixaCadastro").hide(); //ocultar
            });

            //jQuery Validation chão chão
            $("#formLogin").validate();
            $("#formSenha").validate();

            $.validator.setDefaults({
                success: "valid"
            });


            $("#formCadastro").validate({
                rules: {
                    senhaConfirma: {
                        equalTo: "#senhaUsuário"
                    }
                }
            });


        });

        /*
         * Translated default messages for the jQuery validation plugin.
         * Locale: PT_BR
         * https://gist.github.com/diegoprates/5047663
         */
        jQuery.extend(jQuery.validator.messages, {
            required: "Este campo &eacute; requerido.",
            remote: "Por favor, corrija este campo.",
            email: "Por favor, forne&ccedil;a um endere&ccedil;o eletr&ocirc;nico v&aacute;lido.",
            url: "Por favor, forne&ccedil;a uma URL v&aacute;lida.",
            date: "Por favor, forne&ccedil;a uma data v&aacute;lida.",
            dateISO: "Por favor, forne&ccedil;a uma data v&aacute;lida (ISO).",
            number: "Por favor, forne&ccedil;a um n&uacute;mero v&aacute;lido.",
            digits: "Por favor, forne&ccedil;a somente d&iacute;gitos.",
            creditcard: "Por favor, forne&ccedil;a um cart&atilde;o de cr&eacute;dito v&aacute;lido.",
            equalTo: "Por favor, forne&ccedil;a o mesmo valor novamente.",
            accept: "Por favor, forne&ccedil;a um valor com uma extens&atilde;o v&aacute;lida.",
            maxlength: jQuery.validator.format("Por favor, forne&ccedil;a n&atilde;o mais que {0} caracteres."),
            minlength: jQuery.validator.format("Por favor, forne&ccedil;a ao menos {0} caracteres."),
            rangelength: jQuery.validator.format("Por favor, forne&ccedil;a um valor entre {0} e {1} caracteres de comprimento."),
            range: jQuery.validator.format("Por favor, forne&ccedil;a um valor entre {0} e {1}."),
            max: jQuery.validator.format("Por favor, forne&ccedil;a um valor menor ou igual a {0}."),
            min: jQuery.validator.format("Por favor, forne&ccedil;a um valor maior ou igual a {0}.")
        });
    </script>
</body>

</html>