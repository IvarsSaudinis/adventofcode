<?php
/*
 * 000100011010
 * 110011110110
 * 011000101111
 * ......
 */
$values = array_fill(0, 12, 0);

// forward , down, up
$handle = fopen("input.txt", "r");
if ($handle) {
    while (($line = fgets($handle)) !== false) {
        $values[0]   += ($line[0]==1) ? 1 : -1;
        $values[1]   += ($line[1]==1) ? 1 : -1;
        $values[2]   += ($line[2]==1) ? 1 : -1;
        $values[3]   += ($line[3]==1) ? 1 : -1;
        $values[4]   += ($line[4]==1) ? 1 : -1;
        $values[5]   += ($line[5]==1) ? 1 : -1;
        $values[6]   += ($line[6]==1) ? 1 : -1;
        $values[7]   += ($line[7]==1) ? 1 : -1;
        $values[8]   += ($line[8]==1) ? 1 : -1;
        $values[9]   += ($line[9]==1) ? 1 : -1;
        $values[10]  += ($line[10]==1) ? 1 : -1;
        $values[11]  += ($line[11]==1) ? 1 : -1;
 }

    fclose($handle);
} 

$r1 = ''; $r2 ='';
foreach ($values as $v)
{
     $r1 .=  ($v<0) ? '0' : '1';
     $r2 .=  ($v>0) ? '0' : '1';
}
echo "1: " . $r1 . " => ". bindec($r1). "\n";
echo "2: " . $r2 . " => ". bindec($r2). "\n";

echo "Answer: " . bindec($r1) * bindec($r2) . "\n========";

// part 2

// fill array
$listO2 = [];
$listCO2 = [];
$handle = fopen("input.txt", "r");
if ($handle) {
    while (($line = fgets($handle)) !== false) {
        array_push($listO2, trim($line));
        array_push($listCO2, trim($line));
    }
    fclose($handle);
}

// oxygen
for($i=0; $i<=11; $i++)
{
    // get most popular bit
    $popular = 0;
    foreach ($listO2 as $l){
        $popular += ($l[$i]==1) ? 1 : -1;
    }

    //remove from list
    foreach ($listO2 as $l=>$v){
        if(count($listO2)<=1)
        {
            echo "\n \n 1. answer: ". $v . " => " . bindec($v);
        }

        // if popular is 1
        if($popular>=0)
        {
            if($v[$i]==1)
            {
                unset($listO2[$l]);
            }
        }

        if($popular < 0)
        {
            if($v[$i]==0)
            {
                unset($listO2[$l]);
            }
        }


    }



}

// CO2
for($i=0; $i<=11; $i++) {
    // get most popular bit
    $popular = 0;
    foreach ($listCO2 as $l) {
        $popular += ($l[$i] == 1) ? 1 : -1;
    }

    //remove from list
    foreach ($listCO2 as $l => $v) {
        // if least popular is 1
        if ($popular <= 0) {
            if ($v[$i] == 1) {
                unset($listCO2[$l]);
            }
        }

        if ($popular > 0) {
            if ($v[$i] == 0) {
                unset($listCO2[$l]);
            }
        }
        if (count($listCO2) == 1) {
            echo "\n 2. answer: " . $v . " => " . bindec($v) . "\n";
        }

    }
}
