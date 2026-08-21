<?php

$host = getenv("DB_HOST");
$port = getenv("DB_PORT");
$banco = getenv("DB_NAME");
$usuario = getenv("DB_USER");
$senha = getenv("DB_PASSWORD");

$conn = pg_connect(
    "host=$host port=$port dbname=$banco user=$usuario password=$senha"
);

if (!$conn) {
    die("Erro de conexão com o banco de dados.");
}

?>
