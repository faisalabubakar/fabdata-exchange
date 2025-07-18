<?php
// admin/reject_transaction.php
session_start();
if (!isset($_SESSION['admin'])) { header('Location: login.php'); exit; }
require_once '../db.php';
$id = $_GET['id'] ?? null;
if ($id) {
    $pdo->prepare('UPDATE transactions SET status = ? WHERE id = ?')->execute(['rejected', $id]);
}
header('Location: transactions.php');
exit;
