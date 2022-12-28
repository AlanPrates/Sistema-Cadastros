<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

<head>
    <meta charset="UTF-8">
    <title>Cadastrar Aluno</title>

    <!-- REFERENCIAS PARA O BOOTSTRAP FUNCIONAR -->

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

</head>

<body>
<?php
    //Capturando os valores digitados
    //pelo usuário no formulário
    $cpf = $_POST["txtCPF"];
    $nome = $_POST["txtNome"];
    $datanascimento = $_POST["txtDatanascimento"];
    $endereco = $_POST["txtEndereco"];
    $telefone = $_POST["txtTelefone"];

    //inclue as funções de acesso a dados
    include './conexao_bd.php';

    //comando SQL a ser executado no banco de dados
    $sql = "INSERT INTO alunos(cpf,nome,datanascimento,endereco,telefone)"
        . " VALUES ('$cpf','$nome','$datanascimento','$endereco','$telefone')";

    if (executarComando($sql) == true) {
        echo "<h1>Aluno cadastrado</h1>";
    } else {
        echo "<h1>Aluno não cadastrado. Verique se o CPF já existe</h1>";
    }

    ?>

    <a href="painel.php">
        <input type="button" class="btn btn-warning" value="Voltar Painel" />
    </a>

</body>

</html>