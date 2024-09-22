<?php
require 'config.php';

if (!isset($_GET['id'])) {
    die('ID não fornecido.');
}

$id = $_GET['id'];
$stmt = $pdo->prepare('SELECT * FROM pessoas WHERE id = ?');
$stmt->execute([$id]);
$pessoa = $stmt->fetch();

if (!$pessoa) {
    die('Pessoa não encontrada.');
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    $stmt = $pdo->prepare('UPDATE pessoas SET nome = ?, email = ?, telefone = ? WHERE id = ?');
    $stmt->execute([$nome, $email, $telefone, $id]);
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Editar Pessoa</title>
</head>
<body>
    <h1>Editar Pessoa</h1>
    <form method="post">
        Nome: <input type="text" name="nome" value="<?= htmlspecialchars($pessoa['nome']) ?>" required><br>
        Email: <input type="email" name="email" value="<?= htmlspecialchars($pessoa['email']) ?>" required><br>
        Telefone: <input type="text" name="telefone" value="<?= htmlspecialchars($pessoa['telefone']) ?>" required><br>
        <button type="submit">Atualizar</button>
    </form>
    <a href="index.php">Voltar</a>
</body>
</html>
