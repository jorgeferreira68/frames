<?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=devweb2","jorge","jorge123");
} catch (PDOException $e) {
    die("Não foi possível conectar. " . $e->getMessage());
}

try {
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];
    $logado = true;
    $sql = "select * from professor where cpf = '" . $cpf . "'";
    $resultado = $pdo->query($sql);
    if ($resultado->rowCount() > 0) {
        $aluno = $resultado->fetch();
        if ($professor['senha'] == $senha) {
            session_start();
            $_SESSION["cpf"] = $cpf;
            $_SESSION["nome"] = $professor['nome'];
        } else {
            $logado = false;
            echo "<script>alert('Senha incorreta!');</script>";
        }
    } else {
        $logado = false;
        echo "<script>alert('Login não encontrado!');</script>";
    }
} catch (PDOException $e) {
    echo "Inserido com sucesso." . $sql . " --------- " . $e->getMessage();
}
if($logado){
    header("refresh:0;url=/aula0403web2/index.php");
}else{
    header("refresh:0;url=/aula0403web2/visao/loginp.php");
}