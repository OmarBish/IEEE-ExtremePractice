import java.util.Arrays;
import java.util.Scanner;

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
      #Interactive,#bit_manipulation,#Extreme_12

 */

public class Main {

    public static void main(String[] args) {
        int number_true;
        int n;
        Scanner input = new Scanner(System.in);
        n=input.nextInt();
        char [] a = new char[n];
        Arrays.fill(a, '0');
        char [] buffer = new char[2*n+1];
        buffer[0]='Q';
        int index =0 ;
        for(int i=1;i<2*n+1;i++) {
            if(i%2==1) {
                buffer[i]=' ';

            }
            else {
                buffer[i]=a[index];
                index++;
            }
        }
        System.out.println(buffer);
        System.out.flush();
        number_true = input.nextInt();
        index=2;
        int temp;
        while(true) {
            if(number_true==n)
            {
                buffer[0]='A';
                System.out.println(buffer);
                System.out.flush();
                break;
            }
            buffer[index]='1';
            System.out.println(buffer);
            System.out.flush();
            temp=input.nextInt();
            if(temp<number_true) {
                buffer[index]='0';
            }
            else {
                number_true = temp;
            }
            index+=2;
        }
    }

}
