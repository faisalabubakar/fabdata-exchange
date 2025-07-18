<?php
// Simple token-based authentication for API
require_once '../db.php';
header('Content-Type: application/json');

function generateToken($userId) {
    return base64_encode($userId . ':' . bin2hex(random_bytes(16)));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $email = $data['email'] ?? '';
    $password = $data['password'] ?? '';
    $stmt = $pdo->prepare('SELECT * FROM users WHERE email = ?');
    $stmt->execute([$email]);
    $user = $stmt->fetch();
    if ($user && password_verify($password, $user['password'])) {
        $token = generateToken($user['id']);
        echo json_encode(['success' => true, 'token' => $token, 'user_id' => $user['id']]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid credentials']);
    }
    exit;
}
echo json_encode(['success' => false, 'message' => 'Invalid request']);
