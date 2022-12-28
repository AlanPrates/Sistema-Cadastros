<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Editar Alunos</title>

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
       include './conexao_bd.php';
       $cpf = $_POST["txtCPF"];
       
       $sql = "SELECT * FROM alunos WHERE cpf='$cpf'";
       
       $resultado = retornarDados($sql);

       $linha = mysqli_fetch_assoc($resultado);
       $nome =$linha["nome"];
       $endereco =$linha["endereco"];
       $telefone = $linha["telefone"];
       ?>

        <form name="formEditar" action="aluno_editar_salvar.php?cpf=<?php echo $cpf;?>" method="post">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                    <h2><p class="text-success">Editar Aluno</p></h2>

                        <div class="form-group">
                            <label><p class="text-success">Nome:</p></label>
                            <input value="<?php echo $linha["nome"]; ?>" type="text" class="form-control"  required="" placeholder="Nome completo" name="txtNome">
                        </div>
                        <div class="form-group">
                            <label><p class="text-success">Data de Nascimento:</p></label>
                            <input value="<?php echo $linha["datanascimento"]; ?>" id="date" type="date" class="form-control"  placeholder="Data de Nascimento"  name="txtDatanascimento">
                        </div>
                        <div class="form-group">
                            <label><p class="text-success">Endereço:</p></label>
                            <input value="<?php echo $linha["endereco"]; ?>" type="text" class="form-control"  placeholder="Endereço"  name="txtEndereco">
                        </div>


                        <div class="form-group">
                        <label><p class="text-success">Telefone:</p></label>
                            <input value="<?php echo $linha["telefone"]; ?>" type="text" class="form-control"  placeholder="Telefone" name="txtTelefone">
                        </div>

                        <div class="form-group">

                            <input type="submit" value="Editar" class="btn btn-info" name="btEditar">
                            <a href="aluno_remover.php?cpf=<?php echo $cpf;?>">
                            <input type="button" value="Remover" class="btn btn-danger" name="btRemover">
                            </a>
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
