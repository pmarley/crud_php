<?php 
    require 'config.php';

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $telefone = $_POST["telefone"];

        $stmt = $pdo->prepare("INSERT INTO pessoas (nome,email,telefone) VALUES (?, ?, ?)");
        $stmt->execute([$nome,$email,$telefone]);
        header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Criar Pessoa</title>
</head>
<body>
    <h1>Cadastrar Pessoa</h1>
    <form method="post">
        Nome: <input type="text" name="nome" required><br>
        Email: <input type="email" name="email" required><br>
        Telefone: <input type="text" name="telefone" required><br>
        <button type="submit">Cadastrar</button>
    </form>
    <a href="index.php">Voltar</a>
</body>
</html>