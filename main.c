//2.1. Obliczanie œredniej arytmetycznej dwóch liczb rzeczywistych
//(algorytm liniowy)
//#include <stdio.h>
//#include <stdlib.h>
//
//
//int main()
//{float a, b;
//	printf("Podaj 2 liczbe a/b: \n");
//	scanf("%f/%f", &a, &b);
//	printf("Srednia = %f", (a+b)/2);
//	return 0;
//}
//	

//Zadanie 2.2. Rozwi¹zywanie równania kwadratowego (algorytm
//z rozga³êzieniami)
//
//#include <stdio.h>
//#include <stdlib.h>
//#include <math.h>
//
//
//int main()
//{
//	int a;
//	int b;
//	int c;
//	float delta, avg;
//	float x1 = 0.0;
//	float x2 = 0.0;
//	float x = 0.0;
//	printf("wprovadz licz a/b/c : \n");
//	scanf("%d/%d/%d", &a, &b, &c);
//	if (a == 0){
//		scanf("%f", a);
//		printf("to nie jest równanie kwadratowe \n");
//	}
//	else{
//		delta=b*b-4*a*c;
//	}
//		
//		
//	if (delta<0){
//		printf("brak pierwiastków.");
//	}
//	if (delta>0){
//	
//		x1=(-b-sqrt(delta))/(2*a);
//    	x2=(-b+sqrt(delta))/(2*a);
//    	
//    	printf("%f/%f", x1, x2);
//	}
//	if (delta == 0){
//		x=-b/(2*a);
//    	printf("%f", &x);
//	
//	}
//
//	return 0;		
//	
//}

//Zadanie 2.3. Obliczanie œredniej ocen studenta (algorytm iteracyjny)
//Student w czasie sesji zimowej w PL zdaje n egzaminów. Obliczyæ œredni¹ sesji, jako
//zwyk³¹ œredni¹ arytmetyczn¹.
//1
//#include<stdio.h>
//#include<stdlib.h>
//float avg;             
//float s = 0.0;
//int num;
//int petla;
//int main()
//{
//	printf("Ile egzaminow? \n");
//	scanf("%d", &num);
//	
//	for(petla=1; petla<=num; petla++)
//	{
//		printf("Wpisz swoje oceny z egzaminów \n");
//		scanf("%f", &avg); 
//		s+=avg;
//	}
//	avg = s/num;
//	printf("œrednia ocena = %f \n", avg);
//	system("pause");
//	return 0;
//	
//}

//2
//#include<stdio.h>
//#include<stdlib.h>
//
//float avg;
//float t = 0.0;
//float s = 0.0;
//int num;
//int petla;
//int main(){
//
//	printf("Ile egzaminow? \n");
//	scanf("%d", &num);
//	
//	for (petla = 1; petla<=num; petla++){
//		printf("Wpisz swoje oceny z egzaminów: \n");
//		scanf("%f", &avg);
//		s = s + avg;
//	}
//	t = s/num;
//	printf("œrednia ocena = %f \n", t);
//	system("pause");
//	return 0;
//
//}


//Zadanie 2.4. Obliczanie pola powierzchni i objêtoœci bry³ geometrycznych
//pole powierzchni i objêtoœæ szeœcianu
//#include<stdio.h>
//#include<stdlib.h>
//float p = 0.0;
//float v = 0.0;
//float a;
//int main(){	
//	printf("Wprowadz d³ugoœæ boku a: \n");
//	scanf("%f", &a);
//	p = 6*(a*a*a);
//	v = a*a*a;
//	printf("Pole ca³kowite szeœcianu: %f \n", p);
//	printf("Objêtoœæ szeœcianu: %f \n", v);
//	return 0;
//	
//}

//pole powierzchni i objêtoœæ prostopad³oœcianu
//#include<stdio.h>
//#include<stdlib.h>
//float p = 0.0;
//float v = 0.0;
//float a;
//float b;
//float c;
//int main(){
//	printf("Wprowadz d³ugoœæ boku a/b/c \n");
//	scanf("%f/%f/%f", &a, &b, &c);
//	p = 2 * (a*b + a*c + b*c);
//	v = a*b*c;
//	printf("Pole ca³kowite prostopad³oœcianu: %f \n", p);
//	printf("Objêtoœæ prostopad³oœcianu: %f \n", v);
//	return 0;
//}

//pole powierzchni i objêtoœæ kuli
//#include<stdio.h>
//#include<stdlib.h>
//#include<math.h>
//float p = 0.0;
//float v = 0.0;
//float r;
//int main(){
//	printf("Wprowadz du³goœæ promienia r \n");
//	scanf("%f", &r);
//	p= 4*(r*r)*M_PI;
//	v=4/3*(r*r*r)*M_PI;
//	printf("Pole ca³kowite kuli : %f \n", p);
//	printf("Objêtoœæ kuli: %f \n", v);
//	return 0;
//}

//pole powierzchni i objêtoœæ walca
//#include<stdio.h>
//#include<stdlib.h>
//#include<math.h>
//
//float r;
//float h;
//float p = 0.0;
//float v = 0.0;
//int main(){
//	printf("Wprowadz d³ugoœæ promienia r i wysokoœæ h walca \n");
//	scanf("%f/%f", &r, &h);
//	p = 2 * M_PI * (r*r)+2 * M_PI * r * h;
//	v = M_PI *(r*r)*h;
//	printf("Pole ca³kowite walca: %f \n", p);
//	printf("objêtoœæ walca: %f \n", v);
//	return 0;
//}

#include <stdio.h>
#include <stdlib.h>

int main()
{
    float a,b,c,Z,x,y,S1,S2,S3,S4,S5,S6,S7,S8,S9,S10,S11,S12,S13,S14,S15,S16;


    printf("szerokosc =   \n", a);
    scanf("%f", &a);
    printf("dlugosc =  \n", b);
    scanf("%f", &b);
    printf("Wysokosc =   \n", c);
    scanf("%f", &c);

    printf("ile bedzie okon?(min 1 max 3) o =\n",x);
        printf ("\n");
    scanf("%f", &x);
    printf("ile bedzie dzwi?(min 1 max 2) d =\n",y);
        printf ("\n");
    scanf("%f", &y);

    Z = 1;

    //obliczyc powierzchnie sciany bez okon i dzwi

    S1 = b * c ;

    printf("powierzchnie sciany bez okon i dzwi = %5.2f\n",S1);
        printf ("\n");

    S2 = 0.9;

    S3 = 1.8;

    S10 = S1 - (S2+S3); // jak na 1 sciane bedzie 1 okno i 1 dzwi



    S4 = S1 - S2;

    printf ("zeby pofarbowac 1 scianu z  1 oknom trzeba %5.2f l farby\n",S4);
      printf ("\n");

    S5 = S1 - S3;

    printf("zeby pofarbowac 1 scianu z  1 dzwi trzeba %5.2f l farby\n", S5);

    printf ("\n");

    if (x == 1)
    {
        S6 = S1 + S4;

        if (y==1)
        {
            S7 = S6 + S5 + S1;

            printf("Trzeba %5.2f L Farby zeby pofarbowac pokuj z 1 dzwi i 1 oknom\n",S7);
                printf ("\n");
        }

        if (y==2)
        {
            S8 = S6 +  S5 + S5;

            printf("Trzeba %5.2f L Farby zeby pofarbowac pokuj z 2 dzwi i 1 oknom\n",S8);
                printf ("\n");
        }
    }

    if (x == 2)

    {
        S9 = S4 + S4;

        if (y==1)
        {
            S11 = S9 + S5 + S1;

            printf("Trzeba %5.2f L Farby zeby pofarbowac pokuj z 1 dzwi i 2 oknom\n",S11);
                printf ("\n");
        }

        if (y==2)
        {
            S12 = S9 +  S5 + S5;

            printf("Trzeba %5.2f L Farby zeby pofarbowac pokuj z 2 dzwi i 2 oknom\n",S12);
                printf ("\n");
        }



    }

    if (x == 3)
    {
        S13 = S9;

        if (y==1)
        {
            S14 = S9 + S3 + S2;

            printf("Trzeba %5.2f L Farby zeby pofarbowac pokuj z 1 dzwi i 3 oknami\n",S14);
                printf ("\n");
        }

        if (y==2)
        {
            S15 = S9 +  S10 + S5;

            printf("Trzeba %5.2f L Farby zeby pofarbowac pokuj z 2 dzwi i 3 oknami\n",S15);
                printf ("\n");
        }

    }

    return 0;
}