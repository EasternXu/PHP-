<?php

function SqSearch($arr,$key){
    $length = count($arr);
    for($i=0;$i<$length;$i++)
    { 
        if($key == $arr[$i])
        { 
            return $i+1; 
        } 
    } 
    return -1; 
} 

$key = 8; 
$arr = [1,3,4,5,6,7,8,9,3,43,];
echo SqSearch($arr,$key);