#include <stdio.h>
#include <stdlib.h>

float a;
float p;
float pod = 0.0;
int pentla;
int main(){
	printf("Ile pracowników? : \n");
	scanf("%f", &a);
	for(pentla=1;pentla<=a;pentla++){
		printf("Podaj swoi zarobki: \n");
		scanf("%f", &p);
		if (p>5000){
			pod=(p*5)/100;
			printf("Podwyszka stanowi: %f \n", pod);
		}
		if (p<=5000){
			pod=(p*10)/100;
			printf("Podwyszka stanowi: %f \n", pod);
		}	
		
	}
	
	
	return 0; 
}