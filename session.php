<?php
//Iniciando a sessão
session_start();
//Conectando com o banco de dados
require_once 'configDB.php';

if(isset($_SESSION['nomeUsuario'])){
    //echo "usuário logado!";
    $usuario = $_SESSION['nomeUsuario'];
    $sql = $conecta->prepare("SELECT * FROM usuario WHERE 
    nomeUsuario = ?");
    $sql->bind_param("s", $usuario);
    $sql->execute();
    $resultado = $sql->get_result();
    $linha = $resultado->fetch_array(MYSQLI_ASSOC);

    $nome = $linha['nome'];
    $email = $linha['email'];
    //Conversão de data e hora
    $d = $linha['dataCriacao'];
    $d = new DateTime($d);
    $dataCriacao = $d->format('d/m/Y H:i:s');

    $urlAvatar = $linha['avatar'];
}else{
    //Kick
    header("location: index.php");
}