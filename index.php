<?php
require 'db.php';
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
}
$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT * FROM tasks WHERE user_id = ?");
$stmt->execute([$user_id]);
$tasks = $stmt->fetchAll();
?>

<a href="logout.php">Logout</a> | <a href="add_task.php">Add Task</a>
<h1>Your Tasks</h1>
<ul>
    <?php foreach ($tasks as $task): ?>
        <li>
            <?= htmlspecialchars($task['title']) ?> - <?= $task['completed'] ? 'Completed' : 'Pending' ?>
            <a href="complete_task.php?id=<?= $task['id'] ?>">Complete</a>
            <a href="edit_task.php?id=<?= $task['id'] ?>">Edit</a>
            <a href="delete_task.php?id=<?= $task['id'] ?>">Delete</a>
        </li>
    <?php endforeach; ?>
</ul>