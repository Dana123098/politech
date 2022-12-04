#include <stdio.h>
#include <stdlib.h>
int a;
int d;
int pentla;
float sum = 0.0;
float s = 0.0;
int paz = 0;
int main() {
	printf("Podaj ile chczesz liczb : \n");
	scanf("%d", &a);
	for (pentla=1;pentla<=a;pentla++){
		printf("Wpisz liczby: \n");
		scanf("%d", &d);
			if ((d%2)==0){
			sum+=d;
			paz++;
	}

	}

	s=sum/paz;
	printf("S: %4.2f", s);
    return 0;
}
