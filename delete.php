<?php 
    require 'config.php';

    $id = $_GET['id'];

    $stmt = $pdo->prepare("DELETE FROM pessoas WHERE id = ?");
    $stmt->execute([$id]);
    header('Location: index.php');
?>