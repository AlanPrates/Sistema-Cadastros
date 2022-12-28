<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>EXEMPLOS PRÁTICOS SOBRE PHP</title>

        <!-- REFERENCIAS PARA O BOOTSTRAP FUNCIONAR --> 

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

        <!--------------------------------------------->
    </head>
    <body>
        <div class="container">
            <div class="row">

                <div class="col-sm-12">
                    <h1>Exemplos práticos sobre acesso a dados </h1>
                </div>
            </div>

            <div class="row" style="margin-top: 20px">
                <div class="col-sm-12">
                    <h3>Cadastros - INSERT</h3>
                    <a href="aluno_cadastrar.php">
                        <input type="button" class="btn btn-info" value="Cadastrar Alunos"/>
                    </a>
                </div>
            </div>

            <div class="row" style="margin-top: 20px">
                <div class="col-sm-12">
                    <h3>Listar/Buscar - SELECT</h3>
                    <a href="aluno_listar.php">
                        <input type="button" class="btn btn-warning" value="Listar Alunos"/>
                    </a>
                </div>
            </div>

            

            <div class="row" style="margin-top: 20px">
                <div class="col-sm-12">
                    <h3>Editar e Remover - UPDATE e DELETE</h3>
                    <a href="aluno_pesquisar.php">
                        <input type="button" class="btn btn-success" value=" Pesquisar Alunos"/>
                    </a>
                </div>
            </div>

        </div>
    </body>
</html>
