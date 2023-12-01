<?php

    if(empty($_POST['nome_paciente']) || empty($_POST['idade_paciente']) || empty($_POST['altura_paciente']) || empty($_POST['peso_paciente'])){
        @session_start();
        $_SESSION['campo_vazio'] = true;
        header('Location: cadastro_pacientes.php');
        exit();
    }else{
        @session_start();
        include("conexao.php");

        $nome_paciente = mysqli_real_escape_string($conexao, trim($_POST['nome_paciente']));
        $idade_paciente = mysqli_real_escape_string($conexao, trim($_POST['idade_paciente']));
        $peso_paciente = mysqli_real_escape_string($conexao, trim($_POST['peso_paciente']));
        $altura_paciente = mysqli_real_escape_string($conexao, trim($_POST['altura_paciente']));

        $sql = "select count(*) as total from login.pacientes where nome_paciente = '$nome_paciente'";
        $result = mysqli_query($conexao, $sql);
        $row = mysqli_fetch_assoc($result);

        if($row['total'] != 0){
            $_SESSION['paciente_existe'] = true;
            header('Location: cadastro_pacientes.php');
            exit;
        }

        $sql = "INSERT login.pacientes (nome_paciente, idade_paciente, peso_paciente, altura_paciente) VALUES ('$nome_paciente', '$idade_paciente', '$peso_paciente', '$altura_paciente')";

        if($conexao->query($sql)=== TRUE){
            $_SESSION['paciente_status_cadastro'] = true;
        }
        $conexao->close();

        header('Location: cadastro_pacientes.php');
        exit;
    }
?>