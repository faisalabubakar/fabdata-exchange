<?php
// dashboard.php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
require_once 'db.php';
$stmt = $pdo->prepare('SELECT name FROM users WHERE id = ?');
$stmt->execute([$_SESSION['user_id']]);
$user = $stmt->fetch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Welcome, <?php echo htmlspecialchars($user['name']); ?>!</h1>
        <nav>
            <ul>
                <li><a href="buy_data.php">Buy Data</a></li>
                <li><a href="buy_airtime.php">Buy Airtime</a></li>
                <li><a href="cable_sub.php">Cable Subscription</a></li>
                <li><a href="airtime_to_cash.php">Airtime to Cash</a></li>
                <li><a href="bill_payment.php">Bill Payment</a></li>
                <li><a href="exam_pin.php">Exam Pin</a></li>
                <li><a href="currency_exchange.php">Currency Exchange</a></li>
                <li><a href="crypto.php">Crypto Trading</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h2>Dashboard</h2>
        <p>Access all your services from the menu above.</p>
    </main>
</body>
</html>
