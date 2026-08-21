<?php

include("conexao.php");

$id = $_GET['id'] ?? null;

if (!$id) {
    die("ID do usuário não informado.");
}

$sql = "DELETE FROM usuarios WHERE id = $1";

$resultado = pg_query_params($conn, $sql, [$id]);

if (!$resultado) {
    die("Erro ao excluir usuário.");
}

header("Location: listar.php");
exit;

?>
