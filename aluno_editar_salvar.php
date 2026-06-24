<?php
$target = 'src/aluno/aluno_editar_salvar.php';
if (!empty($_SERVER['QUERY_STRING'])) {
    $target .= '?' . $_SERVER['QUERY_STRING'];
}

header('Location: ' . $target, true, 307);
exit();
