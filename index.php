<?php
session_start();
?>

<a href="loginAdmin.php">
    <input type="button" class="btn btn-success" value=" Acessar painel de Adiministrador" />
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
                <h1>Cadastros de dados Alunos-IFBA </h1>
            </div>
        </div>

        <div class="row" style="text-align: center">
            <div class="col-sm-12">
                <p><a class="text-info">
                        <h3>Inscreva-se</h3>
                    </a></p>
                <a href="aluno_cadastrar.php">
                    <input type="button" class="btn btn-info" value="Cadastrar Alunos" />
                </a>
            </div>
         </div>

    </div>
</body>

</html>