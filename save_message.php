<?php
$file = 'messages.json';

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['user']) && isset($data['message'])) {
    $messages = [];
    if (file_exists($file)) {
        $messages = json_decode(file_get_contents($file), true);
    }

    $messages[] = [
        'user' => htmlspecialchars($data['user']),
        'message' => htmlspecialchars($data['message']),
        'time' => date('H:i:s')
    ];

    file_put_contents($file, json_encode($messages));
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid input']);
}
