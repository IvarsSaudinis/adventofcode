<?php

$placex = 0;
$placey = 0;

$aim = 0;

// forward , down, up
$handle = fopen('input.txt', 'r');
if ($handle) {
    while (($line = fgets($handle)) !== false) {
        $line_data = explode(' ', $line);
        switch ($line_data[0]) {
         case 'forward':
                $placex += $line_data[1];
                $placey += $aim * $line_data[1];
         break;
         case 'down':
              //  $placey+=$line_data[1];
                $aim += $line_data[1];
         break;
         case 'up':
                //$placey-=$line_data[1];
                $aim -= $line_data[1];
         break;
      }
    }

    fclose($handle);
}

echo 'Ansver: '.$placex.' x '.$placey.' = '.$placex * $placey;
