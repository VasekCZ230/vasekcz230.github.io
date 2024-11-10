<?php
$db="count.txt";
$handle=fopen($count, 'r+');
$data=fread($handle, 512);
$count=$data + 1;
print $count;
fseek($handle, 0) ;
fwrite($handle, $count) ;
fclose($handle) ;
?>
