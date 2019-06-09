<?php

function InsertSort($arr){
    $length = count($arr);
    if($length <=1){
         return $arr; 
    } 
    for($i=1;$i<$length;$i++){ 
        $x = $arr[$i]; $j = $i-1;
        while($x<$arr[$j] && $j>=0){
            $arr[$j+1] = $arr[$j];
            $j--;
        }
        $arr[$j+1] = $x;
    }
    return $arr;
}

$arr = [11,2,8,4,5,7];

echo impLODE(',',InsertSort($arr));