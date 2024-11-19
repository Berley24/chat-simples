<?php
$file = 'messages.json';

// Verificar se o arquivo existe
if (file_exists($file)) {
    $messages = json_decode(file_get_contents($file), true);
    echo json_encode($messages);
} else {
    echo json_encode([]);
}
