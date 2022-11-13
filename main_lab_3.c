////3.3
#include<stdio.h>
#include<stdlib.h>
char imje[100];
int wiek;
char plec[100];
char *student="student";
int egzaminy, num;
float oceny, avg;
float t=0.0;
float s=0.0;
int petla;
#define STUDENT "Student"
int main(void){
	
	printf("wpisz swoje imję: \n");
	scanf("%100s", imje);
	printf("Ile masz lat: \n");
	scanf("%d", &wiek);
	printf("Jaka płec: \n");
	scanf("%100s", plec);
	
	
	printf("Napisz ile masz egzamihow: \n");
	scanf("%d", &num);
	for(petla=1; petla<num; petla++){
		printf("Wpisz oceny: \n");
		scanf("%f", &avg);
		s=s+avg;	
	}
	t=s/num;
	printf(" Masz na imję %s \t", imje);
	printf("masz %d lat \t", wiek);
	printf("Jestesz : %s \n", plec);
	while(*student){
		printf("%c \t", *student);
		student++;
	}
	printf("śred : %f", t);
	return 0;
}

//*******************************************
//#include <stdio.h>
//#include <math.h>
//int main()
//{ double kat, radian;
//printf("Podaj kat w stopniach \n");
//scanf("%lf,%lf", &kat);
//radian=M_PI*kat/180;
//printf("kat w stopniach = %lf,\nkat w radianach = %lf\n", kat, \
//radian);
//printf("Wynik: sinus = %lf\n", sin(radian));
//
//system("pause");
//return 0;
//}



//#include <stdio.h>
// 
//int main(void) {
//  char imie[100];
//  scanf("%100s", imie);
//  printf("Masz na imie: %s", imie);
//  return 0;
//}
//*********************************************

//3.4
//Napisz program obliczający objętość i pole powierzchni sześcianu, prostopadłościanu
//o podstawie kwadratowej i prostokątnej oraz walca.
//#include<stdio.h>
//#include<stdlib.h>
//#include<locale.h>
//#include<math.h>
//float p = 0.0;
//float v = 0.0;
//float p1 = 0.0;
//float v1 = 0.0;
//float p2 = 0.0;
//float v2 = 0.0;
//float r;
//float h;
//float a;
//float d;
//float b;
//float c;
//int main(){
//	setlocale(LC_ALL, "");
//	printf("Wprowadz wartość boku a: \n");
//	scanf("%f", &a);
//	printf("Wprowadz długość promienia r i wysokość h walca \n");
//	scanf("%f/%f", &r, &h);
//	printf("Wprowadz długość boku a/b/c \n");
//	scanf("%f/%f/%f", &d, &b, &c);
//	
//	p=6*(a*a*a);
//	v=a*a*a;
//	p1=2 * M_PI * (r*r)+2 * M_PI * r * h;
//	v1=M_PI *(r*r)*h;
//	p2= 2*(d*b+d*c+b*c);
//	v2=d*b*c;
//	
//	printf("Pole całkowite sześcianu: %4.2f \n", p);
//	printf("Objętość sześcianu: %4.2f \n", v);
//	printf("Pole całkowite walca: %4.2f \n", p1);
//	printf("objętość walca: %4.2f \n", v1);
//	printf("Pole całkowite prostopadłościanu: %4.2f \n", p2);
//	printf("Objętość prostopadłościanu: %4.2f \n", v2);
//	
//	return 0;
//}



//3.5
//#include<stdio.h>
//#include<stdlib.h>
//#include<math.h>
//
//float avg;
//float a = 0.0;
//float s = 0.0;
//float g = 0.0;
//int num;
//int petla;
//int main(){
//
//	printf("ile chczesz wprowadzić liczb : \n");
//	scanf("%d", &num);
//	
//	for (petla = 1; petla<=num; petla++){
//		printf("Wpisz liczby: \n");
//		scanf("%f", &avg);
//		s = s + avg;
//	}
//	a = s/num;
//	g= sqrt(s*1/num);
//	printf("średnia arefmetyczna : %f \n", a);
//	printf("średnia geometyczna : %f \n", g);
//	system("pause");
//	return 0;
//
//}

//3.6

//float a;
//float c;
//float kmcz;
//float km;
//float f;
//float k = 0.0;
//float m = 0.0;
//float w = 0.0;
//float mss = 0.0;
//float cel = 0.0;
//int main(){
//	
//	printf("Wprowadz mili: \n");
//	scanf("%f", &a);
//	k = a / 0.625;
//	printf("to w kilometrach: %4.2f\n", k);
//	printf("Wprowadz kilom: \n");
//	scanf("%f", &c);
//	m = c / 1.6;
//	printf("To w milach: %4.2f\n", m);
//	printf("Wprowadz z koni mechanicznych: \n");
//	scanf("%f", &km);
//	w = km *735;                  
//	printf("To w watach: %4.2f\n", w);
//
//	printf("wprowadz klh : \n");
//	scanf("%f", &kmcz);
//	mss = kmcz*1000/3600;
//	printf("To w ms : %f \n", mss);
//
//	printf("wprowadz stopni Farenheita: \n");
//	scanf("%f", &f);
//	cel = (f-32)*0.5555555556;
//	printf("To w celsjusza: %4.2f", cel);
//		
//	return 0;
//}
           
		   
//3.7
//#include<stdio.h>
//#include<stdlib.h>
//int god;
//int mies;
//int god2;
//int mies2;
//int ter = 0.0;
//int ter2 = 0.0;
//int ter3 = 0.0;
//int prz = 0.0;
//int prz2 = 0.0;
//int prz3 = 0.0;
//int main(){
//	printf("Podaj rok/miesiąc swoich urodzin: \n ");
//	scanf("%d/%d/", &god, &mies);
//	ter = 2022-god;
//	ter2 = 11 - mies;
//	ter3 = ter + ter2;
//	printf("Ter : %d \n", ter3);
//	printf("Podaj rok/miesiąc jakij cie trzeba: \n");
//	scanf("%d/%d", &god2, &mies2);
//	prz = god2 - god;
//	prz2 = mies2 - 11;
//	prz3 = prz + prz2;
//	printf("Prz : %d", prz3);
//	return 0;
//}
      
      
//3.8
//a
//a)
//********************************
//#include<stdio.h>
//#include<stdlib.h>
//#include<math.h>
//float x;
//float w = 0.0;
//int main(){
//	printf("Wprowadz x: \n");
//	scanf("%f", &x);
//	w = 10*cos(x)-0.1*(x*x)+sin(x)+sqrt(4*(x*x)+7);
//	printf("Wynik: %f", w);
//	return 0;
//}
//************************
//#include<stdio.h>
//#include<stdlib.h>
//#include<math.h>
//float x;
//float w = 0.0;
//int main(){
//	printf("Wprowadz x: \n");
//	scanf("%f", &x);
//	w = fabs(x);
//	printf("Wynik: %f", w);
//	return 0;
//}