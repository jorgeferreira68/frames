<?php
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=devweb2","jorge","jorge123");
    }catch(PDOException $e){
        die("Não foi possível conectar. " . $e->getMessage());
    }

    try {
        include("../modelo/professor.php");
        $professor = new professor();

        $idprofessor = $_POST['idprofessor'];
        $professor->setNome($_POST['nome']);
        $professor->setIdade($_POST['idade']);
        $professor->setEmail($_POST['email']);
        $professor->setCPF($_POST['cpf']);
        $professor->setCidadeorigem($_POST['cidadeorigem']);
        $professor->setEstadoorigem($_POST['estadoorigem']);
        $professor->setLogin($_POST['login']);
        $professor->setSenha($_POST['senha']);

        $sql = "update professor set nome='" . $professor->getNome() . "', idade='" . $professor->getIdade() . "',
        cpf='" . $professor->getCPF() ."', email='" . $professor->getEmail() ."',cidadeorigem='" . $professor->getCidadeorigem() . "'
        ,estadoorigem='" . $professor->getEstadoorigem() . "',login='" . $professor->getLogin() . "',senha=
        '" . $professor->getSenha() . "',rp='" . $professor->getRP() . "' where idprofessor = ". $idprofessor;
        $pdo->exec($sql);
        echo "<script>alert('Alterado com sucesso !!');</script>";
    } catch(PDOException $e) {
       echo "Erro ao alterar." . $sql. " --------- ". $e->getMessage();
    }
    header("refresh:0;url=/aula0403web2/visao/professor/buscarProfessor.php");
?>