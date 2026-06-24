<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (empty($_SESSION['usuario'])) {
    header('Location: ../../public/index.php');
    exit();
}

function nivelAcessoAtual() {
    return $_SESSION['nivel_acesso'] ?? 'moderador';
}

function isAdmin() {
    return nivelAcessoAtual() === 'admin';
}

function exigirAdmin() {
    if (!isAdmin()) {
        header('Location: ../../src/admin/Admin.php?acesso=negado');
        exit();
    }
}
