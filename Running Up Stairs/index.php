<?php
/*
    url:
    https://csacademy.com/ieeextreme-practice/task/96c8b1313edd72abf600facb0a14dbab/

    description:
    given a number of stairs, calculate the number of ways he could traverse them. 

    input:
    1//number of test cases
    3//test case #1

    output:
    3

    tags:
    #fibonacci,#BigInteger,#bigInt
*/
$handle = fopen ("php://stdin","r");
$n = fgets($handle);
function  fib($n) 
{ 

  /* 0th and 1st number of the series are 0 and 1*/
  $f[0] = 0; 
  $f[1] = 1; 
  
  for ($i = 2; $i <= $n; $i++) 
  { 
      /* Add the previous 2 numbers in the series 
         and store it */
      $f[$i] = gmp_add($f[$i-1],$f[$i-2]); 
  } 
  
  return $f[$n]; 
} 
for($i=0;$i<$n;$i++){
    $t=fgets($handle);
    $res=fib($t+1);
    print("$res \n");
}

fclose($handle);
?>