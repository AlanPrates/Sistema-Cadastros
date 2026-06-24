<?php

$servidor = "localhost";
$usuario = "root";
$senha = "root";
$bd = "alunos";

global $conn;
$conn = mysqli_connect($servidor, $usuario, $senha, $bd);

if (!$conn) {
    die("Falha na conexao com o banco de dados.");
}

mysqli_set_charset($conn, "utf8mb4");

function h($valor) {
    return htmlspecialchars((string) $valor, ENT_QUOTES, 'UTF-8');
}

function csrfToken() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }

    return $_SESSION['csrf_token'];
}

function csrfInput() {
    return '<input type="hidden" name="csrf_token" value="' . h(csrfToken()) . '">';
}

function validarCsrf() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    return !empty($_POST['csrf_token'])
        && !empty($_SESSION['csrf_token'])
        && hash_equals($_SESSION['csrf_token'], $_POST['csrf_token']);
}

function bindParams($stmt, $types, $params) {
    $refs = array($types);
    foreach ($params as $key => $value) {
        $refs[] = &$params[$key];
    }

    return call_user_func_array(array($stmt, 'bind_param'), $refs);
}

function executarComando($sql) {
    global $conn;
    if (mysqli_query($conn, $sql)) {
        return true;
    }

    error_log("Erro SQL: " . mysqli_error($conn));
    return false;
}

function executarComandoPreparado($sql, $types, $params) {
    global $conn;
    $stmt = mysqli_prepare($conn, $sql);

    if (!$stmt) {
        error_log("Erro ao preparar SQL: " . mysqli_error($conn));
        return false;
    }

    if ($types !== '') {
        bindParams($stmt, $types, $params);
    }

    $ok = mysqli_stmt_execute($stmt);
    if (!$ok) {
        error_log("Erro ao executar SQL: " . mysqli_stmt_error($stmt));
    }

    mysqli_stmt_close($stmt);
    return $ok;
}

function executarComandoRetornarID($sql) {
    global $conn;
    if (mysqli_query($conn, $sql)) {
        return mysqli_insert_id($conn);
    }

    error_log("Erro SQL: " . mysqli_error($conn));
    return 0;
}

function retornarDados($sql) {
    global $conn;
    $resultado = mysqli_query($conn, $sql);

    if ($resultado === false) {
        error_log("Erro SQL: " . mysqli_error($conn));
        return false;
    }

    if (mysqli_num_rows($resultado) == 0) {
        return false;
    }

    return $resultado;
}

function retornarDadosPreparado($sql, $types, $params) {
    global $conn;
    $stmt = mysqli_prepare($conn, $sql);

    if (!$stmt) {
        error_log("Erro ao preparar SQL: " . mysqli_error($conn));
        return false;
    }

    if ($types !== '') {
        bindParams($stmt, $types, $params);
    }

    if (!mysqli_stmt_execute($stmt)) {
        error_log("Erro ao executar SQL: " . mysqli_stmt_error($stmt));
        mysqli_stmt_close($stmt);
        return false;
    }

    $resultado = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);

    if (!$resultado || mysqli_num_rows($resultado) == 0) {
        return false;
    }

    return $resultado;
}
