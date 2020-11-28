<?php
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=devweb2","jorge","jorge123");
    }catch(PDOException $e){
        die("Não foi possível conectar. " . $e->getMessage());
    }

    try {
        include("../modelo/professor.php");
        $professor = new professor();

        $professor->setNome($_POST['nome']);
        $professor->setIdade($_POST['idade']);
        $professor->setEmail($_POST['email']);
        $professor->setCPF($_POST['cpf']);
        $professor->setCidadeorigem($_POST['cidadeorigem']);
        $professor->setEstadoorigem($_POST['estadoorigem']);
        $professor->setLogin($_POST['login']);
        $professor->setSenha($_POST['senha']);

        

        $sql = "INSERT INTO professor (nome, idade,cpf, email,cidadeorigem,estadoorigem,login,senha,rp)
        VALUES ('" . $professor->getNome() ."','" . $professor->getIdade() . "', '" . $professor->getCPF() ."',
        '" . $professor->getEmail() ."', '" . $professor->getCidadeorigem() . "', '" . $professor->getEstadoorigem() . "',
        '" . $professor->getLogin() . "', '" . $professor->getSenha() . "', '" . $professor->getRP() . "')";
        $pdo->exec($sql);
        echo "<script>alert('Inserido com sucesso !!');</script>";
    } catch(PDOException $e) {
       echo "Erro ao inserir." . $sql. " --------- ". $e->getMessage();
    }
    header("refresh:0;url=/aula0403web2/visao/professor/cadastrarProfessor.php");
?>