<?php
session_start();

if (!empty($_SESSION['usuario'])) {
    header('Location: ../src/admin/Admin.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Sistema de Cadastros</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css?v=20260623">
    <link rel="stylesheet" href="../assets/css/style.css?v=20260623">
</head>

<body>
    <main class="app-shell">
        <header class="topbar">
            <div class="brand">
                <span class="brand-mark">IF</span>
                <div>
                    <p class="brand-title">Sistema de Cadastros</p>
                    <p class="brand-subtitle">Gestao de alunos IFBA</p>
                </div>
            </div>
        </header>

        <section class="hero">
            <div>
                <h1>Cadastro de alunos com interface simples e organizada.</h1>
                <p>Registre novos alunos, consulte dados e mantenha as informacoes principais em um fluxo direto.</p>

                <div class="hero-stats">
                    <div class="stat">
                        <strong>CRUD</strong>
                        <span>Cadastro completo</span>
                    </div>
                    <div class="stat">
                        <strong>SQL</strong>
                        <span>Base MySQL</span>
                    </div>
                    <div class="stat">
                        <strong>PHP</strong>
                        <span>Sessao e rotas</span>
                    </div>
                </div>
            </div>

            <aside class="quick-card">
                <h2>Cadastro protegido</h2>
                <p>Entre com uma conta administrativa para cadastrar e gerenciar alunos.</p>
                <a class="btn-modern btn-primary-modern" href="loginAdmin.php">Logar no Sistema IFBA</a>
            </aside>
        </section>
    </main>

    <script src="../assets/js/bootstrap.bundle.min.js?v=20260623"></script>
    <script src="../assets/js/app.js?v=20260623"></script>
</body>

</html>
