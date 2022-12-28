<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Pesquisar Alunos</title>

        <!-- REFERENCIAS PARA O BOOTSTRAP FUNCIONAR --> 

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    </head>
    <body>
        <form name="formPesquisar" action="aluno_editar.php" method="post">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h2><p class="text-success">Pesquisar Aluno</p></h2>
                        <div class="form-group">
                            <label><p class="text-success">CPF</p></label>
                            <input type="text" class="form-control" required="" placeholder="CPF do Aluno" name="txtCPF">
                        </div>
                        
                          

                        <div class="form-group">

                            <input type="submit" value="Pesquisar" class="btn btn-info" name="btPesquisar"  >
                            <a href="painel.php">
            <input type="button" class="btn btn-warning" value="Voltar Painel" />
        </a>
                        </div>

                    </div>
                </div>
            </div>
        </form>
        
    </body>
</html>
