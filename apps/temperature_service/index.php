<?php

// Устанавливаем заголовок для JSON ответа
header('Content-Type: application/json');

// Проверяем метод запроса
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    echo json_encode(['error' => 'Method Not Allowed']);
    exit;
}

// Проверяем URL запроса
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if (preg_match('/\/temperature[\/?](.*)/', $path)) {
// Готовим ответ со случайным значением температуры
// В данном примере не учитываем конкретное значение датчика и/или location=
    $resp = [
        'value' => rand(5, 45),
        'status' => 'active',
        'timestamp' => date('c'),
    ];
    http_response_code(200);
    echo json_encode($resp);
    exit;
}

// Для остальных урлов отвечаем 404
http_response_code(404);
error_log("Path is $path\n");
echo json_encode(['error' => 'Resource not found']);
exit;
