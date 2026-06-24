<?php
session_start();
require_once __DIR__ . '/../auth/verifica_login.php';
require_once __DIR__ . '/../config/conexao_bd.php';
exigirAdmin();

$cpf = trim($_POST["txtCPF"] ?? '');
$nome = trim($_POST["txtNome"] ?? '');
$matricula = trim($_POST["txtMatricula"] ?? '');
$datanascimento = trim($_POST["txtDatanascimento"] ?? '');
$mae = trim($_POST["txtMae"] ?? '');
$pai = trim($_POST["txtPai"] ?? '');
$cep = trim($_POST["txtCep"] ?? '');
$endereco = trim($_POST["txtEndereco"] ?? '');
$telefone = trim($_POST["txtTelefone"] ?? '');
$turma = trim($_POST["txtTurma"] ?? '');

$sql = "INSERT INTO alunos(cpf,nome,matricula,datanascimento,endereco,telefone,mae,pai,turma,cep) VALUES (?,?,?,?,?,?,?,?,?,?)";
$salvo = validarCsrf() && $cpf !== '' && $nome !== '' && $matricula !== '' && executarComandoPreparado(
    $sql,
    'ssssssssss',
    array($cpf, $nome, $matricula, $datanascimento, $endereco, $telefone, $mae, $pai, $turma, $cep)
) == true;
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Cadastro de Aluno</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css?v=20260623">
    <link rel="stylesheet" href="../../assets/css/style.css?v=20260623">
</head>

<body>
    <main class="app-shell">
        <section class="message-panel">
            <?php if ($salvo) : ?>
                <h1>Aluno cadastrado</h1>
                <p>O registro foi salvo com sucesso.</p>
            <?php else : ?>
                <h1>Aluno nao cadastrado</h1>
                <p>Verifique se o CPF ja existe ou se os dados do banco estao corretos.</p>
            <?php endif; ?>

            <div class="form-actions">
                <a class="btn-modern btn-primary-modern" href="aluno_cadastrar.php">Cadastrar outro</a>
                <a class="btn-modern btn-secondary-modern" href="../admin/Admin.php">Voltar ao painel</a>
            </div>
        </section>
    </main>

    <script src="../../assets/js/bootstrap.bundle.min.js?v=20260623"></script>
    <script src="../../assets/js/app.js?v=20260623"></script>
</body>

</html>
