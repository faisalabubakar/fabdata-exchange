<?php
// admin/transactions.php
session_start();
if (!isset($_SESSION['admin'])) { header('Location: login.php'); exit; }
require_once '../db.php';
$transactions = $pdo->query('SELECT * FROM transactions ORDER BY created_at DESC LIMIT 100')->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Transactions - Admin</title>
    <link rel="stylesheet" href="../style.css">
    <style>
        table { width: 100%; border-collapse: collapse; margin-top: 2rem; }
        th, td { padding: 0.7rem; border: 1px solid #ddd; text-align: left; }
        th { background: #1a237e; color: #fff; }
        tr:nth-child(even) { background: #f8fafc; }
    </style>
</head>
<body>
    <header><div class="header-content"><h1>Transactions</h1><a href="dashboard.php" class="header-btn">Back to Dashboard</a></div></header>
    <main>
        <table>
            <tr><th>ID</th><th>User ID</th><th>Service</th><th>Details</th><th>Amount</th><th>Status</th><th>Date</th><th>Actions</th></tr>
            <?php foreach ($transactions as $t): ?>
            <tr>
                <td><?= htmlspecialchars($t['id']) ?></td>
                <td><?= htmlspecialchars($t['user_id']) ?></td>
                <td><?= htmlspecialchars($t['service']) ?></td>
                <td><?= htmlspecialchars($t['details']) ?></td>
                <td><?= htmlspecialchars($t['amount']) ?></td>
                <td><?= htmlspecialchars($t['status']) ?></td>
                <td><?= htmlspecialchars($t['created_at']) ?></td>
                <td>
                    <?php if ($t['status'] === 'pending'): ?>
                        <a href="approve_transaction.php?id=<?= $t['id'] ?>" class="header-btn">Approve</a>
                        <a href="reject_transaction.php?id=<?= $t['id'] ?>" class="header-btn" style="background:#d32f2f;color:#fff;">Reject</a>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </main>
</body>
</html>
