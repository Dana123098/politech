#include <stdio.h>
#include <stdlib.h>


int main() {
	int x, y;
	float s = 0.0;
	float r = 0.0;
    printf("podaj x \n");
    scanf("%d", &x);
    printf("podaj y \n");
    scanf("%d", &y);
    s=x+y;
    r=x-y;
    int type = s;
    int type2 = r;
    x=s;
    y=r;
    y = type2;
    x = type;
    printf("po zmianie: x = %d, y = %d", x, y);
	return 0;
}