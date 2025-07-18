<?php
require_once '../db.php';
header('Content-Type: application/json');
$data = json_decode(file_get_contents('php://input'), true);
$user_id = $data['user_id'] ?? null;
$provider = $data['provider'] ?? '';
$card = $data['card'] ?? '';
$package = $data['package'] ?? '';
if ($user_id && $provider && $card && $package) {
    $stmt = $pdo->prepare('INSERT INTO transactions (user_id, service, details, amount, status) VALUES (?, ?, ?, ?, ?)');
    $details = json_encode(['provider' => $provider, 'card' => $card, 'package' => $package]);
    $amount = 2000; // Example static amount
    $stmt->execute([$user_id, 'cable_sub', $details, $amount, 'pending']);
    echo json_encode(['success' => true, 'message' => 'Cable subscription request submitted.']);
} else {
    echo json_encode(['success' => false, 'message' => 'Missing parameters.']);
}
