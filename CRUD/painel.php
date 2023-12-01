<?php
    @session_start();
    @include('verificar_login.php');

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="PW.ico" >
    <link rel="stylesheet" href="estilo.css">
    <title>Painel de Pacientes</title>
</head>
<body>
<h1>Olá, <?php echo $_SESSION['nome'];?>!</h1>

    <div class="formulario">
            <h3>BUSCAR PACIENTE</h3>
            <?php
                if(isset($_SESSION['campo_vazio'])):
            ?>
                    <p class="erro">preencha todos os campos</p>
            <?php
                endif;
                unset($_SESSION['campo_vazio']);
            ?>
            <?php
                if(isset($_SESSION['nao_encontrado'])):
            ?>
                    <p class="erro">Usuário não encontrado</p>
            <?php
                endif;
                unset($_SESSION['nao_encontrado']);
            ?>
            <form action="buscar_paciente.php" method="POST">
                <input class="buscar" name="busca_paciente" type="text" placeholder="Digite o nome do Paciente" autofocus>
                <button class="botao3" type="submit">Buscar</button>
            </form>
            <p><a href="tabela.php"><button  class="botao2">Tabela de Pacientes</button></a></p>
        <p><a href="cadastro_pacientes.php"><button  class="botao2">Cadastrar Pacientes</button></a></p>
        <p><a href="logout.php"><button  class="sair">Sair</button></a></p>
    </div>

</body>
</html>
    