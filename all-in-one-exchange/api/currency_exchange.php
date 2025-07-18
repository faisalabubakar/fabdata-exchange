<?php
require_once '../db.php';
header('Content-Type: application/json');
$data = json_decode(file_get_contents('php://input'), true);
$user_id = $data['user_id'] ?? null;
$from_currency = $data['from_currency'] ?? '';
$to_currency = $data['to_currency'] ?? '';
$amount = $data['amount'] ?? 0;
if ($user_id && $from_currency && $to_currency && $amount) {
    $stmt = $pdo->prepare('INSERT INTO transactions (user_id, service, details, amount, status) VALUES (?, ?, ?, ?, ?)');
    $details = json_encode(['from' => $from_currency, 'to' => $to_currency]);
    $stmt->execute([$user_id, 'currency_exchange', $details, $amount, 'pending']);
    echo json_encode(['success' => true, 'message' => 'Currency exchange request submitted.']);
} else {
    echo json_encode(['success' => false, 'message' => 'Missing parameters.']);
}
