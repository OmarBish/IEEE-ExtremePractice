#include <bits/stdc++.h>

using namespace std;
/*
    url:
    https://csacademy.com/ieeextreme-practice/task/troll-coder/

    descreption:
    you have to guess a sequence of N bits by submitting queries. For each query, the Troll will tell you how many bits you guesses correctly until you guess the correct sequence.

    Interaction(input):
    Your program must exchange information with the Troll by submitting queries and reading answers.
    Note that you must flush the buffer so that the output reaches the Troll. Here we ilustrate it for several languages.
    At the beginning of each test case, the Troll will give you a single integer N which will represent the length of the sequence.
    To submit a query, your program should output the letter Q followed by a space and by a binary sequence of length N with each
    bit separated by a space. After each query you will receive an integer denoting the number of correct bits.
     The last submission will be your final answer and it should start with an A followed by a space and by a binary sequence
      of length N with each bit separated by a space.

      tags:
      #Interactive,#bit_Manipulation,#Extreme_12

 */
int main() {
  int n;
  cin >> n;
  int corr=0;
  bool *arr=new bool [n];
  memset(arr,0,sizeof arr);
  
      int count=0;
      int pre=0;
      cout << "Q ";
      for(int i = 0 ;i<n;i++ ){
          cout<<arr[i]<<" ";
      }
      cin >> corr;
  while(1){
      if(corr==n)break;
      if(count==n)break;
      arr[count]=true;
      pre=corr;
      cout<<"Q ";
      for(int i = 0 ;i<n;i++ ){
          cout<<arr[i]<<" ";
      }
      cin >> corr;
      if(corr<=pre){
          arr[count]= false;
      }
      count++;
      cout.flush();
      
  }
  cout<<"A ";
      for(int i = 0 ;i<n;i++ ){
          cout<<arr[i]<<" ";
      }
      cout.flush();

}