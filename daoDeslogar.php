<?php
session_start();
if (!isset($_SESSION["login"])){
    echo "<script>alert('Você deve estar logado para Deslogar');</script>";
}else{
    unset($_SESSION['login']); //remove uma variável de sessão
    unset($_SESSION['nome']); //remove uma variável de sessão
    session_unset(); //remove todas
    session_destroy(); //encerra a sessão e suas variáveis
    echo "<script>alert('Deslogado com sucesso!');</script>";
}
header("refresh:0;url=/aula0403web2/index.php");
?>