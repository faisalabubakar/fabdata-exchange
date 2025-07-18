<?php
require_once '../db.php';
header('Content-Type: application/json');
$data = json_decode(file_get_contents('php://input'), true);
$user_id = $data['user_id'] ?? null;
bill_type = $data['bill_type'] ?? '';
$account = $data['account'] ?? '';
$amount = $data['amount'] ?? 0;
if ($user_id && $bill_type && $account && $amount) {
    $stmt = $pdo->prepare('INSERT INTO transactions (user_id, service, details, amount, status) VALUES (?, ?, ?, ?, ?)');
    $details = json_encode(['bill_type' => $bill_type, 'account' => $account]);
    $stmt->execute([$user_id, 'bill_payment', $details, $amount, 'pending']);
    echo json_encode(['success' => true, 'message' => 'Bill payment request submitted.']);
} else {
    echo json_encode(['success' => false, 'message' => 'Missing parameters.']);
}
