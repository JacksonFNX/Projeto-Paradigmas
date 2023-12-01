<?php
    @session_start();
    @include('verificar_login.php');
?>
<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Cadastro de Pacientes</title>
    <link rel="stylesheet" href="estilo.css">
    <link rel="shortcut icon" href="PW.ico" >
</head>

<body>
    <h1>SISTEMA DE CADASTRO DE PACIENTES</h1>
    <div class="formulario">
        <section>
            <h3>INSIRA OS DADOS DO PACIENTE QUE DESEJA CADASTRAR</h3>
            <?php 
                if(isset($_SESSION['paciente_status_cadastro'])):
            ?>
                <p class="sucesso">Cadastro de paciente efetuado! Verifique o painel de pacientes <a href="painel.php">aqui</a></p>
            <?php
                endif;
                unset($_SESSION['paciente_status_cadastro']);
            ?>
            <?php
                if(isset($_SESSION['paciente_existe'])):
            ?>
                    <p class="aviso">O paciente que você está tentando cadastar já existe existe nosso banco de dados. Informe outro e tente novamente.</p>
            <?php
                endif;
                unset($_SESSION['paciente_existe']);
            ?>
            <?php
                if(isset($_SESSION['campo_vazio'])):
            ?>
                    <p class="erro">preencha todos os campos</p>
            <?php
                endif;
                unset($_SESSION['campo_vazio']);
            ?>
                <form action="cadastrar_pacientes.php" method="POST">
                    <input name="nome_paciente" type="text" placeholder="Nome do Paciente" autofocus>
                    <br><br>
                    <input name="idade_paciente" type="text" placeholder="Idade do Paciente">
                    <br><br>
                    <input name="peso_paciente" type="number" placeholder="Peso do Paciente">
                    <br><br>
                    <input name="altura_paciente"type="number" placeholder="Altura do Paciente (em centímetros)">
                    <br><br>
                    <button type="submit" class="botao">Cadastrar</button>
                </form>
        </section>
    </div>
    
</body>

</html>