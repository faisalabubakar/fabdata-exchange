<?php
// admin/settings.php
session_start();
if (!isset($_SESSION['admin'])) { header('Location: login.php'); exit; }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Settings - Admin</title>
    <link rel="stylesheet" href="../style.css">
    <style>
        .settings-section { background: #fff; padding: 2rem; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.05); margin-bottom: 2rem; }
    </style>
</head>
<body>
    <header><div class="header-content"><h1>Platform Settings</h1><a href="dashboard.php" class="header-btn">Back to Dashboard</a></div></header>
    <main>
        <div class="settings-section">
            <h2>General Settings</h2>
            <p>Feature coming soon: Update platform info, contact details, rates, and more.</p>
        </div>
    </main>
</body>
</html>
