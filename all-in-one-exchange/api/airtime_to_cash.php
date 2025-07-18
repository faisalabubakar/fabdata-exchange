<?php
require_once '../db.php';
header('Content-Type: application/json');
$data = json_decode(file_get_contents('php://input'), true);
$user_id = $data['user_id'] ?? null;
$network = $data['network'] ?? '';
$phone = $data['phone'] ?? '';
$amount = $data['amount'] ?? 0;
if ($user_id && $network && $phone && $amount) {
    $stmt = $pdo->prepare('INSERT INTO transactions (user_id, service, details, amount, status) VALUES (?, ?, ?, ?, ?)');
    $details = json_encode(['network' => $network, 'phone' => $phone]);
    $stmt->execute([$user_id, 'airtime_to_cash', $details, $amount, 'pending']);
    echo json_encode(['success' => true, 'message' => 'Airtime to cash request submitted.']);
} else {
    echo json_encode(['success' => false, 'message' => 'Missing parameters.']);
}
