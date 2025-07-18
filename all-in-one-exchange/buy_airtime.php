<?php
// buy_airtime.php
session_start();
if (!isset($_SESSION['user_id'])) { header('Location: login.php'); exit; }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Buy Airtime</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header><h1>Buy Airtime</h1></header>
    <main>
        <form method="post">
            <label>Network:
                <select name="network">
                    <option value="mtn">MTN</option>
                    <option value="glo">GLO</option>
                    <option value="airtel">Airtel</option>
                    <option value="9mobile">9mobile</option>
                </select>
            </label><br>
            <label>Phone Number: <input type="text" name="phone" required></label><br>
            <label>Amount: <input type="number" name="amount" required></label><br>
            <button type="submit">Buy Airtime</button>
        </form>
    </main>
</body>
</html>
