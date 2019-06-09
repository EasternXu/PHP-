<?php

function QSort($arr){
    $length = count($arr);
    if($length <=1)
    { 
        return $arr; 
    } 
    $pivot = $arr[0];//枢轴 
    $left_arr = array(); 
    
    $right_arr = array(); 

    for($i=1;$i<$length;$i++){//注意$i从1开始0是枢轴 
        if($arr[$i]<=$pivot){ 
            $left_arr[] = $arr[$i]; 
        }else{ 
            $right_arr[] = $arr[$i]; 
        } 
    } 
    $left_arr = QSort($left_arr);//递归排序左半部分 
    echo 1;
    
    $right_arr = QSort($right_arr);//递归排序右半部份 
    echo 2;
    return array_merge($left_arr,array($pivot),$right_arr);//合并左半部分、枢轴、右半部分 
} 
$arr = array(2,1,6,7,4,3,8,11,21,19);
echo "快速排序："; 
echo implode(' ',QSort($arr))."";