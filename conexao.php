
<?php

$host = getenv("DB_HOST");
$port = getenv("DB_PORT");
$banco = getenv("DB_NAME");
$usuario = getenv("DB_USER");
$senha = getenv("DB_PASSWORD");

$variaveis = [
    "DB_HOST" => $host,
    "DB_PORT" => $port,
    "DB_NAME" => $banco,
    "DB_USER" => $usuario,
    "DB_PASSWORD" => $senha
];

$ausentes = [];

foreach ($variaveis as $nome => $valor) {
    if ($valor === false || $valor === null || trim($valor) === "") {
        $ausentes[] = $nome;
    }
}

if (!empty($ausentes)) {
    error_log("Variáveis de ambiente ausentes: " . implode(", ", $ausentes));
    die("Configuração do banco incompleta.");
}

$conn = pg_connect(
    "host=" . $host .
    " port=" . $port .
    " dbname=" . $banco .
    " user=" . $usuario .
    " password=" . $senha .
    " connect_timeout=10"
);

if (!$conn) {
    error_log("Falha ao conectar ao PostgreSQL.");
    die("Não foi possível conectar ao banco de dados.");
}
