<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

<head>
    <meta charset="UTF-8">
    <title> Editar Alunos</title>

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
    $nome = $_POST["txtNome"];
    $datanascimento = $_POST["txtDatanascimento"];
    $endereco = $_POST["txtEndereco"];
    $telefone = $_POST["txtTelefone"];

    $sql = "UPDATE alunos SET nome = '$nome', datanascimento = '$datanascimento', endereco = '$endereco',telefone = '$telefone' WHERE cpf = '$cpf'";

    if (executarComando($sql) == true) {
        echo "<h2>Aluno atualizado com sucesso</h2>";
    } else {
        echo "<h2>Erro ao atualizar o aluno</h2>";
    }
    ?>
    <a href="painel.php">
        <input type="button" class="btn btn-warning" value="Voltar Painel" />
    </a>
</body>

</html>