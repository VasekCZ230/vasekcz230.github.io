<?php 

$filename = "count.txt"; // Textový soubor pro uložení počtu návštěv

// Zkontrolujeme, zda soubor existuje, pokud ne, vytvoříme ho s počáteční hodnotou 0
if (!file_exists($filename)) {
    file_put_contents($filename, "0");
}

// Načtení aktuálního počtu návštěv
$count = (int)file_get_contents($filename);

// Zvýšení počtu návštěv o 1
$count++;

// Zobrazení počtu návštěv
echo "<p>Total amount of Hits: " . $count . "</p>";

// Uložení nového počtu návštěv zpět do souboru
file_put_contents($filename, $count);

?>
