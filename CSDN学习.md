php算法和数据结构

//—————————————
// 常用排序算法
//—————————————
//冒泡排序
function BubbleSort($arr){
    $length = count($arr);
    if($length<=1){ return $arr; } 
    for($i=0;$i<$length;$i++)
    { 
      for($j=$length-1;$j>$i;$j–-)
      {
        if($arr[$j]<$arr[$j-1]){ 
          $tmp = $arr[$j]; 
          $arr[$j] = $arr[$j-1]; 
          $arr[$j-1] = $tmp; 
          } 
        } 
   } 
     return $arr; 
  } 
  echo '冒泡排序：'; 
  echo implode(' ',BubbleSort($arr))."“;

//快速排序
function QSort($arr){
  $length = count($arr);
  if($length <=1){ return $arr; } 
  $pivot = $arr[0];//枢轴 
  $left_arr = array(); 
  $right_arr = array(); 
  for($i=1;$i<$length;$i++)
  { //注意$i从1开始0是枢轴 
    if($arr[$i]<=$pivot){ $left_arr[] = $arr[$i]; }
    else{ $right_arr[] = $arr[$i]; } 
  } 
  $left_arr = QSort($left_arr);
  //递归排序左半部分 
  $right_arr = QSort($right_arr);
  //递归排序右半部份 
  return array_merge($left_arr,array($pivot),$right_arr);
  //合并左半部分、枢轴、右半部分 
} 
echo "快速排序："; 
echo implode(' ',QSort($arr))."“;

//选择排序(不稳定)
function SelectSort($arr){
  $length = count($arr);
  if($length<=1){ return $arr; } 
  for($i=0;$i<$length;$i++)
  { 
    $min = $i; 
    for($j=$i+1;$j<$length;$j++)
    { 
      if($arr[$j]<$arr[$min]){ $min = $j; } 
    } 
    if($i != $min)
    { 
      $tmp = $arr[$i]; 
      $arr[$i] = $arr[$min]; 
      $arr[$min] = $tmp; 
    } 
  } 
  return $arr; 
} 
echo "选择排序："; 
echo implode(' ',SelectSort($arr))."“;

//插入排序
function InsertSort($arr){
  $length = count($arr);
  if($length <=1){ return $arr; } 
  for($i=1;$i<$length;$i++)
  { 
    $x = $arr[$i]; 
    $j = $i-1; 
    while($x<$arr[$j] && $j>=0){
      $arr[$j+1] = $arr[$j];
      $j–-;
    }
  $arr[$j+1] = $x;
  }
  return $arr;
}
echo ‘插入排序：’;
echo implode(‘ ‘,InsertSort($arr)).”
“;
//归并排序函数
//它的原理是假设初始序列含有 n 个元素，则可以看成是 n 个有序的子序列，每个子序列的长度为 1，然后两两归并
//得到n/2个长度为2或1 的有序序列；再两两归并，······，如此重复
//直至得到一个长度为 n 的有序序列为止，这种排序方法就成为 2 路归并排序

//merge函数将指定的两个有序数组(arr1,arr2)合并并且排序
//我们可以找到第三个数组,然后依次从两个数组的开始取数据哪个数据小就先取哪个的,然后删除掉刚刚取过的数据
function al_merge($arrA,$arrB)
{
    $arrC = array();
    while(count($arrA) && count($arrB)){
        //这里不断的判断哪个值小,就将小的值给到arrC,但是到最后肯定要剩下几个值,
        //不是剩下arrA里面的就是剩下arrB里面的而且这几个有序的值,肯定比arrC里面所有的值都大
        $arrC[] = $arrA[0] < $arrB[0] ? array_shift($arrA) : array_shift($arrB);
    }
    return array_merge($arrC, $arrA, $arrB);
}
function al_merge_sort($arr){
    $len = count($arr);
    if($len <= 1) return $arr;
    //递归结束条件,到达这步的时候,数组就只剩下一个元素了,也就是分离了数组
    //分离数组元素
    $mid = intval($len/2);//取数组中间
    $left_arr = array_slice($arr, 0, $mid);//拆分数组0-mid这部分给左边left_arr
    $right_arr = array_slice($arr, $mid);//拆分数组mid-末尾这部分给右边right_arr
    $left_arr = $this->al_merge_sort($left_arr);//左边拆分完后开始递归合并往上走
    $right_arr = $this->al_merge_sort($right_arr);//右边拆分完毕开始递归往上走
    $arr = $this->al_merge($left_arr, $right_arr);//合并两个数组,继续递归
    return $arr;
}

//—————————————
// 常用查找算法
//—————————————
//二分查找
function binary_search($arr,$low,$high,$key){
    while($low<=$high)
    { 
        $mid = intval(($low+$high)/2); 
        if($key == $arr[$mid])
        { 
            return $mid+1; 
        }elseif($key<$arr[$mid]){
            $high = $mid-1; 
        }elseif($key>$arr[$mid]){
            $low = $mid+1;
        }
    }
    return -1;
}
$key = 6;
echo “二分查找{$key}的位置：”;
echo binary_search(QSort($arr),0,8,$key);

//顺序查找
function SqSearch($arr,$key){
$length = count($arr);
for($i=0;$i<$length;$i++){ if($key == $arr[$i]){ return $i+1; } } return -1; } $key = 8; echo "
顺序常规查找{$key}的位置：”;
echo SqSearch($arr,$key);
//—————————————
// 常用数据结构
//—————————————
//线性表的删除(数组实现)
function delete_array_element($arr,$pos){
$length = count($arr);
if($pos<1 || $pos>$length){
return “删除位置出错!”;
}
for($i=$pos-1;$i<$length-1;$i++){ $arr[$i] = $arr[$i+1]; } array_pop($arr); return $arr; } $pos = 3; echo "
除第{$pos}位置上的元素后：”;
echo implode(‘ ‘,delete_array_element($arr,$pos)).”
“;

/**
* Class Node
* PHP模拟链表的基本操作
*/
class Node{
public $data = ”;
public $next = null;
}
//初始化
function init($linkList){
$linkList->data = 0; //用来记录链表长度
$linkList->next = null;
}
//头插法创建链表
function createHead(&$linkList,$length){
for($i=0;$i<$length;$i++){ $newNode = new Node(); $newNode->data = $i;
$newNode->next = $linkList->next;//因为PHP中对象本身就是引用所以不用再可用“&”
$linkList->next = $newNode;
$linkList->data++;
}
}
//尾插法创建链表
function createTail(&$linkList,$length){
$r = $linkList;
for($i=0;$i<$length;$i++){ $newNode = new Node(); $newNode->data = $i;
$newNode->next = $r->next;
$r->next = $newNode;
$r = $newNode;
$linkList->data++;
}
}
//在指定位置插入指定元素
function insert($linkList,$pos,$elem){
if($pos<1 && $pos>$linkList->data+1){
echo “插入位置错误！”;
}
$p = $linkList;
for($i=1;$i<$pos;$i++){ $p = $p->next;
}
$newNode = new Node();
$newNode->data = $elem;
$newNode->next = $p->next;
$p->next = $newNode;
}
//删除指定位置的元素
function delete($linkList,$pos){
if($pos<1 && $pos>$linkList->data+1){
echo “位置不存在！”;
}
$p = $linkList;
for($i=1;$i<$pos;$i++){ $p = $p->next;
}
$q = $p->next;
$p->next = $q->next;
unset($q);
$linkList->data–;
}
//输出链表数据
function show($linkList){
$p = $linkList->next;
while($p!=null){
echo $p->data.” “;
$p = $p->next;
}
echo ‘
‘;
}

$linkList = new Node();
init($linkList);//初始化
createTail($linkList,10);//尾插法创建链表
show($linkList);//打印出链表
insert($linkList,3,’a’);//插入
show($linkList);
delete($linkList,3);//删除
show($linkList);

/**
* Class Stack
* 用PHP模拟顺序栈的基本操作
*/
class Stack{
//用默认值直接初始化栈了，也可用构造方法初始化栈
private $top = -1;
private $maxSize = 5;
private $stack = array();

//入栈
public function push($elem){
if($this->top >= $this->maxSize-1){
echo “栈已满！
“;
return;
}
$this->top++;
$this->stack[$this->top] = $elem;
}
//出栈
public function pop(){
if($this->top == -1){
echo “栈是空的！”;
return ;
}
$elem = $this->stack[$this->top];
unset($this->stack[$this->top]);
$this->top–;
return $elem;
}
//打印栈
public function show(){
for($i=$this->top;$i>=0;$i–){
echo $this->stack[$i].” “;
}
echo “
“;
}
}

$stack = new Stack();
$stack->push(3);
$stack->push(5);
$stack->push(8);
$stack->push(7);
$stack->push(9);
$stack->push(2);
$stack->show();
$stack->pop();
$stack->pop();
$stack->pop();
$stack->show();

/**
* Class Deque
* 使用PHP实现双向队列
*/
class Deque{
private $queue = array();
public function addFirst($item){//头入队
array_unshift($this->queue,$item);
}
public function addLast($item){//尾入队
array_push($this->queue,$item);
}
public function removeFirst(){//头出队
array_shift($this->queue);
}
public function removeLast(){//尾出队
array_pop($this->queue);
}
public function show(){//打印
foreach($this->queue as $item){
echo $item.” “;
}
echo “
“;
}
}
$deque = new Deque();
$deque->addFirst(2);
$deque->addLast(3);
$deque->addLast(4);
$deque->addFirst(5);
$deque->show();

//PHP解决约瑟夫环问题
//方法一
function joseph_ring($n,$m){
$arr = range(1,$n);
$i = 0;
while(count($arr)>1){
$i=$i+1;
$head = array_shift($arr);
if($i%$m != 0){ //如果不是则重新压入数组
array_push($arr,$head);
}
}
return $arr[0];
}
//方法二
function joseph_ring2($n,$m){
$r = 0;
for($i=2;$i<=$n;$i++){ $r = ($r+$m)%$i; } return $r + 1; }
