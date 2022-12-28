<?php
session_start();
include('verifica_login.php');
?>

<p><a class="text-success">
        <h2>Olá, <?php echo $_SESSION['usuario']; ?></h2>
    </a></p>
<a href="logout.php">
    <input type="button" class="btn btn-success" value=" Sair do Painel" />
</a>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>EXEMPLOS PRÁTICOS SOBRE PHP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
</head>

<body>
    <div class="area-box">
        <div class="row">
            <div class="col-sm-12">
                <h1>Gerenciamento de dados Alunos-IFBA </h1>
            </div>
        </div>

        <div class="row" style="margin-top: 20px">
            <div class="col-sm-12">
                <p><a class="text-info">
                        <h3>Cadastros de Alunos</h3>
                    </a></p>
                <a href="aluno_cadastrar.php">
                    <input type="button" class="btn btn-info" value="Cadastrar Alunos" />
                </a>
            </div>
        </div>

        <div class="row" style="margin-top: 20px">
            <div class="col-sm-12">
                <p><a class="text-warning">
                        <h3>Listar/Buscar Alunos</h3>
                    </a></p>
                <a href="aluno_listar.php">
                    <input type="button" class="btn btn-warning" value="Listar Alunos" />
                </a>
            </div>
        </div>
        <div class="row" style="margin-top: 20px">
            <div class="col-sm-12">
                <p><a class="text-success">
                        <h3>Editar e Remover - Atualizar e remover Alunos</h3>
                    </a></p>
                <a href="aluno_pesquisar.php">
                    <input type="button" class="btn btn-success" value=" Pesquisar Alunos" />
                </a>
            </div>
        </div>

    </div>

</body>

</html>