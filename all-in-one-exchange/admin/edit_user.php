<?php
// admin/edit_user.php
session_start();
if (!isset($_SESSION['admin'])) { header('Location: login.php'); exit; }
require_once '../db.php';
$id = $_GET['id'] ?? null;
if (!$id) { die('User ID required.'); }
$user = $pdo->prepare('SELECT * FROM users WHERE id = ?');
$user->execute([$id]);
$user = $user->fetch();
if (!$user) { die('User not found.'); }
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pdo->prepare('UPDATE users SET name = ?, email = ? WHERE id = ?')->execute([$name, $email, $id]);
    header('Location: users.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="form-container">
        <h2>Edit User</h2>
        <form method="post">
            <input type="text" name="name" value="<?= htmlspecialchars($user['name']) ?>" required><br>
            <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required><br>
            <button type="submit">Save Changes</button>
        </form>
        <a href="users.php" class="header-btn">Cancel</a>
    </div>
</body>
</html>
