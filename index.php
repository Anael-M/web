<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Cadastro</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>Cadastro de Usuários</h1>

    <form action="salvar.php" method="POST">

        <label>Nome</label>
        <input type="text" name="nome" required>

        <label>Email</label>
        <input type="email" name="email" required>

        <button type="submit">Cadastrar</button>

    </form>

    <br>

    <a href="listar.php" class="botao">Visualizar Usuários</a>
</div>

</body>
</html>