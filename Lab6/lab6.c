#include<stdio.h>
#include<stdlib.h>

float a;
float s;
float n; 
float i;
float s;
float suma();
int main(){
	
	printf("podaj ilość liczb: \n");
	scanf("%f", &n);
	
	i=1;
	while((i<n)||(i>0)){
		printf("Podaj liczbe: \n");
		scanf("%f", &a);
		if (a>100) s+=a;
		i++;
	}
		
	return 0;

}



