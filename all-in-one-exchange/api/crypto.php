<?php
require_once '../db.php';
header('Content-Type: application/json');
$data = json_decode(file_get_contents('php://input'), true);
$user_id = $data['user_id'] ?? null;
$crypto_type = $data['crypto_type'] ?? '';
$action = $data['action'] ?? '';
$amount = $data['amount'] ?? 0;
if ($user_id && $crypto_type && $action && $amount) {
    $stmt = $pdo->prepare('INSERT INTO transactions (user_id, service, details, amount, status) VALUES (?, ?, ?, ?, ?)');
    $details = json_encode(['crypto_type' => $crypto_type, 'action' => $action]);
    $stmt->execute([$user_id, 'crypto', $details, $amount, 'pending']);
    echo json_encode(['success' => true, 'message' => 'Crypto transaction request submitted.']);
} else {
    echo json_encode(['success' => false, 'message' => 'Missing parameters.']);
}
