<?php
// admin/delete_user.php
session_start();
if (!isset($_SESSION['admin'])) { header('Location: login.php'); exit; }
require_once '../db.php';
$id = $_GET['id'] ?? null;
if ($id) {
    $pdo->prepare('DELETE FROM users WHERE id = ?')->execute([$id]);
}
header('Location: users.php');
exit;
