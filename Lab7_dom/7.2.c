#include <stdio.h>
#include <stdlib.h>

float a;
int d;
float s = 0.0;
int petla;
int main(){
	printf("Podaj ilość: \n");
	scanf("%d", &d);
	printf("Podaj co chczesz: \n");
	scanf("%f", &a);
	for(petla=1;petla<d;petla++){
		printf("%4.2f , ", a);
	}
	return 0;
}