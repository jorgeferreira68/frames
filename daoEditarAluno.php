<?php
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=devweb2","jorge","jorge123");
    }catch(PDOException $e){
        die("Não foi possível conectar. " . $e->getMessage());
    }

    try {
        include("../modelo/aluno.php");
        $aluno = new aluno();

        $idaluno = $_POST['idaluno'];
        $aluno->setNome($_POST['nome']);
        $aluno->setIdade($_POST['idade']);
        $aluno->setEmail($_POST['email']);
        $aluno->setCPF($_POST['cpf']);
        $aluno->setCidadeorigem($_POST['cidadeorigem']);
        $aluno->setEstadoorigem($_POST['estadoorigem']);
        $aluno->setLogin($_POST['login']);
        $aluno->setSenha($_POST['senha']);

        $sql = "update aluno set nome='" . $aluno->getNome() . "', idade='" . $aluno->getIdade() . "',
        cpf='" . $aluno->getCPF() ."', email='" . $aluno->getEmail() ."',cidadeorigem='" . $aluno->getCidadeorigem() . "'
        ,estadoorigem='" . $aluno->getEstadoorigem() . "',login='" . $aluno->getLogin() . "',senha=
        '" . $aluno->getSenha() . "',ra='" . $aluno->getRA() . "' where idaluno = ". $idaluno;
        $pdo->exec($sql);
        echo "<script>alert('Alterado com sucesso !!');</script>";
    } catch(PDOException $e) {
       echo "Erro ao alterar." . $sql. " --------- ". $e->getMessage();
    }
    header("refresh:0;url=/aula0403web2/visao/aluno/buscarAluno.php");
?>