<?php

$arr = [111,22,3,4,12,21,34,43,33,44,11];

$length = count($arr);

for ($i=0; $i <$length-1 ; $i++) { 
    $max=$arr[0];
    $id = 0;
    for($j=0;$j<$length-$i;$j++)
    {
        if($max<$arr[$j])
        {
            $max = $arr[$j];
            $id = $j;

        }
    }
    $arr[$id]= $arr[$length-1-$i]; 
    $arr[$length-1-$i] = $max;
}
$a = implode(',',$arr);
var_dump($a);