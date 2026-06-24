<?php
session_start();
require_once __DIR__ . '/../src/config/conexao_bd.php';

if (empty($_POST['usuario']) || empty($_POST['senha'])) {
    header('Location: loginAdmin.php');
    exit();
}

$usuario = trim($_POST['usuario']);
$senhaDigitada = $_POST['senha'];

$stmt = mysqli_prepare($conn, "SELECT usuario_id, usuario, senha, nivel_acesso FROM usuario WHERE usuario = ? LIMIT 1");
if (!$stmt) {
    $_SESSION['nao_autenticado'] = true;
    header('Location: loginAdmin.php');
    exit();
}

mysqli_stmt_bind_param($stmt, 's', $usuario);
mysqli_stmt_execute($stmt);
$resultado = mysqli_stmt_get_result($stmt);
$usuarioEncontrado = $resultado ? mysqli_fetch_assoc($resultado) : false;
mysqli_stmt_close($stmt);

$senhaBanco = $usuarioEncontrado ? $usuarioEncontrado['senha'] : '';
$senhaValida = false;
$senhaLegadaMd5 = false;

if ($usuarioEncontrado) {
    $infoHash = password_get_info($senhaBanco);
    if (!empty($infoHash['algo'])) {
        $senhaValida = password_verify($senhaDigitada, $senhaBanco);
    } else {
        $senhaLegadaMd5 = hash_equals($senhaBanco, md5($senhaDigitada));
        $senhaValida = $senhaLegadaMd5;
    }
}

if ($usuarioEncontrado && $senhaValida) {
    if ($senhaLegadaMd5) {
        $novoHash = password_hash($senhaDigitada, PASSWORD_DEFAULT);
        executarComandoPreparado(
            "UPDATE usuario SET senha = ? WHERE usuario_id = ?",
            'si',
            array($novoHash, $usuarioEncontrado['usuario_id'])
        );
    }

    session_regenerate_id(true);
    $_SESSION['usuario_id'] = $usuarioEncontrado['usuario_id'];
    $_SESSION['usuario'] = $usuarioEncontrado['usuario'];
    $_SESSION['nivel_acesso'] = $usuarioEncontrado['nivel_acesso'] ?: 'moderador';
    header('Location: ../src/admin/Admin.php');
    exit();
}

$_SESSION['nao_autenticado'] = true;
header('Location: loginAdmin.php');
exit();
