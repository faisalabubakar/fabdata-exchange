<?php
// cable_sub.php
session_start();
if (!isset($_SESSION['user_id'])) { header('Location: login.php'); exit; }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cable Subscription</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header><h1>Cable Subscription</h1></header>
    <main>
        <form method="post">
            <label>Provider:
                <select name="provider">
                    <option value="dstv">DSTV</option>
                    <option value="gotv">GOTV</option>
                    <option value="startimes">Startimes</option>
                </select>
            </label><br>
            <label>Smart Card Number: <input type="text" name="card" required></label><br>
            <label>Package: <input type="text" name="package" required></label><br>
            <button type="submit">Subscribe</button>
        </form>
    </main>
</body>
</html>
