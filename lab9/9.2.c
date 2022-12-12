
// C program to swap two variables
#include <stdio.h>
 
int main()
{
    int x, y;
    printf("podaj x \n");
    scanf("%d", &x);
    printf("podaj y \n");
    scanf("%d", &y);
 
    int temp = x;
    x = y;
    y = temp;
 
    printf("po zmianie: x = %d, y = %d", x, y);
    return 0;
}