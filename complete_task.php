<?php
require 'db.php';
$id = $_GET['id'];
$stmt = $pdo->prepare("UPDATE tasks SET completed = TRUE WHERE id = ?");
$stmt->execute([$id]);
header('Location: index.php');
?>
