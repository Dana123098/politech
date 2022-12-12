#include <stdio.h>
#include <stdlib.h>

float a;
float b;
int arr;
int s=0;
int z=0;
int pentla;
int main(void) {
	printf("podaj ile chcesz liczb: \n");
	scanf("%f", &a);
	for(pentla=1;pentla<=a;pentla++){
		printf("Podaj liczby: \n");
		scanf("%f", &b);
		if(b>0){
			s++;
		}
		if(b==0){
			z++;
		}
	}

    printf("Liczb dodatnich: %d \n", s);
    printf("Liczb =0 : %d \n", z);
	return 0;
	
}



////////////////////////
//#include <stdio.h>
// 
//int main(void)
//{
//    int arr[] = { 1, 2, 3, 4, 5, 8 };
//    size_t n = sizeof(arr)/sizeof(arr[0]);
// 
//    printf("The size of the array is %d", n);
// 
//    return 0;
//}