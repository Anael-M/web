<?php

include("conexao.php");

$nome = $_POST['nome'];
$email = $_POST['email'];

$sql = "INSERT INTO usuarios(nome,email)
VALUES('$nome','$email')";

if(mysqli_query($conexao,$sql)){
    echo "<h2>Usuário cadastrado com sucesso!</h2>";
}else{
    echo "<h2>Erro ao cadastrar usuário.</h2>";
}

?>

<br><br>

<a href="index.php">Voltar</a>