<?php
session_start();
require_once __DIR__ . '/../auth/verifica_login.php';
require_once __DIR__ . '/../config/conexao_bd.php';
exigirAdmin();

$cpf = trim($_POST["cpf"] ?? '');
$sql = "DELETE FROM alunos WHERE cpf = ?";
$removido = validarCsrf() && $cpf !== '' && executarComandoPreparado($sql, 's', array($cpf)) == true;
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Remover Aluno</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css?v=20260623">
    <link rel="stylesheet" href="../../assets/css/style.css?v=20260623">
</head>

<body>
    <main class="app-shell">
        <section class="message-panel">
            <?php if ($removido) : ?>
                <h1>Aluno removido</h1>
                <p>O cadastro foi removido com sucesso.</p>
            <?php else : ?>
                <h1>Erro ao remover</h1>
                <p>Nao foi possivel remover o cadastro selecionado.</p>
            <?php endif; ?>

            <div class="form-actions">
                <a class="btn-modern btn-primary-modern" href="aluno_pesquisar.php">Pesquisar outro</a>
                <a class="btn-modern btn-secondary-modern" href="../admin/Admin.php">Voltar ao painel</a>
            </div>
        </section>
    </main>

    <script src="../../assets/js/bootstrap.bundle.min.js?v=20260623"></script>
    <script src="../../assets/js/app.js?v=20260623"></script>
</body>

</html>
