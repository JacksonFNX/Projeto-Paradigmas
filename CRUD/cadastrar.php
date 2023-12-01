<?php

    if(empty($_POST['nome']) || empty($_POST['usuario']) || empty($_POST['senha'])){
    @session_start();
    $_SESSION['campo_vazio'] = true;
    header('Location: cadastro.php');
    exit();
    }else{
        @session_start();
        include("conexao.php");

        $nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
        $usuario = mysqli_real_escape_string($conexao, trim($_POST['usuario']));
        $senha = mysqli_real_escape_string($conexao, trim(md5($_POST['senha'])));

        $sql = "select count(*) as total from login where  usuario = '$usuario'";
        $result = mysqli_query($conexao, $sql);
        $row = mysqli_fetch_assoc($result);

        if($row['total'] != 0){
            $_SESSION['usuario_existe'] = true;
            header('Location: cadastro.php');
            exit;
        }

        $sql = "INSERT login (nome, usuario, senha, data_cadastro) VALUES ('$nome', '$usuario', '$senha', NOW())";

        if($conexao->query($sql)=== TRUE){
            $_SESSION['status_cadastro'] = true;
        }
        $conexao->close();

        header('Location: cadastro.php');
        exit;
    }
?>