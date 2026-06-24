<?php
session_start();
require_once __DIR__ . '/../auth/verifica_login.php';
require_once __DIR__ . '/../config/conexao_bd.php';
exigirAdmin();

$mensagem = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $acao = $_POST['acao'] ?? '';
    $usuarioId = (int) ($_POST['usuario_id'] ?? 0);
    $nivel = $_POST['nivel_acesso'] ?? '';

    if ($acao === 'criar') {
        $novoUsuario = trim($_POST['novo_usuario'] ?? '');
        $novaSenha = $_POST['nova_senha'] ?? '';

        if (!validarCsrf() || $novoUsuario === '' || $novaSenha === '' || !in_array($nivel, array('admin', 'moderador'), true)) {
            $mensagem = 'Preencha usuario, senha e nivel para criar o acesso.';
        } elseif (strlen($novaSenha) < 6) {
            $mensagem = 'A senha deve ter pelo menos 6 caracteres.';
        } else {
            $existe = retornarDadosPreparado("SELECT usuario_id FROM usuario WHERE usuario = ? LIMIT 1", 's', array($novoUsuario));
            if ($existe) {
                $mensagem = 'Ja existe um usuario com esse login.';
            } else {
                $senhaHash = password_hash($novaSenha, PASSWORD_DEFAULT);
                $ok = executarComandoPreparado(
                    "INSERT INTO usuario (usuario, senha, nivel_acesso) VALUES (?, ?, ?)",
                    'sss',
                    array($novoUsuario, $senhaHash, $nivel)
                );
                $mensagem = $ok ? 'Usuario criado com sucesso.' : 'Nao foi possivel criar o usuario.';
            }
        }
    } elseif (validarCsrf() && $usuarioId > 0 && in_array($nivel, array('admin', 'moderador'), true)) {
        if ($usuarioId === (int) $_SESSION['usuario_id'] && $nivel !== 'admin') {
            $mensagem = 'Voce nao pode remover seu proprio acesso de administrador.';
        } else {
            $ok = executarComandoPreparado(
                "UPDATE usuario SET nivel_acesso = ? WHERE usuario_id = ?",
                'si',
                array($nivel, $usuarioId)
            );
            $mensagem = $ok ? 'Nivel de acesso atualizado.' : 'Nao foi possivel atualizar o nivel.';
        }
    } else {
        $mensagem = 'Dados invalidos para atualizar o nivel de acesso.';
    }
}

$usuarios = retornarDados("SELECT usuario_id, usuario, nivel_acesso FROM usuario ORDER BY usuario");
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Usuarios</title>
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
                    <p class="brand-title">Usuarios</p>
                    <p class="brand-subtitle">Controle de nivel de acesso</p>
                </div>
            </div>
            <div class="topbar-actions">
                <a class="btn-modern btn-secondary-modern" href="Admin.php">Voltar ao painel</a>
                <a class="btn-modern btn-primary-modern" href="../../public/logout.php" data-modal-title="Sair do sistema" data-modal-message="Sua sessao sera encerrada." data-modal-confirm="Sair">Sair</a>
            </div>
        </header>

        <section class="panel">
            <?php if ($mensagem !== '') : ?>
                <div class="alert-modern"><?php echo h($mensagem); ?></div>
            <?php endif; ?>

            <div class="section-heading">
                <h2>Criar usuario</h2>
                <p>Cadastre um novo acesso e defina se ele sera admin ou moderador.</p>
            </div>

            <form method="post" class="form-grid user-create-form">
                <?php echo csrfInput(); ?>
                <input type="hidden" name="acao" value="criar">

                <div class="form-group">
                    <label for="novo_usuario">Usuario</label>
                    <input id="novo_usuario" class="form-control" type="text" name="novo_usuario" required maxlength="200" placeholder="Exemplo: moderador01">
                </div>

                <div class="form-group">
                    <label for="nova_senha">Senha inicial</label>
                    <input id="nova_senha" class="form-control" type="password" name="nova_senha" required minlength="6" placeholder="Minimo 6 caracteres">
                </div>

                <div class="form-group">
                    <label for="nivel_acesso">Nivel de acesso</label>
                    <select id="nivel_acesso" class="form-control" name="nivel_acesso">
                        <option value="moderador">Moderador</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>

                <div class="form-actions">
                    <button class="btn-modern btn-primary-modern" type="submit" data-modal-title="Criar usuario" data-modal-message="Deseja criar este novo usuario?" data-modal-confirm="Criar">Criar usuario</button>
                </div>
            </form>

            <div class="section-heading section-spaced">
                <h2>Usuarios existentes</h2>
                <p>Altere o nivel de acesso dos usuarios cadastrados.</p>
            </div>

            <div class="table-wrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Usuario</th>
                            <th>Nivel atual</th>
                            <th>Alterar nivel</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($usuarios) : ?>
                            <?php while ($usuarioLinha = mysqli_fetch_assoc($usuarios)) : ?>
                                <tr>
                                    <td><?php echo h($usuarioLinha['usuario']); ?></td>
                                    <td><?php echo h($usuarioLinha['nivel_acesso']); ?></td>
                                    <td>
                                        <form method="post" class="inline-form">
                                            <?php echo csrfInput(); ?>
                                            <input type="hidden" name="acao" value="alterar_nivel">
                                            <input type="hidden" name="usuario_id" value="<?php echo h($usuarioLinha['usuario_id']); ?>">
                                            <select class="form-control compact-control" name="nivel_acesso">
                                                <option value="admin" <?php echo $usuarioLinha['nivel_acesso'] === 'admin' ? 'selected' : ''; ?>>Admin</option>
                                                <option value="moderador" <?php echo $usuarioLinha['nivel_acesso'] === 'moderador' ? 'selected' : ''; ?>>Moderador</option>
                                            </select>
                                            <button class="btn-modern btn-primary-modern" type="submit" data-modal-title="Alterar nivel" data-modal-message="Deseja atualizar o nivel deste usuario?" data-modal-confirm="Atualizar">Salvar</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="3">Nenhum usuario encontrado.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>

    <script src="../../assets/js/bootstrap.bundle.min.js?v=20260623"></script>
    <script src="../../assets/js/app.js?v=20260623"></script>
</body>

</html>
