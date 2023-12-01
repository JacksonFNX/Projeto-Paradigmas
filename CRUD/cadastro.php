<?php
    @session_start();
?>
<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastrar</title>
    <link rel="stylesheet" href="estilo.css">
    <link rel="shortcut icon" href="PW.ico" >
</head>

<body>
    <h1>CADASTRO</h1>
    <div class="formulario">
    <section>
        <h3 class="title has-text-grey">INSIRA SEUS DADOS PARA EFETUAR O CADASTRO</h3>
        <?php 
            if(isset($_SESSION['status_cadastro'])):
        ?>
             <p class="sucesso">Cadastro efetuado com Sucesso! Faça seu login <a href="login.php">aqui</a></p>      
        <?php
            endif;
            unset($_SESSION['status_cadastro']);
        ?>
        <?php
            if(isset($_SESSION['usuario_existe'])):
        ?>
            <p class="aviso">O usuário escolhido já existe. Informe outro e tente novamente.</p>
        <?php
            endif;
            unset($_SESSION['usuario_existe']);
        ?>
        <?php
            if(isset($_SESSION['campo_vazio'])):
        ?>
            <p class="erro">preencha todos os campos</p>

        <?php
            endif;
            unset($_SESSION['campo_vazio']);
        ?>
            <form action="cadastrar.php" method="POST">
                <input name="nome" type="text" class="input is-large" placeholder="Nome" autofocus>
                <br><br>
                <input name="usuario" type="text" class="input is-large" placeholder="Usuário">
                <br><br>
                <input name="senha"type="password" placeholder="Senha">
                <br><br>
                <button class="botao" type="submit" class="button is-block is-link is-large is-fullwidth">Cadastrar</button>
                <br>
                <p>Já está cadastrado? <a href="index.php">Faça login.</a></p>
            </form>
    </section>
    </div>
</body>

</html>