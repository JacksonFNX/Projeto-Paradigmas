<?php
    @session_start();
?>
<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="shortcut icon" href="PW.ico" >
    <link rel="stylesheet" href="estilo.css">
</head>

<body>
    <h1>LOGIN</h1>
    <div class="formulario">
        <section>
            <h3>FAÇA LOGIN PARA ACESSAR O PAINEL DE PACIENTES</h3>
            <?php
                @session_start();
                if(isset($_SESSION['nao_autenticado'])):
            ?>
                    <p class="erro">ERRO: Usuário ou senha inválidos.</p>
            <?php
                endif;
                unset($_SESSION['nao_autenticado']);
            ?>
            <?php
                @session_start();
                if(isset($_SESSION['realizar_login'])):
            ?>
                    <p class="erro" >ERRO: Efetue Login para acessar a página.</p>
            <?php
                endif;
                unset($_SESSION['realizar_login']);
            ?>
              <?php
            if(isset($_SESSION['campo_vazio'])):
        ?>
            <p class="erro">preencha todos os campos</p>

        <?php
            endif;
            unset($_SESSION['campo_vazio']);
        ?>

            <form action="login.php" method="POST">
                <input class="input" name="usuario" name="text"placeholder="Usuário" autofocus=""> <br> <br>
                <input class="input" name="senha"type="password" placeholder="Senha"> <br><br>
                <button class="botao" type="submit">Entrar</button>
                <br> <br>
                <p>Ainda não tem uma conta? <a href="cadastro.php">Cadastre-se.</a></p>

            </form>
        </section>
    </div>
</body>

</html>