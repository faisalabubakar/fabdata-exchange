<?php
// crypto.php
session_start();
if (!isset($_SESSION['user_id'])) { header('Location: login.php'); exit; }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Crypto Trading</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header><h1>Crypto Trading</h1></header>
    <main>
        <form method="post">
            <label>Crypto Type:
                <select name="crypto_type">
                    <option value="btc">Bitcoin (BTC)</option>
                    <option value="eth">Ethereum (ETH)</option>
                    <option value="usdt">Tether (USDT)</option>
                </select>
            </label><br>
            <label>Action:
                <select name="action">
                    <option value="buy">Buy</option>
                    <option value="sell">Sell</option>
                </select>
            </label><br>
            <label>Amount: <input type="number" name="amount" required></label><br>
            <button type="submit">Proceed</button>
        </form>
    </main>
</body>
</html>
