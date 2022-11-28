#include<stdio.h>
#include<stdlib.h>
float avg;             
float s = 0.0;
int num;
int student;
int petla1;
int petla2;
int i = 1;
int main()
{
	printf("Ile studentów? \n");
	scanf("%d", &student);
	printf("Ile egzaminow? \n");
	scanf("%d", &num);
	for (petla1=1; petla1<=student; petla1++){

	
		for(petla2=1; petla2<=num; petla2++){
			printf("Wpisz swoje oceny z egzaminów \n");
			scanf("%f", &avg); 
			s+=avg;
			

		}
		avg = s/num;
		printf("średnia ocena = %f \n", avg);
	
		if (avg>2){
			printf("Zaliczyw \n");
		}
		else{
			printf("Nie zaliczyw \n");
		}	
	}
	
	return 0;
	
}