<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema IFBA</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css" />

</head>

<body>
    <section>
        <h1>Sistema de Alunos IFBA</h1>
        <div class="login-box">
            <h2>Login</h2>
            <?php
            if (isset($_SESSION['nao_autenticado'])) :
            ?>
                <div class="notification is-danger">
                    <p>ERRO: Usuário ou senha inválidos.</p>
                </div>
            <?php
            endif;
            unset($_SESSION['nao_autenticado']);
            ?>
            <div class="user-box">
                <form action="login.php" method="POST">
                    <input name="usuario" name="text" class="input is-large" placeholder="Seu usuário" autofocus="">

                    <div class="user-box">
                        <div class="control">
                            <input name="senha" class="input is-large" type="password" placeholder="Sua senha">
                        </div>
                    </div>
                    <button class="button" type="submit">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        Entrar
                    </button>
                </form>
            </div>
        </div>
    </section>
</body>

</html>