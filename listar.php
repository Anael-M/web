<?php

include("conexao.php");

$sql = "SELECT * FROM usuarios ORDER BY id";

$resultado = pg_query($conn, $sql);

if (!$resultado) {
    die("Erro ao consultar os usuários.");
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Usuários Cadastrados</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

<h1>Usuários Cadastrados</h1>

<table>

<tr>
    <th>ID</th>
    <th>Nome</th>
    <th>Email</th>
    <th>Data</th>
    <th>Ação</th>
</tr>

<?php

while ($usuario = pg_fetch_assoc($resultado)) {

    echo "<tr>";
    echo "<td>" . $usuario['id'] . "</td>";
    echo "<td>" . htmlspecialchars($usuario['nome']) . "</td>";
    echo "<td>" . htmlspecialchars($usuario['email']) . "</td>";
    echo "<td>" . $usuario['data_cadastro'] . "</td>";
    echo "<td><a href='excluir.php?id=" . $usuario['id'] . "'>Excluir</a></td>";
    echo "</tr>";

}

?>

</table>

<br>

<a href="index.php" class="botao">Novo Cadastro</a>

</div>

</body>
</html>
