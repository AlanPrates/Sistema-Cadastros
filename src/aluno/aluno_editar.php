<?php
session_start();
require_once __DIR__ . '/../auth/verifica_login.php';
require_once __DIR__ . '/../config/conexao_bd.php';

$cpf = trim($_POST["txtCPF"] ?? '');
$sql = "SELECT * FROM alunos WHERE cpf = ? LIMIT 1";
$resultado = $cpf !== '' ? retornarDadosPreparado($sql, 's', array($cpf)) : false;
$linha = $resultado ? mysqli_fetch_assoc($resultado) : null;
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Editar Aluno</title>
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
                    <p class="brand-title">Editar aluno</p>
                    <p class="brand-subtitle">Atualize os dados do cadastro</p>
                </div>
            </div>
            <div class="topbar-actions">
                <a class="btn-modern btn-secondary-modern" href="aluno_pesquisar.php">Nova pesquisa</a>
                <a class="btn-modern btn-secondary-modern" href="../admin/Admin.php">Voltar ao painel</a>
            </div>
        </header>

        <?php if ($linha && isAdmin()) : ?>
            <section class="panel">
                <form name="formEditar" action="aluno_editar_salvar.php?cpf=<?php echo urlencode($cpf); ?>" method="post">
                    <?php echo csrfInput(); ?>
                    <div class="form-grid">
                        <div class="form-group">
                            <label>CPF</label>
                            <input type="text" class="form-control" value="<?php echo h($cpf); ?>" disabled>
                        </div>

                        <div class="form-group">
                            <label for="txtMatricula">Matricula</label>
                            <input id="txtMatricula" value="<?php echo h($linha["matricula"]); ?>" type="text" class="form-control" required placeholder="Matricula" name="txtMatricula">
                        </div>

                        <div class="form-group field-full">
                            <label for="txtNome">Nome completo</label>
                            <input id="txtNome" value="<?php echo h($linha["nome"]); ?>" type="text" class="form-control" required placeholder="Nome completo" name="txtNome">
                        </div>

                        <div class="form-group">
                            <label for="txtDatanascimento">Data de nascimento</label>
                            <input id="txtDatanascimento" value="<?php echo h($linha["datanascimento"]); ?>" type="text" class="form-control" placeholder="DD/MM/AAAA" name="txtDatanascimento" onkeyup="formataData(this, event)" maxlength="15">
                        </div>

                        <div class="form-group">
                            <label for="txtTurma">Turma</label>
                            <input id="txtTurma" value="<?php echo h($linha["turma"]); ?>" type="text" class="form-control" placeholder="Turma" name="txtTurma">
                        </div>

                        <div class="form-group">
                            <label for="txtMae">Nome da mae</label>
                            <input id="txtMae" value="<?php echo h($linha["mae"]); ?>" type="text" class="form-control" placeholder="Nome da mae" name="txtMae">
                        </div>

                        <div class="form-group">
                            <label for="txtPai">Nome do pai</label>
                            <input id="txtPai" value="<?php echo h($linha["pai"]); ?>" type="text" class="form-control" placeholder="Nome do pai" name="txtPai">
                        </div>

                        <div class="form-group">
                            <label for="txtCep">CEP</label>
                            <input id="txtCep" value="<?php echo h($linha["cep"]); ?>" type="text" class="form-control" placeholder="CEP" name="txtCep" onkeyup="formataCEP(this, event)" maxlength="15">
                        </div>

                        <div class="form-group">
                            <label for="txtTelefone">Telefone</label>
                            <input id="txtTelefone" value="<?php echo h($linha["telefone"]); ?>" type="text" class="form-control" placeholder="Telefone" name="txtTelefone" onkeyup="formataTelefone(this, event)" maxlength="15">
                        </div>

                        <div class="form-group field-full">
                            <label for="txtEndereco">Endereco</label>
                            <input id="txtEndereco" value="<?php echo h($linha["endereco"]); ?>" type="text" class="form-control" placeholder="Endereco" name="txtEndereco">
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn-modern btn-primary-modern" name="btEditar" data-modal-title="Salvar alteracoes" data-modal-message="Deseja atualizar os dados deste aluno?" data-modal-confirm="Salvar">Salvar alteracoes</button>
                    </div>
                </form>

                <form name="formRemover" action="aluno_remover.php" method="post" class="form-actions">
                    <?php echo csrfInput(); ?>
                    <input type="hidden" name="cpf" value="<?php echo h($cpf); ?>">
                    <button type="submit" class="btn-modern btn-danger" data-modal-title="Remover aluno" data-modal-message="Esta acao removera o cadastro do aluno selecionado." data-modal-confirm="Remover">Remover</button>
                </form>
            </section>
        <?php elseif ($linha) : ?>
            <section class="panel">
                <div class="table-wrap">
                    <table class="table">
                        <tbody>
                            <tr><th>CPF</th><td><?php echo h($cpf); ?></td></tr>
                            <tr><th>Nome</th><td><?php echo h($linha["nome"]); ?></td></tr>
                            <tr><th>Matricula</th><td><?php echo h($linha["matricula"]); ?></td></tr>
                            <tr><th>Data de nascimento</th><td><?php echo h($linha["datanascimento"]); ?></td></tr>
                            <tr><th>Mae</th><td><?php echo h($linha["mae"]); ?></td></tr>
                            <tr><th>Pai</th><td><?php echo h($linha["pai"]); ?></td></tr>
                            <tr><th>CEP</th><td><?php echo h($linha["cep"]); ?></td></tr>
                            <tr><th>Endereco</th><td><?php echo h($linha["endereco"]); ?></td></tr>
                            <tr><th>Telefone</th><td><?php echo h($linha["telefone"]); ?></td></tr>
                            <tr><th>Turma</th><td><?php echo h($linha["turma"]); ?></td></tr>
                        </tbody>
                    </table>
                </div>
                <div class="form-actions">
                    <a class="btn-modern btn-primary-modern" href="aluno_pesquisar.php">Pesquisar novamente</a>
                    <a class="btn-modern btn-secondary-modern" href="../admin/Admin.php">Voltar ao painel</a>
                </div>
            </section>
        <?php else : ?>
            <section class="message-panel">
                <h1>Aluno nao encontrado</h1>
                <p>Nenhum cadastro foi localizado para o CPF informado.</p>
                <div class="form-actions">
                    <a class="btn-modern btn-primary-modern" href="aluno_pesquisar.php">Pesquisar novamente</a>
                    <a class="btn-modern btn-secondary-modern" href="../admin/Admin.php">Voltar ao painel</a>
                </div>
            </section>
        <?php endif; ?>
    </main>

    <script src="../../assets/js/bootstrap.bundle.min.js?v=20260623"></script>
    <script src="../../assets/js/app.js?v=20260623"></script>
</body>

</html>
