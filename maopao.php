<?php

$arr = [1,3,4,12,21,34,43,33,44,11];

$length = count($arr);

for ($i=0; $i <$length-1 ; $i++) { 
    for ($j=0; $j < $length-1-$i; $j++) { 
        if ($arr[$j]>$arr[$j+1]) {
            $temp = $arr[$j];
            $arr[$j] = $arr[$j+1];
            $arr[$j+1] = $temp;
        }
    }
}
var_dump($arr);