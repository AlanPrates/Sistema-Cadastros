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
    <title>Listar Alunos</title>

    <!-- REFERENCIAS PARA O BOOTSTRAP FUNCIONAR -->

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

</head>

<body>
    <?php

    $sql = "SELECT * FROM alunos ORDER BY nome";

    include './conexao_bd.php';

    $dados = retornarDados($sql);

    ?>
    <form name="formListar" action="" method="post">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <h2><p class="text-success">Listar Alunos</p></h2>
                    <div class="form-group">
                        <table class="table table-dark">
                            <tbody>
                                <tr>
                                    
                                    <td>CPF</td>
                                    <td>Nome</td>
                                    <td>Matricula</td>
                                    <td>Data de Nascimento</td>
                                    <td>Nome da Mãe</td>
                                    <td>Nome do Pai</td>
                                    <td>CEP</td>
                                    <td>Endereço</td>
                                    <td>Telefone</td>
                                    <td>Turma</td>

                                </tr>
                                
                                    
                                    <?php
                                    while ($linha = mysqli_fetch_assoc($dados)) 
                                    {
                                        $cpf = $linha ["cpf"];
                                        $nome = $linha ["nome"];
                                        $matricula = $linha ["matricula"];
                                        $datanascimento = $linha["datanascimento"];
                                        $mae = $linha ["mae"];
                                        $pai = $linha ["pai"];
                                        $cep = $linha ["cep"];
                                        $endereco = $linha ["endereco"];
                                        $telefone = $linha ["telefone"];
                                        $turma = $linha ["turma"];
                                    ?>
                                        <td><?php echo $cpf; ?></td>
                                        <td><?php echo $nome; ?></td>
                                        <td><?php echo $matricula; ?></td>
                                        <td><?php echo $datanascimento; ?></td>
                                        <td><?php echo $mae; ?></td>
                                        <td><?php echo $pai; ?></td>
                                        <td><?php echo $cep; ?></td>
                                        <td><?php echo $endereco; ?></td>
                                        <td><?php echo $telefone; ?></td>
                                        <td><?php echo $turma; ?></td>

                                    </tr>
                                    <?php
                                    }
                                    ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <a href="Admin.php">
            <input type="button" class="btn btn-warning" value="Voltar Admin" />
        </a>
        </div>
    </form>
</body>

</html>