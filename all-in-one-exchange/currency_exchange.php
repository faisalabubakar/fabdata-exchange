<?php
// currency_exchange.php
session_start();
if (!isset($_SESSION['user_id'])) { header('Location: login.php'); exit; }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Currency Exchange</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header><h1>Currency Exchange</h1></header>
    <main>
        <form method="post">
            <label>From Currency:
                <select name="from_currency">
                    <option value="usd">USD</option>
                    <option value="ngn">NGN</option>
                    <option value="eur">EUR</option>
                </select>
            </label><br>
            <label>To Currency:
                <select name="to_currency">
                    <option value="usd">USD</option>
                    <option value="ngn">NGN</option>
                    <option value="eur">EUR</option>
                </select>
            </label><br>
            <label>Amount: <input type="number" name="amount" required></label><br>
            <button type="submit">Exchange</button>
        </form>
    </main>
</body>
</html>
