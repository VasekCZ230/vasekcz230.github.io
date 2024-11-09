<?php
header('Content-Type: application/json');

$filename = 'visits.json';

if (!file_exists($filename)) {
    file_put_contents($filename, json_encode(["count" => 0]));
}

$data = json_decode(file_get_contents($filename), true);

$data['count']++;

file_put_contents($filename, json_encode($data));

echo json_encode($data);
?>
