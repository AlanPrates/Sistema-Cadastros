<?php
$target = 'src/aluno/aluno_cadastrar_salvar.php';
if (!empty($_SERVER['QUERY_STRING'])) {
    $target .= '?' . $_SERVER['QUERY_STRING'];
}

header('Location: ' . $target, true, 307);
exit();
