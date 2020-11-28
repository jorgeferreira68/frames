<?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=devweb2","jorge","jorge123");
} catch (PDOException $e) {
    die("Não foi possível conectar. " . $e->getMessage());
}

try {
    $idAluno = $_POST['idaluno'];

    $sql = "delete from aluno where idaluno = " . $idAluno;
    $pdo->exec($sql);
    
    echo "<script>alert('Removido com sucesso !!');</script>";
} catch (PDOException $e) {
    echo "!Erro ao remover aluno." . $sql. " --------- " . $e->getMessage();
}
header("refresh:0;url=/aula0403web2/visao/aluno/buscarAluno.php");
?>