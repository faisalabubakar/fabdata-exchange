<?php
require_once '../db.php';
header('Content-Type: application/json');
$data = json_decode(file_get_contents('php://input'), true);
$user_id = $data['user_id'] ?? null;
$exam_type = $data['exam_type'] ?? '';
$quantity = $data['quantity'] ?? 0;
if ($user_id && $exam_type && $quantity) {
    $stmt = $pdo->prepare('INSERT INTO transactions (user_id, service, details, amount, status) VALUES (?, ?, ?, ?, ?)');
    $details = json_encode(['exam_type' => $exam_type, 'quantity' => $quantity]);
    $amount = 3000 * $quantity; // Example static amount
    $stmt->execute([$user_id, 'exam_pin', $details, $amount, 'pending']);
    echo json_encode(['success' => true, 'message' => 'Exam pin purchase request submitted.']);
} else {
    echo json_encode(['success' => false, 'message' => 'Missing parameters.']);
}
