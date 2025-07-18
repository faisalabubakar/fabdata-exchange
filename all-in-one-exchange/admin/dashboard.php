<?php
// admin/dashboard.php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - FAB DATA & CURRENCY EXCHANGER</title>
    <link rel="stylesheet" href="../style.css">
    <style>
        .admin-nav { display: flex; gap: 2rem; margin-bottom: 2rem; }
        .admin-nav a { color: #1a237e; font-weight: bold; text-decoration: none; background: #ffb300; padding: 0.5rem 1.2rem; border-radius: 20px; transition: background 0.2s; }
        .admin-nav a:hover { background: #ffd54f; }
        .admin-section { background: #fff; padding: 2rem; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.05); margin-bottom: 2rem; }
    </style>
</head>
<body>
    <header>
        <div class="header-content">
            <h1>Admin Dashboard</h1>
            <nav class="admin-nav">
                <a href="dashboard.php">Overview</a>
                <a href="users.php">Manage Users</a>
                <a href="transactions.php">Transactions</a>
                <a href="services.php">Services</a>
                <a href="settings.php">Settings</a>
                <a href="logout.php">Logout</a>
            </nav>
        </div>
    </header>
    <main>
        <div class="admin-section" style="background:#fffbe7; border-left: 6px solid #ffb300;">
            <h2>Notifications</h2>
            <ul id="notifications">
                <li>Loading notifications...</li>
            </ul>
        </div>
        <div class="admin-section">
            <h2>Welcome, Admin!</h2>
            <p>Monitor and control all activities on FAB DATA & CURRENCY EXCHANGER. Use the navigation above to manage users, view transactions, update services, and adjust platform settings.</p>
            <a href="analytics.php" class="header-btn">View Analytics</a>
        </div>
        <div class="admin-section">
            <h3>Quick Stats</h3>
            <ul>
                <li>Total Users: <span id="total-users">Loading...</span></li>
                <li>Total Transactions: <span id="total-trans">Loading...</span></li>
                <li>Pending Transactions: <span id="pending-trans">Loading...</span></li>
            </ul>
        </div>
    </main>
    <script>
        // Demo: Replace with AJAX to fetch real stats and notifications
        document.getElementById('total-users').textContent = '120';
        document.getElementById('total-trans').textContent = '350';
        document.getElementById('pending-trans').textContent = '5';
        // Notifications (replace with AJAX in production)
        document.getElementById('notifications').innerHTML = `
            <li><strong>3</strong> new users registered today.</li>
            <li><strong>2</strong> new pending transactions.</li>
            <li>Last login: just now.</li>
        `;
    </script>
</body>
</html>
