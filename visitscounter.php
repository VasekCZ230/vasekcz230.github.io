<?php
header('Content-Type: application/json');

// Path to the visits.json file
$filename = 'visits.json';

// Check if visits.json exists, if not, create it with an initial count
if (!file_exists($filename)) {
    file_put_contents($filename, json_encode(["count" => 0]));
}

// Read the current visit count from visits.json
$data = json_decode(file_get_contents($filename), true);

// Increment the visit count
$data['count']++;

// Save the updated count back to visits.json
file_put_contents($filename, json_encode($data));

// Output the new count in JSON format
echo json_encode($data);
?>
