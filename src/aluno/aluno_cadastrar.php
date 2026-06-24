<?php
session_start();
require_once __DIR__ . '/../auth/verifica_login.php';
require_once __DIR__ . '/../config/conexao_bd.php';
exigirAdmin();
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Cadastrar Aluno</title>
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
                    <p class="brand-title">Cadastro de aluno</p>
                    <p class="brand-subtitle">Preencha os dados principais do estudante</p>
                </div>
            </div>
            <div class="topbar-actions">
                <a class="btn-modern btn-secondary-modern" href="../admin/Admin.php">Voltar ao painel</a>
            </div>
        </header>

        <section class="panel">
            <form name="formCadastrar" action="aluno_cadastrar_salvar.php" method="post">
                <?php echo csrfInput(); ?>
                <div class="form-grid">
                    <div class="form-group">
                        <label for="txtCPF">CPF</label>
                        <input id="txtCPF" type="text" class="form-control" required placeholder="CPF do aluno" name="txtCPF" onkeyup="formataCPF(this, event)" maxlength="15">
                    </div>

                    <div class="form-group">
                        <label for="txtMatricula">Matricula</label>
                        <input id="txtMatricula" type="text" class="form-control" required placeholder="Matricula" name="txtMatricula">
                    </div>

                    <div class="form-group field-full">
                        <label for="txtNome">Nome completo</label>
                        <input id="txtNome" type="text" class="form-control" required placeholder="Nome completo" name="txtNome">
                    </div>

                    <div class="form-group">
                        <label for="txtDatanascimento">Data de nascimento</label>
                        <input id="txtDatanascimento" type="text" class="form-control" placeholder="DD/MM/AAAA" name="txtDatanascimento" onkeyup="formataData(this, event)" maxlength="15">
                    </div>

                    <div class="form-group">
                        <label for="txtTurma">Turma</label>
                        <input id="txtTurma" type="text" class="form-control" placeholder="Exemplo: STI31" name="txtTurma">
                    </div>

                    <div class="form-group">
                        <label for="txtMae">Nome da mae</label>
                        <input id="txtMae" type="text" class="form-control" required placeholder="Nome da mae" name="txtMae">
                    </div>

                    <div class="form-group">
                        <label for="txtPai">Nome do pai</label>
                        <input id="txtPai" type="text" class="form-control" placeholder="Nome do pai (opcional)" name="txtPai">
                    </div>

                    <div class="form-group">
                        <label for="txtCep">CEP</label>
                        <input id="txtCep" type="text" class="form-control" placeholder="CEP" name="txtCep" onkeyup="formataCEP(this, event)" maxlength="15">
                    </div>

                    <div class="form-group">
                        <label for="txtTelefone">Telefone</label>
                        <input id="txtTelefone" type="text" class="form-control" placeholder="Telefone" name="txtTelefone" onkeyup="formataTelefone(this, event)" maxlength="15">
                    </div>

                    <div class="form-group field-full">
                        <label for="txtEndereco">Endereco</label>
                        <input id="txtEndereco" type="text" class="form-control" placeholder="Endereco" name="txtEndereco">
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-modern btn-primary-modern" name="btCadastrar" data-modal-title="Confirmar cadastro" data-modal-message="Deseja salvar este aluno no banco de dados?" data-modal-confirm="Cadastrar">Cadastrar</button>
                    <a class="btn-modern btn-secondary-modern" href="../admin/Admin.php">Cancelar</a>
                </div>
            </form>
        </section>
    </main>

    <script src="../../assets/js/bootstrap.bundle.min.js?v=20260623"></script>
    <script src="../../assets/js/app.js?v=20260623"></script>
</body>

</html>
