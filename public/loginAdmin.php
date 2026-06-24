<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Administrativo</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css?v=20260623">
    <link rel="stylesheet" href="../assets/css/style.css?v=20260623">
</head>

<body>
    <main class="login-page">
        <section class="login-panel">
            <div class="brand">
                <span class="brand-mark">IF</span>
                <div>
                    <p class="brand-title">Sistema de Cadastros</p>
                    <p class="brand-subtitle">Acesso administrativo</p>
                </div>
            </div>

            <h1>Entrar</h1>
            <p>Informe suas credenciais para acessar o painel de alunos.</p>

            <?php if (isset($_SESSION['nao_autenticado'])) : ?>
                <div class="alert-modern">
                    Usuario ou senha invalidos.
                </div>
            <?php
            endif;
            unset($_SESSION['nao_autenticado']);
            ?>

            <form action="login.php" method="POST">
                <div class="form-group">
                    <label for="usuario">Usuario</label>
                    <input id="usuario" name="usuario" class="form-control" type="text" placeholder="Seu usuario" autofocus>
                </div>

                <div class="form-group">
                    <label for="senha">Senha</label>
                    <input id="senha" name="senha" class="form-control" type="password" placeholder="Sua senha">
                </div>

                <div class="form-actions">
                    <button class="button" type="submit">Entrar</button>
                    <a class="btn-modern btn-secondary-modern" href="index.php">Voltar</a>
                </div>
            </form>
        </section>
    </main>

    <script src="../assets/js/bootstrap.bundle.min.js?v=20260623"></script>
    <script src="../assets/js/app.js?v=20260623"></script>
</body>

</html>
