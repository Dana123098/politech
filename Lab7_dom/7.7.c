#include <stdio.h>
#include <stdlib.h>

long silnia(int x){
	long wynik=1;
	while(x>1){
		wynik = x * wynik;
		x--;
	}
	return wynik;
}

int main() {
	int a;
	printf("Podaj liczbe: \n");
	scanf("%d", &a);
	const int liczba=a;
	printf("Wynik: %d\n", silnia(liczba));
	return 0;
}