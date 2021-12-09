<?php

$data = array_map('str_getcsv', file('input.txt'));
$it = new RecursiveIteratorIterator(new RecursiveArrayIterator($data));
$list = iterator_to_array($it,false);

$total = 0;

for($i=0; $i<=count($list); $i++)
{
    if($list[$i]<$list[$i+1]) $total++;
}


echo 'Answer: ' .$total;