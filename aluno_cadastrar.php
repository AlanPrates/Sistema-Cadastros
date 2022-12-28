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
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

</head>

<body>

    <form name="formCadastrar" action="aluno_cadastrar_salvar.php" method="post">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                <h2><p class="text-success">Cadastrar Aluno</p></h2>
                    <div class="form-group">
                        <label><p class="text-success">CPF:</p></label>
                        <input type="text" class="form-control" required="" placeholder="CPF do aluno (a)" name="txtCPF">
                    </div>

                    <div class="form-group">
                    <label><p class="text-success">Nome:</p></label>
                        <input type="text" class="form-control" required="" placeholder="Nome completo" name="txtNome">
                    </div>
                    <div class="form-group">
                    <label><p class="text-success">Data de Nascimento:</p></label>
                        <input id="date" type="date" class="form-control" placeholder="00/00/0000" name="txtDatanascimento">
                    </div>
                    <div class="form-group">
                    <label><p class="text-success">Endereço:</p></label>
                        <input type="text" class="form-control" placeholder="Endereço" name="txtEndereco">
                    </div>


                    <div class="form-group">
                    <label><p class="text-success">Telefone:</p></label>
                        <input type="text" class="form-control" placeholder="Telefone"color="red" name="txtTelefone">
                    </div>

                        <input type="submit" value="Cadastrar" class="btn btn-info" name="btCadastrar">
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