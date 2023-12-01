<?php
    @include("conexao.php");

    if(empty($_POST['busca_paciente'])){
        @session_start();
        $_SESSION['campo_vazio'] = true;
        header('Location: painel.php');
        exit();
    }else{
        @session_start();

        $busca_paciente = mysqli_real_escape_string($conexao, trim($_POST['busca_paciente']));

        $sql = "select * from login.pacientes where nome_paciente = '$busca_paciente'";
        $result = mysqli_query($conexao, $sql);
        $dados = mysqli_fetch_array($result);

        if(empty($dados['nome_paciente'])){
            @session_start();
            $_SESSION['nao_encontrado'] = true;
            header('Location: painel.php');
            exit();
        }else{
            $nome_pac = $dados['nome_paciente'];
            $idade_pac = $dados['idade_paciente'];
            $peso_pac = $dados['peso_paciente'];
            $altura_pac = $dados['altura_paciente'];
            $metro = $altura_pac/100;
            $id = $dados['id_paciente'];
            if($altura_pac != 0 && $peso_pac != 0){
                $imc = $peso_pac / ($metro * $metro);
            }else{
                $imc = 0;
            }
        }


    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <link rel="shortcut icon" href="PW.ico" >
    <title>Busca</title>
</head>
<body>
    <h1>Resultado da busca por <?php echo "'$busca_paciente'" ?>:</h1>
    <div class="formulario">
    <table class="tabela" border="1" >
            <tr>
                <th>NOME</th>
                <th>IDADE</th>
                <th>PESO</th>
                <th>ALTURA</th>
                <th>IMC</th>
                <th>ID</th>
            </tr>

            <tr>
                <td><?php echo "$nome_pac"; ?></td>
                <td><?php echo "$idade_pac"; ?></td>
                <td><?php echo "$peso_pac"; ?></td>
                <td><?php echo "$altura_pac"; ?></td>
                <td><?php echo number_format("$imc", 2); ?></td>
                <td><?php echo "$id"; ?></td>
            </tr>
            </table>
            <p><a href="cadastro_pacientes.php"><button  class="botao2">Cadastrar Pacientes</button></a></p>
            <p><a href="painel.php"><button  class="botao2">Voltar</button></a></p>
            <p><a href="logout.php"><button  class="sair">Sair</button></a></p>
    </div>
</body>
</html>