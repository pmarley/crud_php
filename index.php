<?php
    require 'config.php';

    $stmt = $pdo->query("SELECT * FROM pessoas");
    $pessoas = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Cadastro de Pessoas</title>
</head>
<body>
    <h1>Cadastro de Pessoas</h1>
    <a id="btn-add" href="create.php">Adicionar Nova Pessoa</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($pessoas as $pessoa): ?>
            <tr>
                <td><?= $pessoa['id'] ?></td>
                <td><?= $pessoa['nome'] ?></td>
                <td><?= $pessoa['email'] ?></td>
                <td><?= $pessoa['telefone'] ?></td>
                <td>
                    <a id="btn-edit" href="edit.php?id=<?= $pessoa['id'] ?>">Editar</a>
                    <a id="btn-delete" href="delete.php?id=<?= $pessoa['id'] ?>">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>