<?php
    include("conecta.php");

    $matricula = $_POST["matricula"];
    $nome      = $_POST["nome"];
    $idade     = $_POST["idade"];

    if(isset($_POST["gravar"]) )
    {
        $comando = $pdo->prepare("INSERT INTO alunos VALUE($matricula,'$nome',$idade)");
        $resultado = $comando->execute();
        header("Location: cadastro.html");
    }

    if(isset($_POST["excluir"]) )
    {
        $comando = $pdo->prepare("DELETE FROM alunos WHERE matricula=$matricula");
        $resultado = $comando->execute();
        header("Location: cadastro.html");
    }

    if(isset($_POST["alternar"]) )
    {
        $comando = $pdo->prepare("UPDATE alunos SET nome='$nome', idade=$idade WHERE matricula=$matricula");
        $resultado = $comando->execute();
        header("Location: cadastro.html");
    }
   
    if(isset($_POST["listar"]) )
    {
        $comando = $pdo->prepare("SELECT * FROM alunos");
        $resultado = $comando->execute();

        while($linhas=$comando->fetch() )
        {
            $n = $linhas["nome"];
            $m = $linhas["matricula"];
            $i = $linhas["idade"];
            echo
            ("
                $m $n $i <br> <br>
            ");
        }
    }
?>