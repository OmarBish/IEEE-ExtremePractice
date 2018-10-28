<?php

/*
    url:
    https://csacademy.com/ieeextreme-practice/task/8761fb7efefcf1d890df1d8d91cae241/

    description:
    To facilitate the transport, you should form a row such that the heights of the gang members are in non-decreasing order. For each gang member you should find the minimum and the maximum position where they can be in a valid sorted row and produce a roster with this information. 

    input :
    6
    TheJoker 180
    HarleyQuin 160
    MrHammer 220
    Boody 220
    Muggs 180
    Paulie 180

    output:- 
    HarleyQuin 1 1
    Muggs Paulie TheJoker 2 4
    Boody MrHammer 5 6

    tags:
    #php,#sort,#Extreme_11


*/
$handle = fopen ("php://stdin","r");
$n = fgets($handle);

class auth
{
    // property declaration
    public $fullName ;
    public $hight;
}

$arr=array();

for($m=0;$m<$n;$m++){
    fscanf($handle,"%s %d",$arr[$m]->fullName,$arr[$m]->hight);
}
function cmp($a, $b)
    {   
        if ($a->hight < $b->hight) {
            return -1 ;
        } elseif($a->hight > $b->hight){
            return 1 ;
        }else{
           return strcmp($a->fullName ,$b->fullName); 
        }
    }
    usort($arr,"cmp");
    $temp=$arr[0]->hight;
    
    for($m=0;$m<$n;){
        $count=0;
        $print=false;
        while($m+$count<$n&&$arr[$m+$count]->hight==$temp){
            print($arr[$m+$count]->fullName." ");
            $count++;
            $print=true;
        }
        if($print){
            $a=$m+1;
            if($count==1){
                $b=$a;
            }else{
               $b=$a+$count-1 ;
            }
            
            print($a." ".$b."\n");
        }
            $m+=$count;
            $temp=$arr[$m+$count]->hight;
        
        
    }

fclose($handle);
?>