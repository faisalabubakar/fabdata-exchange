<?php
// bill_payment.php
session_start();
if (!isset($_SESSION['user_id'])) { header('Location: login.php'); exit; }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bill Payment</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header><h1>Bill Payment</h1></header>
    <main>
        <form method="post">
            <label>Bill Type:
                <select name="bill_type">
                    <option value="electricity">Electricity</option>
                    <option value="water">Water</option>
                    <option value="internet">Internet</option>
                </select>
            </label><br>
            <label>Account/Reference: <input type="text" name="account" required></label><br>
            <label>Amount: <input type="number" name="amount" required></label><br>
            <button type="submit">Pay Bill</button>
        </form>
    </main>
</body>
</html>
