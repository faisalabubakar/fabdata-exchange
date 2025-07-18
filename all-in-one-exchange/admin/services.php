<?php
// admin/services.php
session_start();
if (!isset($_SESSION['admin'])) { header('Location: login.php'); exit; }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Services - Admin</title>
    <link rel="stylesheet" href="../style.css">
    <style>
        .service-list { margin-top: 2rem; }
        .service-list li { margin-bottom: 1rem; font-size: 1.1rem; }
    </style>
</head>
<body>
    <header><div class="header-content"><h1>Manage Services</h1><a href="dashboard.php" class="header-btn">Back to Dashboard</a></div></header>
    <main>
        <ul class="service-list">
            <li>Buy/Sell VTU</li>
            <li>Buy Data</li>
            <li>Buy Airtime</li>
            <li>Cable Subscription</li>
            <li>Airtime to Cash</li>
            <li>Bill Payment</li>
            <li>Exam Pin</li>
            <li>Currency Exchange</li>
            <li>Crypto Trading</li>
        </ul>
        <p>Feature management coming soon (enable/disable, edit rates, etc.).</p>
    </main>
</body>
</html>
