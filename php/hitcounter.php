<?php 

$filename = "count.txt";// the text file to store count
// Open the file foe reading current count
$fp = fopen($filename, 'r');

//Get exiting count
$count = fread($fp, filesize($filename));

//close file
fclose($fp);

//Add 1 to the existing count
$count = $count +1;

//Display the number of hits
echo "<p>Total amount of Hits:" . $count. "</p>";

//Reopen to modify content
$fp = fopen($filename, 'w');

//write the new count to file
fwrite($fp, $count);

//close file
fclose($fp);

?>
