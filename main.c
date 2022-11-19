#include<stdio.h>
#include<stdlib.h>
#include<math.h>
float z = 0.0;
float a;
int t;
int main(){
	printf("Wprowadz t: \n");
	scanf("%d", &t);
	printf("Wprowadz a: \n");
	scanf("%f", &a);
	if (t==8){
		z=1-sin(a);
		printf("Z: %f", z);
	}
	if ((t==0)||(t==1)||(t==2)||(t==3)){
	
		z=0.5*(1+cos(a));
		printf("Z: %f", z);
	}
	if ((t==4)||(t==6)||(t==7)){

		z=sqrt(a*a+1);
		printf("Z: %f", z);
	}
	return 0;
}

//5.4
//#include <stdio.h>
//#include <stdlib.h>
//#include <math.h>
//float x;
//float y;
//int main() {
//	printf("podaj wsówrzędni: x/y \n");
//	scanf("%f/%f", &x, &y);
//	if ((x>=-1) && (x<=1) && (y>=-1) && (y<=1)){
//		printf("Ten punkt należy do zamalowanego obrazu \n");
//	
//	} 
//	else 
//		printf("ten punk nie należy do zamalowanego obrazu");
//	
//	
//	return 0;
//}


//5.5
//#include<stdio.h>
//#include<stdlib.h>
//
//float a;
//float b;
//float c;
//float x = 0.0;
//float x1 = 0.0;
//float x2 = 0.0;
//float delta, avg;
//int main(){
//	printf("Wprowadz liczby a/b/c : \n");
//	scanf("%f/%f/%f", &a, &b, &c);
//	
//	if (a == 0){
//		scanf("%f", &a);
//		printf("to nie jest równanie kwadratowe \n");
//	}
//	else{
//		delta = b*b-4*a*c;
//	}
//	if (delta<0){
//		printf("brak pierwiastków. ");
//	}
//	if (delta>0){
//		x1=(-b-sqrt(delta))/(2*a);
//    	x2=(-b+sqrt(delta))/(2*a);
//    	printf("X1=%f \t X2 = %f \n", x1, x2);
//	}
//	if (delta == 0){	
//		x=-b/(2*a);
//   		printf("%f", &x);
//	}
//	return 0;
//} 



//5.6
//#include<stdio.h>
//#include<stdlib.h>
//#include <math.h>
//float a;
//float b;
//float c;
//float s = 0.0;
//float p = 0.0;
//int main(){
//	printf("podaj długośż boków: a/b/c : \n");
//	scanf("%f/%f/%f", &a, &b, &c);
//	if ((a+c>b) && (a+b>c) && (b+c>a)){
//		p = (a+b+c)/2;
//		s = sqrt(p*(p-a)*(p-b)*(p-c));
//		printf("Pole trujkąta: %4.2f", s);
//	}
//	else{
//		printf("Podanie liczby nie utworzą trójkąt.");
//	}
//}


//5.7

//#include<stdio.h>
//#include<stdlib.h>
//int a;
//
//int main(){
//	
//	printf("Podajczie numer miesiąca: \n");
//	scanf("%d", &a);
//	
//	if (a==1){
//		printf("zima, styczeń , 30 dni", a);
//	}
//	if (a==2){
//		printf("zima, luty , 30 dni");
//	}
//	if (a==3){
//		printf("wiosna, marzec , 30 dni");
//	}
//	if (a==4){
//		printf("wiosna, kwiecień , 30 dni");
//	}
//	if (a==5){
//		printf("wiosna, maj , 31 dni");
//	}
//	
//	if (a==6){
//		printf("lato, czerwiec , 30 dni");
//	}
//	if (a==7){
//		printf("lato, lipiec , 31 dni");
//	}
//	if (a==8){
//		printf("lato, sierpień , 31 dni");
//	}
//	if (a==9){
//		printf("jesień, wrzesień , 30 dni");
//	}
//	if (a==10){
//		printf("jesień, październik , 31 dni");
//	}
//	if (a==11){
//		printf("jesień, listopad , 30 dni");
//	}
//	if (a==12){
//		printf("zima, grudzień , 31 dni");
//	}
//	return 0 ;
//}




        


       


    
   