<?php
session_start();
require_once __DIR__ . '/../auth/verifica_login.php';
require_once __DIR__ . '/../config/conexao_bd.php';

$itensPorPagina = 10;
$paginaAtual = isset($_GET['pagina']) ? (int) $_GET['pagina'] : 1;
$paginaAtual = max($paginaAtual, 1);

$totalResultado = mysqli_query($conn, "SELECT COUNT(*) AS total FROM alunos");
$totalLinha = $totalResultado ? mysqli_fetch_assoc($totalResultado) : array('total' => 0);
$totalAlunos = (int) $totalLinha['total'];
$totalPaginas = max((int) ceil($totalAlunos / $itensPorPagina), 1);
$paginaAtual = min($paginaAtual, $totalPaginas);
$offset = ($paginaAtual - 1) * $itensPorPagina;

$sql = "SELECT * FROM alunos ORDER BY nome LIMIT $itensPorPagina OFFSET $offset";
$dados = retornarDados($sql);
$inicioRegistro = $totalAlunos > 0 ? $offset + 1 : 0;
$fimRegistro = min($offset + $itensPorPagina, $totalAlunos);
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Listar Alunos</title>
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
                    <p class="brand-title">Alunos cadastrados</p>
                    <p class="brand-subtitle">Pagina <?php echo $paginaAtual; ?> de <?php echo $totalPaginas; ?></p>
                </div>
            </div>
            <div class="topbar-actions">
                <?php if (isAdmin()) : ?>
                    <a class="btn-modern btn-primary-modern" href="aluno_cadastrar.php">Novo aluno</a>
                <?php endif; ?>
                <a class="btn-modern btn-secondary-modern" href="../admin/Admin.php">Voltar ao painel</a>
            </div>
        </header>

        <section class="panel">
            <div class="list-summary">
                <span>
                    Exibindo <?php echo $inicioRegistro; ?>-<?php echo $fimRegistro; ?> de <?php echo $totalAlunos; ?> alunos
                </span>
                <span><?php echo $itensPorPagina; ?> registros por pagina</span>
            </div>

            <div class="table-wrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>CPF</th>
                            <th>Nome</th>
                            <th>Matricula</th>
                            <th>Nascimento</th>
                            <th>Mae</th>
                            <th>Pai</th>
                            <th>CEP</th>
                            <th>Endereco</th>
                            <th>Telefone</th>
                            <th>Turma</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($dados) : ?>
                            <?php while ($linha = mysqli_fetch_assoc($dados)) : ?>
                                <tr>
                                    <td><?php echo h($linha["cpf"]); ?></td>
                                    <td><?php echo h($linha["nome"]); ?></td>
                                    <td><?php echo h($linha["matricula"]); ?></td>
                                    <td><?php echo h($linha["datanascimento"]); ?></td>
                                    <td><?php echo h($linha["mae"]); ?></td>
                                    <td><?php echo h($linha["pai"]); ?></td>
                                    <td><?php echo h($linha["cep"]); ?></td>
                                    <td><?php echo h($linha["endereco"]); ?></td>
                                    <td><?php echo h($linha["telefone"]); ?></td>
                                    <td><?php echo h($linha["turma"]); ?></td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="10">Nenhum aluno encontrado.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <?php if ($totalPaginas > 1) : ?>
                <nav class="pagination-nav" aria-label="Paginacao de alunos">
                    <?php if ($paginaAtual > 1) : ?>
                        <a class="page-link-modern" href="?pagina=<?php echo $paginaAtual - 1; ?>">Anterior</a>
                    <?php else : ?>
                        <span class="page-link-modern is-disabled">Anterior</span>
                    <?php endif; ?>

                    <?php for ($pagina = 1; $pagina <= $totalPaginas; $pagina++) : ?>
                        <?php if ($pagina == $paginaAtual) : ?>
                            <span class="page-link-modern is-active"><?php echo $pagina; ?></span>
                        <?php else : ?>
                            <a class="page-link-modern" href="?pagina=<?php echo $pagina; ?>"><?php echo $pagina; ?></a>
                        <?php endif; ?>
                    <?php endfor; ?>

                    <?php if ($paginaAtual < $totalPaginas) : ?>
                        <a class="page-link-modern" href="?pagina=<?php echo $paginaAtual + 1; ?>">Proxima</a>
                    <?php else : ?>
                        <span class="page-link-modern is-disabled">Proxima</span>
                    <?php endif; ?>
                </nav>
            <?php endif; ?>
        </section>
    </main>

    <script src="../../assets/js/bootstrap.bundle.min.js?v=20260623"></script>
    <script src="../../assets/js/app.js?v=20260623"></script>
</body>

</html>
