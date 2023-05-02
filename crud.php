<?php
    include("conecta.php");

    $matricula = $_POST["matricula"];
    $nome      = $_POST["nome"];
    $idade     = $_POST["idade"];

    if(isset($_POST["inserir"]) )
    {
        $comando = $pdo->prepare("INSERT INTO alunos VALUE($matricula,'$nome',$idade)");
    }

    if(isset($_POST["excluir"]) )
    {
        $comando = $pdo->prepare("DELETE FROM alunos WHERE matricula=$matricula");
    }
   
    $resultado = $comando->execute();

    header("Location: cadastro.html");
?>