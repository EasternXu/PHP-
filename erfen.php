<?php

// $arr = [1,2,3,4,5,6,7,8,9,11,32,3,435,455];
$arr = [1,3,4,5,6,7,8,9,11,22,33,44,55];
function search($arr,$value,$start,$end)
{
    //1.确定查找区间
    if ($start>$end) {
        return false;
    }else{
        //选择中间值
        $mid = floor(($start+$end)/2);
    }
    echo $arr[$mid];
    //如果相等 返回true
    if ($arr[$mid] == $value) {
        return true;
    }elseif ($arr[$mid]<$value) {
        //如果中间值小于要查询得值，则开始位置为中间值加一
        $start = $mid+1;
        return search($arr,$value,$start,$end);
    }else{
        //如果中间值大于要查询的值，则结束位置为中间值减一
        
        $end = $mid-1;
        return search($arr,$value,$start,$end);
    }
    
}
$length = count($arr);
var_dump(search($arr,2,0,$length));