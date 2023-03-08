
<?php
session_start();
include('verifica_login.php');
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

<head>
    <meta charset="UTF-8">
    <title>Remover Aluno</title>

    <!-- REFERENCIAS PARA O BOOTSTRAP FUNCIONAR -->

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

</head>

<body>

    <?php

    include './conexao_bd.php';
    $cpf = $_GET["cpf"];
    $sql = "DELETE FROM alunos WHERE cpf = '$cpf' ";

    if (executarComando($sql) == true) {
        echo "<h2?>Aluno removido com sucesso</h2>";
    } else {
        echo "<h2>Erro ao remover o aluno</h2>";
    }
    ?>
    <a href="Admin.php">
        <input type="button" class="btn btn-warning" value="Voltar Admin" />
    </a>
</body>

</html>