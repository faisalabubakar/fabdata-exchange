<?php
// admin/users.php
session_start();
if (!isset($_SESSION['admin'])) { header('Location: login.php'); exit; }
require_once '../db.php';
$users = $pdo->query('SELECT id, name, email, created_at FROM users ORDER BY created_at DESC')->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Users - Admin</title>
    <link rel="stylesheet" href="../style.css">
    <style>
        table { width: 100%; border-collapse: collapse; margin-top: 2rem; }
        th, td { padding: 0.7rem; border: 1px solid #ddd; text-align: left; }
        th { background: #1a237e; color: #fff; }
        tr:nth-child(even) { background: #f8fafc; }
    </style>
</head>
<body>
    <header><div class="header-content"><h1>Manage Users</h1><a href="dashboard.php" class="header-btn">Back to Dashboard</a></div></header>
    <main>
        <table>
            <tr><th>ID</th><th>Name</th><th>Email</th><th>Joined</th><th>Actions</th></tr>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= htmlspecialchars($user['id']) ?></td>
                <td><?= htmlspecialchars($user['name']) ?></td>
                <td><?= htmlspecialchars($user['email']) ?></td>
                <td><?= htmlspecialchars($user['created_at']) ?></td>
                <td>
                    <a href="edit_user.php?id=<?= $user['id'] ?>" class="header-btn">Edit</a>
                    <a href="delete_user.php?id=<?= $user['id'] ?>" class="header-btn" onclick="return confirm('Delete this user?')">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </main>
</body>
</html>
