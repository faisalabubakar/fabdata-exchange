<?php
// buy_data.php
session_start();
if (!isset($_SESSION['user_id'])) { header('Location: login.php'); exit; }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Buy Data</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header><h1>Buy Data</h1></header>
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
            <label>Data Plan:
                <select name="plan">
                    <option value="500mb">500MB</option>
                    <option value="1gb">1GB</option>
                    <option value="2gb">2GB</option>
                </select>
            </label><br>
            <button type="submit">Buy Data</button>
        </form>
    </main>
</body>
</html>
