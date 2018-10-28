<?php

/*
url:
https://csacademy.com/ieeextreme-practice/task/xplore/

description:
For this challenge, write a program that reads a set of NNN entries from the Xplore database, in a JSON format, and prints ALL author names followed by the their h-index. The authors should be raked by h-index and by alphabetical order in case of an h-index tie.

Standard input

The input will consist of an integer NNN, followed by NNN lines with a single article entry in each line in a JSON format.

Each entry will follow a format described in the Xplore API website: developer.ieee.org/docs/read/Metadata_API_responses
Standard output

Print the authors ranked by their h-index followed by a space and by the h-index itself. The authors should be ranked alphabetically if there are ties.
Constraints and notes

    2≤N≤100002 \leq N \leq 100002≤N≤10000 

Input

10
{"authors": {"authors": [{"author_order": 1,"affiliation": "","full_name": "Echo"}, {"author_order": 2,"affiliation": "","full_name": "Bravo"}, {"author_order": 3,"affiliation": "","full_name": "Alfa"}]},"title": "Article Title 1","article_number": "1","publication_title": "Publication Title 1","publication_number": "7","citing_paper_count": 9,"publisher": "IEEE"}
{"authors": {"authors": [{"author_order": 1,"affiliation": "","full_name": "Charlie"}, {"author_order": 2,"affiliation": "","full_name": "Bravo"}]},"title": "Article Title 2","article_number": "2","publication_title": "Publication Title 1","publication_number": "7","citing_paper_count": 9,"publisher": "IEEE"}
{"authors": {"authors": [{"author_order": 1,"affiliation": "","full_name": "Echo"}, {"author_order": 2,"affiliation": "","full_name": "Delta"}, {"author_order": 3,"affiliation": "","full_name": "Alfa"}, {"author_order": 4,"affiliation": "","full_name": "Charlie"}]},"title": "Article Title 3","article_number": "3","publication_title": "Publication Title 1","publication_number": "7","citing_paper_count": 4,"publisher": "IEEE"}
{"authors": {"authors": [{"author_order": 1,"affiliation": "","full_name": "Charlie"}]},"title": "Article Title 4","article_number": "4","publication_title": "Publication Title 1","publication_number": "7","citing_paper_count": 9,"publisher": "IEEE"}
{"authors": {"authors": [{"author_order": 1,"affiliation": "","full_name": "Charlie"}, {"author_order": 2,"affiliation": "","full_name": "Echo"}, {"author_order": 3,"affiliation": "","full_name": "Alfa"}]},"title": "Article Title 5","article_number": "5","publication_title": "Publication Title 1","publication_number": "7","citing_paper_count": 5,"publisher": "IEEE"}
{"authors": {"authors": [{"author_order": 1,"affiliation": "","full_name": "Charlie"}, {"author_order": 2,"affiliation": "","full_name": "Echo"}]},"title": "Article Title 6","article_number": "6","publication_title": "Publication Title 1","publication_number": "7","citing_paper_count": 6,"publisher": "IEEE"}
{"authors": {"authors": [{"author_order": 1,"affiliation": "","full_name": "Delta"}]},"title": "Article Title 7","article_number": "7","publication_title": "Publication Title 1","publication_number": "7","citing_paper_count": 4,"publisher": "IEEE"}
{"authors": {"authors": [{"author_order": 1,"affiliation": "","full_name": "Charlie"}]},"title": "Article Title 8","article_number": "8","publication_title": "Publication Title 1","publication_number": "7","citing_paper_count": 9,"publisher": "IEEE"}
{"authors": {"authors": [{"author_order": 1,"affiliation": "","full_name": "Delta"}, {"author_order": 2,"affiliation": "","full_name": "Charlie"}]},"title": "Article Title 9","article_number": "9","publication_title": "Publication Title 1","publication_number": "7","citing_paper_count": 4,"publisher": "IEEE"}
{"authors": {"authors": [{"author_order": 1,"affiliation": "","full_name": "Bravo"}, {"author_order": 2,"affiliation": "","full_name": "Echo"}]},"title": "Article Title 10","article_number": "10","publication_title": "Publication Title 1","publication_number": "7","citing_paper_count": 6,"publisher": "IEEE"}

Output

Charlie 5
Echo 4
Alfa 3
Bravo 3
Delta 3

Explanation

In this list, Charlie is the author of 7 papers: with article_number 2, 3, 4, 5, 6, 8, and 9. His papers have citation counts of 9, 4, 9, 5, 6, 9, and 4 respectively.

If we order his papers by citation count it will be: 9, 9, 9, 6, 5, 4, 4. Charlie's h-index is 5 Because he has 5 papers with at least 5 citations.

The same method is applied for Echo, Alfa, Bravo, and Delta. Because Alfa, Bravo, and Delta all have the same h-index they are listed alphabetically. 

tags:
#api,#json,#sort,#h-index,#Extreme_12
*/





$handle = fopen ("php://stdin","r");
$count = fgets($handle);
class auth
{
    // property declaration
    public $fullName ;
    public $citing=array();
    public $articleCount=0;
    public $hIndex;

}


for ($x = 0; $x <$count; $x++){
    $temp = fgets($handle);
    $json_a = json_decode($temp, true);
    foreach ($json_a['authors']['authors'] as  $auth) {
        if(!array_key_exists($auth['full_name'],$authors)){
            $authors[$auth['full_name']]=new auth();
        }
            $authors[$auth['full_name']]->fullName=$auth['full_name'];
            array_push($authors[$auth['full_name']]->citing,$json_a['citing_paper_count']);
            $authors[$auth['full_name']]->articleCount++;
            
        
    }
}

   
    foreach($authors as $value){
        sort($value->citing);
        $size=sizeof($value->citing);
        $i=0;
        foreach($value->citing as $num){
            if($num>=$size-$i){
                $value->hIndex=$size-$i;
                break;
            }
            $i++;
        }
        
    }
    function cmp($a, $b)
    {   
        if ($a->hIndex < $b->hIndex) {
            return 1 ;
        }elseif($a->hIndex > $b->hIndex ){
            return -1;
        }elseif($a->hIndex == $b->hIndex){
            return strcmp($a->fullName ,$b->fullName); 
        }
    }
    usort($authors,"cmp");
    foreach($authors as $value){
     print($value->fullName." ".$value->hIndex."\n");   
    }
fclose($handle);
?>