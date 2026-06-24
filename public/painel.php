<?php
session_start();
require_once __DIR__ . '/../src/auth/verifica_login.php';
require_once __DIR__ . '/../src/config/conexao_bd.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Painel</title>
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
                    <p class="brand-title">Painel</p>
                    <p class="brand-subtitle">Ola, <?php echo h($_SESSION['usuario']); ?></p>
                </div>
            </div>
            <div class="topbar-actions">
                <a class="btn-modern btn-primary-modern" href="logout.php" data-modal-title="Sair do sistema" data-modal-message="Sua sessao sera encerrada." data-modal-confirm="Sair">Sair</a>
            </div>
        </header>

        <section class="action-grid">
            <article class="action-card">
                <h2>Cadastrar</h2>
                <p>Inclua novos alunos no sistema.</p>
                <a class="btn-modern btn-primary-modern" href="../src/aluno/aluno_cadastrar.php">Cadastrar aluno</a>
            </article>

            <article class="action-card">
                <h2>Listar</h2>
                <p>Consulte os alunos cadastrados.</p>
                <a class="btn-modern btn-secondary-modern" href="../src/aluno/aluno_listar.php">Listar alunos</a>
            </article>

            <article class="action-card">
                <h2>Pesquisar</h2>
                <p>Encontre registros para editar ou remover.</p>
                <a class="btn-modern btn-secondary-modern" href="../src/aluno/aluno_pesquisar.php">Pesquisar aluno</a>
            </article>
        </section>
    </main>

    <script src="../assets/js/bootstrap.bundle.min.js?v=20260623"></script>
    <script src="../assets/js/app.js?v=20260623"></script>
</body>

</html>
