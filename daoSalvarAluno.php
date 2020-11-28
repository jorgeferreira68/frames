<?php
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=devweb2","jorge","jorge123");
    }catch(PDOException $e){
        die("Não foi possível conectar. " . $e->getMessage());
    }

    try {
        include("../modelo/aluno.php");
        $aluno = new aluno();

        $aluno->setNome($_POST['nome']);
        $aluno->setIdade($_POST['idade']);
        $aluno->setEmail($_POST['email']);
        $aluno->setCPF($_POST['cpf']);
        $aluno->setCidadeorigem($_POST['cidadeorigem']);
        $aluno->setEstadoorigem($_POST['estadoorigem']);
        $aluno->setLogin($_POST['login']);
        $aluno->setSenha($_POST['senha']);

        

        $sql = "INSERT INTO aluno (nome, idade,cpf, email,cidadeorigem,estadoorigem,login,senha,ra)
        VALUES ('" . $aluno->getNome() ."','" . $aluno->getIdade() . "', '" . $aluno->getCPF() ."',
        '" . $aluno->getEmail() ."', '" . $aluno->getCidadeorigem() . "', '" . $aluno->getEstadoorigem() . "',
        '" . $aluno->getLogin() . "', '" . $aluno->getSenha() . "', '" . $aluno->getRA() . "')";
        $pdo->exec($sql);
        echo "<script>alert('Inserido com sucesso !!');</script>";
    } catch(PDOException $e) {
       echo "Erro ao inserir." . $sql. " --------- ". $e->getMessage();
    }
    header("refresh:0;url=/aula0403web2/visao/aluno/cadastrarAluno.php");
?>