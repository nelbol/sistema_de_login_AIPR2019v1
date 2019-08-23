<?php

//É necessário fazer a conexão com o banco de Dados 
require_once "configDB.php";

function verificar_entrada($entrada){
    $saida = trim($entrada); // remove espaço antes e depois
    $saida = stripslashes($saida); // remove as baras
    $saida = htmlspecialchars($saida);
    return $saida;
}

if(isset($_POST['action']) && $_POST['action'] = 'cadastro'){
    //Pegar os campos do formulário
    $nomeCompleto = verificar_entrada($_POST['nomeCompleto']);
    $nomeUsuario = verificar_entrada($_POST['nomeUsuário']);
    $emailUsuario = verificar_entrada($_POST['emailUsuário']);
    $senhaUsuario = verificar_entrada($_POST['senhaUsuário']);
    $senhaConfirma = verificar_entrada($_POST['senhaConfirma']);
    $concordar = $_POST['concordar'];
    $dataCriacao = date("Y-m-d H:i:s");
    //Hash de senha / Codificação de senha em 40 caracteres
    $senha = sha1($senhaUsuario);
    $senhaC = sha1($senhaConfirma);

    echo "<h5>Nome completo: $nomeCompleto</h5>";
    echo "<h5>Nome Usuário: $nomeUsuario</h5>";
    echo "<h5>E-mail Usuário: $emailUsuario</h5>";
    echo "<h5>Senha Usuário: $senhaUsuario</h5>";
    echo "<h5>Senha Confirma: $senhaConfirma</h5>";
    echo "<h5>Concordar: $concordar</h5>";
    echo "<h5>Data De Criação: $dataCriacao</h5>";

    if($senha != $senhaC){
        echo "<h1>As senhas não conferem</h1>";
        exit();
    }else{
        echo"<h5> senha codificada: $senha</h5>";
    }


} else {
    echo "<h1 style='color:red'>Esta Página não pode ser acessada diretamente</h1>";
}