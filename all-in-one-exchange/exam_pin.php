<?php
// exam_pin.php
session_start();
if (!isset($_SESSION['user_id'])) { header('Location: login.php'); exit; }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Exam Pin</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header><h1>Exam Pin</h1></header>
    <main>
        <form method="post">
            <label>Exam Type:
                <select name="exam_type">
                    <option value="waec">WAEC</option>
                    <option value="neco">NECO</option>
                    <option value="jamb">JAMB</option>
                </select>
            </label><br>
            <label>Quantity: <input type="number" name="quantity" required></label><br>
            <button type="submit">Buy Pin</button>
        </form>
    </main>
</body>
</html>
