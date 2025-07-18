<?php
require_once '../db.php';
header('Content-Type: application/json');
$data = json_decode(file_get_contents('php://input'), true);
$user_id = $data['user_id'] ?? null;
$network = $data['network'] ?? '';
$phone = $data['phone'] ?? '';
$plan = $data['plan'] ?? '';
if ($user_id && $network && $phone && $plan) {
    $stmt = $pdo->prepare('INSERT INTO transactions (user_id, service, details, amount, status) VALUES (?, ?, ?, ?, ?)');
    $details = json_encode(['network' => $network, 'phone' => $phone, 'plan' => $plan]);
    $amount = 500; // Example static amount
    $stmt->execute([$user_id, 'buy_data', $details, $amount, 'pending']);
    echo json_encode(['success' => true, 'message' => 'Data purchase request submitted.']);
} else {
    echo json_encode(['success' => false, 'message' => 'Missing parameters.']);
}
