<?php

$handle = fopen("lokeren-original.csv", "r");
if ($handle) {
    while (($line = fgets($handle)) !== false) {
        $fields = explode(';', $line);
        array_shift($fields);
        foreach($fields as $num => $field) {
          if ($num == 1 || $num == 13) {
            $pos = strrpos($field, '.');   
            if($pos !== false) {
                $field = substr_replace($field, '', $pos, 1);
            }
          }
          echo trim($field) . ';';
        }
        echo PHP_EOL;
    }

    fclose($handle);
} else {
    // error opening the file.
} 

?>