<?php
session_start();
require_once __DIR__ . '/../auth/verifica_login.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Pesquisar Aluno</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css?v=20260623">
    <link rel="stylesheet" href="../../assets/css/style.css?v=20260623">
    <script src="../../assets/js/mascaras.js" type="text/javascript"></script>
</head>

<body>
    <main class="app-shell">
        <header class="topbar">
            <div class="brand">
                <span class="brand-mark">IF</span>
                <div>
                    <p class="brand-title">Pesquisar aluno</p>
                    <p class="brand-subtitle">Localize o cadastro pelo CPF</p>
                </div>
            </div>
            <div class="topbar-actions">
                <a class="btn-modern btn-secondary-modern" href="../admin/Admin.php">Voltar ao painel</a>
            </div>
        </header>

        <section class="panel">
            <form name="formPesquisar" action="aluno_editar.php" method="post">
                <div class="form-grid">
                    <div class="form-group field-full">
                        <label for="txtCPF">CPF do aluno</label>
                        <input id="txtCPF" type="text" class="form-control" required placeholder="Digite o CPF" name="txtCPF" onkeyup="formataCPF(this, event)" maxlength="15">
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-modern btn-primary-modern" name="btPesquisar">Pesquisar</button>
                    <a class="btn-modern btn-secondary-modern" href="../admin/Admin.php">Cancelar</a>
                </div>
            </form>
        </section>
    </main>

    <script src="../../assets/js/bootstrap.bundle.min.js?v=20260623"></script>
    <script src="../../assets/js/app.js?v=20260623"></script>
</body>

</html>
