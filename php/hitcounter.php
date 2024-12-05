<?php

$path = '../php/hitcounterlog.txt';
$cookieName = 'daily_visit';

// Funkce pro načtení aktuálního počtu návštěv
function getVisitCount($filePath) {
    if (file_exists($filePath)) {
        $file = fopen($filePath, 'r');
        if ($file) {
            $count = intval(fgets($file));
            fclose($file);
            return $count;
        }
    }
    return 0;
}

// Funkce pro zvýšení počtu návštěv
function incrementVisitCount($filePath) {
    $count = 0;
    $file = fopen($filePath, 'c+');
    if ($file) {
        if (flock($file, LOCK_EX)) {
            $count = intval(fgets($file)) + 1;
            ftruncate($file, 0);
            rewind($file);
            fwrite($file, $count);
            flock($file, LOCK_UN);
        }
        fclose($file);
    }
    return $count;
}

// Zkontrolovat cookie
if (!isset($_COOKIE[$cookieName]) || $_COOKIE[$cookieName] != date('Y-m-d')) {
    // Zvýšení počtu návštěv, pokud dnes ještě návštěva nebyla započítána
    $currentCount = incrementVisitCount($path);

    // Nastavení cookie platné do konce dne
    setcookie($cookieName, date('Y-m-d'), strtotime('23:59:59'));
} else {
    // Pouze načtení aktuálního počtu návštěv
    $currentCount = getVisitCount($path);
}

// Vrácení počtu návštěv
echo $currentCount;
?>
