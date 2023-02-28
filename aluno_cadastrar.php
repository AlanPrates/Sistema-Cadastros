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
    <script src="mascaras.js" type="text/javascript"></script>
</head>

<body>

    <form name="formCadastrar" action="aluno_cadastrar_salvar.php" method="post">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                <h2><p class="text-success">Cadastrar Aluno</p></h2>
                    <div class="form-group">
                        <label><p class="text-success">CPF:</p></label>
                        <input type="text" class="form-control" required="" placeholder="CPF do aluno (a)" name="txtCPF"onkeyup="formataCPF(this, event)" MaxLength="15">
                    </div>
                    <div class="form-group">
                    <label><p class="text-success">Nome:</p></label>
                        <input type="text" class="form-control" required="" placeholder="Nome completo" name="txtNome">
                    </div>
                    <div class="form-group">
                    <label><p class="text-success">Matricula:</p></label>
                        <input type="text" class="form-control" required="" placeholder="Matricula" name="txtMatricula">
                    </div>
                    <div class="form-group">
                    <label><p class="text-success">Data de Nascimento:</p></label>
                        <input id="date" type="" class="form-control" placeholder="DD/MM/YYYY" name="txtDatanascimento"onkeyup="formataData(this, event)" MaxLength="15">
                    </div>
                    <div class="form-group">
                    <label><p class="text-success">Nome da Mãe:</p></label>
                        <input type="text" class="form-control" required="" placeholder="Nome da Mãe" name="txtMae">
                    </div>
                    <div class="form-group">
                    <label><p class="text-success">Nome do Pai:</p></label>
                        <input type="text" class="form-control" placeholder="Nome Pai (Opcional)" name="txtPai">
                    </div>
                    <div class="form-group">
                    <label><p class="text-success">CEP:</p></label>
                        <input type="text" class="form-control" placeholder="CEP do Barrio" name="txtCep"onkeyup="formataCEP(this, event)" MaxLength="15">
                    </div>
                    <div class="form-group">
                    <label><p class="text-success">Endereço:</p></label>
                        <input type="text" class="form-control" placeholder="Endereço" name="txtEndereco">
                    </div>


                    <div class="form-group">
                    <label><p class="text-success">Telefone:</p></label>
                        <input type="text" class="form-control" placeholder="Telefone"color="red" name="txtTelefone" onkeyup="formataTelefone(this, event)" MaxLength="15">
                    </div>
                    <div class="form-group">
                    <label><p class="text-success">Turma:</p></label>
                        <input id="date" type="text-sucess" class="form-control" placeholder="Turma exemplo: STI31" name="txtTurma">
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