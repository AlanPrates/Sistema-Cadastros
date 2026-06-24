<?php
session_start();
require_once __DIR__ . '/../auth/verifica_login.php';
require_once __DIR__ . '/../config/conexao_bd.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Painel Administrativo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css?v=20260623">
    <link rel="stylesheet" href="../../assets/css/style.css?v=20260623">
</head>

<body>
    <main class="app-shell">
        <header class="topbar">
            <div class="brand">
                <span class="brand-mark">IF</span>
                <div>
                    <p class="brand-title">Painel administrativo</p>
                    <p class="brand-subtitle">Ola, <?php echo h($_SESSION['usuario']); ?></p>
                </div>
            </div>
            <div class="topbar-actions">
                <a class="btn-modern btn-secondary-modern" href="../../public/index.php">Inicio</a>
                <?php if (isAdmin()) : ?>
                    <a class="btn-modern btn-secondary-modern" href="usuarios.php">Usuarios</a>
                <?php endif; ?>
                <a class="btn-modern btn-primary-modern" href="../../public/logout.php" data-modal-title="Sair do sistema" data-modal-message="Sua sessao sera encerrada." data-modal-confirm="Sair">Sair</a>
            </div>
        </header>

        <section class="page-header">
            <div>
                <h1>Gerenciamento de alunos</h1>
                <p>Perfil atual: <?php echo h(nivelAcessoAtual()); ?>.</p>
                <?php if (isset($_GET['acesso']) && $_GET['acesso'] === 'negado') : ?>
                    <div class="alert-modern">Seu nivel de acesso nao permite executar essa acao.</div>
                <?php endif; ?>
            </div>
        </section>

        <section class="action-grid">
            <?php if (isAdmin()) : ?>
                <article class="action-card">
                    <h2>Cadastrar</h2>
                    <p>Inclua um novo aluno com CPF, matricula, endereco, contato e turma.</p>
                    <a class="btn-modern btn-primary-modern" href="../aluno/aluno_cadastrar.php">Cadastrar aluno</a>
                </article>
            <?php endif; ?>

            <article class="action-card">
                <h2>Listar</h2>
                <p>Visualize todos os alunos cadastrados em uma tabela organizada.</p>
                <a class="btn-modern btn-secondary-modern" href="../aluno/aluno_listar.php">Listar alunos</a>
            </article>

            <article class="action-card">
                <h2><?php echo isAdmin() ? 'Pesquisar e editar' : 'Pesquisar'; ?></h2>
                <p><?php echo isAdmin() ? 'Localize um aluno pelo CPF para editar os dados ou remover o cadastro.' : 'Localize um aluno pelo CPF para consultar o cadastro.'; ?></p>
                <a class="btn-modern btn-secondary-modern" href="../aluno/aluno_pesquisar.php">Pesquisar aluno</a>
            </article>

            <?php if (isAdmin()) : ?>
                <article class="action-card">
                    <h2>Usuarios</h2>
                    <p>Altere o nivel de acesso entre administrador e moderador.</p>
                    <a class="btn-modern btn-secondary-modern" href="usuarios.php">Gerenciar usuarios</a>
                </article>
            <?php endif; ?>
        </section>
    </main>

    <script src="../../assets/js/bootstrap.bundle.min.js?v=20260623"></script>
    <script src="../../assets/js/app.js?v=20260623"></script>
</body>

</html>
