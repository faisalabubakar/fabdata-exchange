<?php
// admin/analytics.php
session_start();
if (!isset($_SESSION['admin'])) { header('Location: login.php'); exit; }
require_once '../db.php';
// User and transaction stats
$totalUsers = $pdo->query('SELECT COUNT(*) FROM users')->fetchColumn();
$totalTrans = $pdo->query('SELECT COUNT(*) FROM transactions')->fetchColumn();
$pendingTrans = $pdo->query("SELECT COUNT(*) FROM transactions WHERE status = 'pending'")->fetchColumn();
$approvedTrans = $pdo->query("SELECT COUNT(*) FROM transactions WHERE status = 'approved'")->fetchColumn();
$rejectedTrans = $pdo->query("SELECT COUNT(*) FROM transactions WHERE status = 'rejected'")->fetchColumn();
// Transactions per day (last 7 days)
$days = [];
$counts = [];
for ($i = 6; $i >= 0; $i--) {
    $date = date('Y-m-d', strtotime("-$i days"));
    $days[] = $date;
    $stmt = $pdo->prepare('SELECT COUNT(*) FROM transactions WHERE DATE(created_at) = ?');
    $stmt->execute([$date]);
    $counts[] = $stmt->fetchColumn();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Analytics - Admin</title>
    <link rel="stylesheet" href="../style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .analytics-section { background: #fff; padding: 2rem; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.05); margin-bottom: 2rem; }
        .chart-container { width: 100%; max-width: 600px; margin: 2rem auto; }
    </style>
</head>
<body>
    <header><div class="header-content"><h1>Analytics</h1><a href="dashboard.php" class="header-btn">Back to Dashboard</a></div></header>
    <main>
        <div class="analytics-section">
            <h2>Platform Stats</h2>
            <ul>
                <li>Total Users: <strong><?= $totalUsers ?></strong></li>
                <li>Total Transactions: <strong><?= $totalTrans ?></strong></li>
                <li>Pending Transactions: <strong><?= $pendingTrans ?></strong></li>
                <li>Approved Transactions: <strong><?= $approvedTrans ?></strong></li>
                <li>Rejected Transactions: <strong><?= $rejectedTrans ?></strong></li>
            </ul>
        </div>
        <div class="analytics-section chart-container">
            <canvas id="transChart"></canvas>
        </div>
        <div class="analytics-section chart-container">
            <h3>Transactions (Last 7 Days)</h3>
            <canvas id="transPerDay"></canvas>
        </div>
    </main>
    <script>
        const ctx = document.getElementById('transChart').getContext('2d');
        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Pending', 'Approved', 'Rejected'],
                datasets: [{
                    data: [<?= $pendingTrans ?>, <?= $approvedTrans ?>, <?= $rejectedTrans ?>],
                    backgroundColor: ['#ffb300', '#43a047', '#d32f2f']
                }]
            },
            options: {
                plugins: { legend: { position: 'bottom' } }
            }
        });
        // Transactions per day (last 7 days)
        const ctx2 = document.getElementById('transPerDay').getContext('2d');
        new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: <?= json_encode($days) ?>,
                datasets: [{
                    label: 'Transactions',
                    data: <?= json_encode($counts) ?>,
                    backgroundColor: '#1a237e',
                }]
            },
            options: {
                plugins: { legend: { display: false } },
                scales: { y: { beginAtZero: true } }
            }
        });
    </script>
</body>
</html>
