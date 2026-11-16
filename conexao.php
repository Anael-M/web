<?php

$host = getenv("DB_HOST");
$port = getenv("DB_PORT");
$banco = getenv("DB_NAME");
$usuario = getenv("DB_USER");
$senha = getenv("DB_PASSWORD");

if (!$host || !$port || !$banco || !$usuario || !$senha) {
    error_log("Erro: uma ou mais variáveis DB_* não foram carregadas.");
    die("Configuração do banco incompleta.");
}

$conn = pg_connect(
    "host=$host port=$port dbname=$banco user=$usuario password=$senha connect_timeout=10"
);

if (!$conn) {
    error_log("Falha na conexão PostgreSQL.");
    die("Erro de conexão com o banco de dados.");
}
?>