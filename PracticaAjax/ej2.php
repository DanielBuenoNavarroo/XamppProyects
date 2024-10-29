<?php
$data = $_POST['data'] ?? null;
error_log("Data received: " . print_r($data, true));

if ($data) {
    $dataArray = json_decode($data, true);
    error_log("Decoded Data: " . print_r($dataArray, true));

    $fp = fopen('ej2.json', 'w');

    if ($fp) {
        fwrite($fp, json_encode($dataArray, JSON_PRETTY_PRINT));
        fclose($fp);
        header('Content-Type: application/json');
        echo json_encode(['message' => 'success']);
    } else {
        header('Content-Type: application/json');
        echo json_encode(['error' => 'failed to open file']);
    }
} else {
    header('Content-Type: application/json');
    echo json_encode(['error' => 'no data received', 'status' => '400']);
}
